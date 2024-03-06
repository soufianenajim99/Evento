<!doctype html>
<html data-theme="cupcake">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="h-full">

  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet" />

  <div class="min-h-screen">
    <div class="fixed bg-white text-blue-800 px-10 py-1 z-10 w-full">
        <div class="flex items-center justify-between py-2 text-5x1">
          <div class="font-bold text-orange-600 text-xl">Evento</div>
          <div class="flex items-center text-gray-500 gap-4">
            <span class="material-icons-outlined p-2" style="font-size: 30px">search</span>
            <span class="material-icons-outlined p-2" style="font-size: 30px">notifications</span>
            <img class="mask mask-circle" src="/images/users/{{Auth::user()->picture}}" width="50" height="50"/>
          </div>
      </div>
    </div>
    
    <div class="flex flex-row pt-24 px-10 pb-4">
      <div class=" w-2/12 mr-6 asidd">
        <div
            class="bg-white flex flex-col content-stretch justify-evenly rounded-xl shadow-lg mb-6 px-6 py-16 side h-5/6 gap-5">
            <a href="{{route('admin.dash')}}"
                class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">dashboard</span>
                <p class="admin-aside">Dashboard</p>

            </a>
            <a href="{{route('admin.cats')}}"
                class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">tune</span>
                <p class="admin-aside">Categories</p>

            </a>
            <a href="{{route('admin.events')}}"
                class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">file_copy</span>
                <p class="admin-aside">Events</p>


            </a>
            <a href="{{route('admin.users')}}"
                class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">face</span>
                <p class="admin-aside">Users</p>


            </a>
            <a href="{{route('logout')}}"
                class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">power_settings_new</span>
                <p class="admin-aside">Logout</p>


            </a>
        </div>

    </div>
      
      <div class="w-10/12">
       @yield('content')
      </div>



</div>
</div>







</body>
            

</html>