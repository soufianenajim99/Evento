<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Categorie;
use App\Models\Client;
use App\Models\Organisateur;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function dashboard(){
        return view('admin.dashboard');
    }
    public function users(){
        $users=User::withTrashed()->paginate(10);
        return view('admin.users',[
            'users'=>$users,
        ]);
    }
    public function categories(){
        $cats = Categorie::latest()->paginate(5);
        return view('admin.categories',[
            'cats'=>$cats
        ]);
    }
    public function events(){
        return view('admin.events');
    }

   public function desactivateUser(string $id){
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.users');
   }
   public function activateUser(string $id){
    $user = User::withTrashed()->findOrFail($id);;
    $user->restore();
    return redirect()->route('admin.users');
   }



}