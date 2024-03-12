<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrgaController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SessionController;
use App\Models\Categorie;
use Illuminate\Auth\Events\PasswordReset;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

   
    
    $events=Event::take(6)->whereDate('date','>=',Carbon::now());
    // if(request('category')){
    //     dd(request('category'));
    // }
    if(request('search')){
        $events
           ->where('name','LIKE','%'.request('search').'%');
           if(request('category')){
            $events
           ->where('category_id',request('category'));
           }
      }
    $cats = Categorie::all();
    return view('welcome',[
        'events'=>$events->get(),
        'cats'=>$cats
    ]);
})->name('home');




//Auth

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'orga'])->name('registerpr');
Route::get('/registercl',[RegisterController::class,'cli'])->name('registercl');
Route::post('/registercl',[RegisterController::class,'client'])->name('registercli');
Route::get('/login',[RegisterController::class,'login'])->name('login');
Route::post('/login', [SessionController::class, 'store'])->name('login.store');





//1
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');
//2
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');
//3
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');
//4
Route::post('/reset-password', function (Request $request) {
    // dd($request->token);
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
    ]);
    
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );

   
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');















Route::get('/choose',[RegisterController::class,'choose'])->name('choose');
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [SessionController::class,'logout'])->name('logout');
});






//Organisateur Routes

Route::middleware(['auth', 'role:organisateur'])->group(function () {
    Route::controller(OrgaController::class)->group(function () {
        Route::get('/dashboard_orga', 'dashboard')->name('orga.dash');
        Route::get('/orga_settings', 'settings')->name('orga.sett');
        Route::get('/orga_events', 'events')->name('orga.events');
        Route::get('/accepter_dem/{id}/{bid}', 'accdem')->name('orga.accde');
        Route::get('/refuser_dem/{id}/{bid}', 'refdem')->name('orga.refdem');
        
    });

    //Events

    Route::resource('/event',EventController::class);


});



//Clients Routes

Route::middleware(['auth', 'role:client'])->group(function () {
    Route::controller(ClientController::class)->group(function () {
        Route::get('/myReservation', 'myReser')->name('client.resers');
        Route::get('/eventpage/{id}', 'eventpage')->name('client.eventpage');
        Route::get('/events', 'events')->name('client.events');
        Route::get('/ticket/{id}', 'GenerateTicket')->name('client.gentick');
    });

    Route::controller(ReservationController::class)->group(function(){
        Route::get('/reserve/{id}', 'reserver')->name('client.reserve');
    });


});


//Admin Routes

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin_dash', 'dashboard')->name('admin.dash');
        //users
        Route::get('/admin_users', 'users')->name('admin.users');
        Route::get('/admin_users_desactivate/{id}', 'desactivateUser')->name('admin.users.desa');
        Route::get('/admin_users_activate/{id}', 'activateUser')->name('admin.users.acti');
        //categories
        Route::get('/admin_cates', 'categories')->name('admin.cats');
        //events
        Route::get('/admin_events', 'events')->name('admin.events');
        Route::get('/admin_event/{id}', 'showevents')->name('admin.epage');

        
        Route::get('/admin_event_val/{id}', 'validateEvent')->name('admin.eventval');
        Route::get('/admin_event_ref/{id}', 'rejectEvent')->name('admin.eventref');


    });

    //categories
    Route::resource('/categorie',CategorieController::class);





});


Route::get('/pdfdow',[pdfController::class,'download']);