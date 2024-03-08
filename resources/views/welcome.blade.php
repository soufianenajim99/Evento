<?php
use Carbon\Carbon;
?>
<!doctype html>
<html data-theme="cupcake">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="bg-base-200">
  
    <div class="container mx-auto relative">
        <div class="flex items-center justify-center">
            <nav class=" mt-28 w-5/6 fixed z-50">
                <div class="navbar bg-base-300 rounded-3xl ">
                    <div class="flex-1">
                      <a class="btn btn-ghost text-xl">Evento</a>
                    </div>
                    <div class="flex-none gap-2">
                      <div class="form-control">
                        <input type="text" placeholder="Search" class="input input-bordered w-24 md:w-auto" />
                      </div>
                      <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                          <div class="w-10 rounded-full">
                            @if (Auth::check())
                            <img alt="" src="/images/users/{{Auth::user()->picture}}" />    
                            @else
                            <img alt="" src="/images/download.png" />    
                                
                            @endif
                          </div>
                        </div>
                       
                          {{-- <li>
                            <a class="justify-between">
                              Profile
                              <span class="badge">New</span>
                            </a>
                          </li> --}}
                          <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                 @if (Auth::check())
                        @if (Auth::user()->hasRole('organisateur'))
                               <li><a href="{{route('orga.dash')}}">Dashboard</a></li>
                               <li><a href="{{route('logout')}}">Logout</a></li>
                        @endif
                        @if (Auth::user()->hasRole('admin'))
                               <li><a href="{{route('admin.dash')}}">Admin Dashboard</a></li>
                               <li><a href="{{route('logout')}}">Logout</a></li>
                        @endif
                        @if (Auth::user()->hasRole('client'))
                               <li><a href="{{route('client.resers')}}">Mes Reservations</a></li>
                               <li><a href="{{route('logout')}}">Logout</a></li>
                        @endif
                 @else
                 <li><a href="{{route('choose')}}">Register</a></li>
                 <li><a href="{{route('login')}}">Login</a></li>
                 @endif



                       
                        </ul>
                      </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="hero min-h-screen bg-base-200 z-10">
            <div class="hero-content flex-col lg:flex-row-reverse">
              <img src="/images/transparent-colorful-drum-fireworks-festive-decoration-drum-pl-festive-image-of-colorful-drum-with-fireworks65754743bdbec0.0220025317021847717772.png" class="max-w-sm rounded-lg shadow-2xl" />
              <div>
                <h1 class="text-5xl font-bold">Evento-Reservew Votre Ticket de Rêve Avec Nous</h1>
                <p class="py-6">Bienvenue sur Evento, votre partenaire de confiance dans la recherche de la event parfaite. Que vous cherchiez à acheter, vendre ou louer, notre agence immobilière dévouée est là pour vous accompagner à chaque étape du processus.</p>
                <button class="btn btn-primary"><a href="{{route('choose')}}">Get Started</a></button>
              </div>
              
            </div>
            
            
        </div>  
        {{-- <div class="flex w-11/12 md:w-8/12 xl:w-6/12">
            <div class="flex rounded-md w-full">
                <form action="#" method="GET" class="flex w-full">
                    <input type="text" name="search"
                        class="w-full p-3 rounded-md rounded-r-none border-2 border-gray-400  dark:bg-white-500 "
                        placeholder="keyword" value="{{request('search')}}" />
                    <button
                        class="inline-flex items-center gap-2 bg-orange-600 text-white text-lg font-semibold py-3 px-6 rounded-r-md">
                        <span>Find</span>
                        <svg class="text-gray-200 h-5 w-5 p-0 fill-current" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px"
                            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                            xml:space="preserve">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>

                </form>
                </button>
            </div>
        </div> --}}
        <section class="py-12 bg-gray-900 text-gray-100 sm:py-12 lg:py-16">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="max-w-xl mx-auto text-center xl:max-w-2xl">
                    <h2 class="text-3xl font-bold leading-tight text-gray-50 sm:text-4xl xl:text-5xl mb-6">Best Events To Attend Today!</h2>
                    <p class="mb-4">We are creating a tool that helps you be more productive and efficient when building
                        websites and webapps</p>
                </div>





                <div class="flex flex-col">
                    <div data-theme="cupcake" class="p-6  border-indigo-200 shadow-lg rounded-xl">
                      <form action="" method="GET">
                        <div class="relative flex items-center justify-between w-full mb-10 rounded-md">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="absolute block text-indigo-400 left-2 h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
              
                          <input type="name" name="search"
                            class="w-full h-12 py-4 pl-12 pr-40 bg-indigo-100 border border-indigo-100 rounded-md shadow-sm outline-none cursor-text focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            placeholder="Search by product name or category" />
                        </div>
              
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                          <div class="flex flex-col">
                            <label for="start_date" class="text-sm font-medium text-indigo-900">Transaction Start Date</label>
                            <input type="date" id="start_date"
                              class="block w-full px-2 py-2 mt-2 bg-indigo-100 border border-indigo-100 rounded-md shadow-sm outline-none cursor-pointer focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                          </div>
              
                          <div class="flex flex-col">
                            <label for="end_date" class="text-sm font-medium text-indigo-900">Transaction End Date</label>
                            <input type="date" id="end_date"
                              class="block w-full px-2 py-2 mt-2 bg-indigo-100 border border-indigo-100 rounded-md shadow-sm outline-none cursor-pointer focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
                          </div>
              
                          <div class="flex flex-col">
                            <label for="brand" class="text-sm font-medium text-indigo-900">Brand</label>
                            <select id="brand"
                              class="block w-full px-2 py-2 mt-2 bg-indigo-100 border border-indigo-100 rounded-md shadow-sm outline-none cursor-pointer focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                              <option>Adidas</option>
                              <option>Nike</option>
                              <option>Rebook</option>
                              <option>Puma</option>
                              <option>Vans</option>
                              <option>Converse</option>
                            </select>
                          </div>
                        </div>
              
                        <div class="grid justify-start w-full grid-cols-2 mt-8 space-x-4 md:flex">
                          <button
                            class="flex items-center px-8 py-2 font-medium text-indigo-700 bg-indigo-100 rounded-lg outline-none hover:opacity-80 focus:ring">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                              stroke="currentColor" class="w-4 h-4 mr-2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                            Reset
                          </button>
                          <button
                            class="flex items-center px-8 py-2 font-medium text-white bg-indigo-600 rounded-lg outline-none hover:opacity-80 focus:ring">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                              stroke="currentColor" class="w-4 h-4 mr-2">
                              <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                            Search
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>







                
               
            </div>
        </section>
      




        <section class="px-4 py-4 max-w-7xl mx-auto h-full w-full">
          <div class="grid gap-4 p-3 md:grid-cols-2 lg:grid-cols-3 md:p-4 xl:p-5">
            

            @foreach ($events as $event)
                
            <div class="bg-white text-[#544BAB] border rounded-lg shadow-md p-8 space-y-8">
              <div class="">
                <h1 class=" mb-6 text-4xl">{{$event->name}}</h1>
                <img src="/images/events/{{$event->picture}}" alt="" srcset="">
              </div>
              <div>
                <p class="font-semibold break-all">{{$event->description}}</p>
              </div>
              <div class="flex items-center justify-between">
                <div class="text-sm self-end">
                  <div class="space-y-2 self-end">
                    <p class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        {{$event->lieu}}
                    </p>
                    <div class="flex items-center text-sm text-gray-500">
                        <p class="flex items-center mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                            </svg>
                            {{Carbon::parse($event->date)->toFormattedDateString()}}
                        </p>
                        <p class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            starting {{Carbon::parse($event->date)->format('h:i A');}}
                        </p>
                    </div>
                </div>
                </div>
                <div class="flex items-center mt-2.5 cursor-pointer group">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 fill-current group-hover:text-purple-900">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                  </svg>
                </div>
              </div>
            </div>
            @endforeach

           
          </div>
          <button
            class="block w-full uppercase bg-[#37335D] font-semibold text-xl text-white py-5 rounded-xl hover:bg-purple-900">
            load more events
          </button>
        </section>
        
    </div>
   
    

</body>
</html>