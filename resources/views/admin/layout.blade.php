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
    <div class="navbar bg-white py-4">
      <div class="flex-1">
        <div class="font-bold text-orange-600 text-xl px-6"><a  href="{{route('home')}}">Evento</a>  </div>
      </div>
      <div class="flex-none gap-2 px-6">
        <div class="form-control">
          <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
        </div>
        <div class="dropdown dropdown-end">
          <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
            <div class="w-10 rounded-full">
              <img alt="Tailwind CSS Navbar component" src="/images/users/{{Auth::user()->picture}}" />
            </div>
          </div>
          <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
            <li>
            </li>
            <li><a>Settings</a></li>
            <li><a href="{{route('logout')}}">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
    
    <div class="flex flex-row pt-10 px-10 pb-4">
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
                <div class="indicator">
                  <span class="indicator-item badge badge-secondary">{{$count}}</span> 
                  <span class="material-icons-outlined float-left pr-2">file_copy</span>

                </div>

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






<script src="/js/main.js"></script>
</body>
            

</html>