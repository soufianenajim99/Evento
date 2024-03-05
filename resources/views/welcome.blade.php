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
                      <a class="btn btn-ghost text-xl">Agency</a>
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
                 @if (Auth::user()->hasRole('prop'))
                 <li><a href="{{route('dashprop')}}">Dashboard</a></li>
                 <li><a href="{{route('logout')}}">Logout</a></li>
                 @else
                 <li><a href="{{route('myreserve')}}">My Reservations</a></li>
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
              <img src="/images/transparent-spring-balcony-flowers-house-with-balcony-flowers-colorful-house-with-paris-banner-and-flowers65d71d549c5a99.6610589517085965646404.png" class="max-w-sm rounded-lg shadow-2xl" />
              <div>
                <h1 class="text-5xl font-bold">ImmoPlus-Trouvez Votre Maison de Rêve Avec Nous</h1>
                <p class="py-6">Bienvenue sur ImmoPlus, votre partenaire de confiance dans la recherche de la maison parfaite. Que vous cherchiez à acheter, vendre ou louer, notre agence immobilière dévouée est là pour vous accompagner à chaque étape du processus.</p>
                <button class="btn btn-primary"><a href="{{route('choose')}}">Get Started</a></button>
              </div>
              
            </div>
            
            
        </div>  
        <div class="flex w-11/12 md:w-8/12 xl:w-6/12">
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
        </div>
        <section class="py-12 bg-gray-900 text-gray-100 sm:py-12 lg:py-16">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="max-w-xl mx-auto text-center xl:max-w-2xl">
                    <h2 class="text-3xl font-bold leading-tight text-gray-50 sm:text-4xl xl:text-5xl mb-6">Available Houses Today!</h2>
                    <p class="mb-4">We are creating a tool that helps you be more productive and efficient when building
                        websites and webapps</p>
        
                </div>
                <div
                    class="grid max-w-4xl lg:max-w-6xl grid-cols-1 mx-auto mt-8 text-center gap-y-4 sm:gap-x-8 sm:grid-cols-2 lg:grid-cols-3 sm:mt-12 lg:mt-20 sm:text-left">
                    @foreach ($biens as $bien)
                        
                    <div class="relative">
                        <div class="absolute -inset-1">
                            <div
                                class="w-full h-full rotate-180 opacity-30 blur-lg filter bg-gradient-to-r from-yellow-400 via-pink-500 to-green-600">
                            </div>
                        </div>
                        <div class="relative overflow-hidden bg-white shadow-md rounded-xl h-full">
                            <div class="p-9">
                                <img src="/images/{{$bien->picture}}" alt="" srcset="">
                                <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10"><a href="/bien_page/{{$bien->id}}">{{$bien->titre}}</a></h3>
                                <p class="mt-6 text-base text-gray-600">{{$bien->description}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="overflow-hidden bg-white shadow-md rounded-xl">
                        <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="13" y="14" width="2" height="2" rx="1" fill="#111827"></rect>
                                <rect x="7" y="11" width="2" height="6" rx="1" fill="#111827"></rect>
                                <rect x="11" y="13" width="2" height="6" rx="1" transform="rotate(90 11 13)" fill="#111827">
                                </rect>
                                <rect x="16" y="12" width="2" height="2" rx="1" fill="#111827"></rect>
                                <path
                                    d="M14 8V8C14 7.58326 14 7.37488 13.9655 7.19144C13.8455 6.5546 13.4245 6.01534 12.8358 5.74455C12.6662 5.66654 12.464 5.616 12.0597 5.51493L12 5.5C11.5388 5.3847 11.3082 5.32706 11.1171 5.233C10.5686 4.96315 10.1737 4.45731 10.0449 3.85979C10 3.65151 10 3.41382 10 2.93845V2"
                                    stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                                <path
                                    d="M3 14C3 11.4412 3 10.1618 3.61994 9.28042C3.77954 9.05351 3.96572 8.85041 4.17372 8.6763C4.98164 8 6.15442 8 8.5 8H15.5C17.8456 8 19.0184 8 19.8263 8.6763C20.0343 8.85041 20.2205 9.05351 20.3801 9.28042C21 10.1618 21 11.4412 21 14C21 16.5588 21 17.8382 20.3801 18.7196C20.2205 18.9465 20.0343 19.1496 19.8263 19.3237C19.0184 20 17.8456 20 15.5 20H8.5C6.15442 20 4.98164 20 4.17372 19.3237C3.96572 19.1496 3.77954 18.9465 3.61994 18.7196C3 17.8382 3 16.5588 3 14Z"
                                    stroke="#111827" stroke-width="2"></path>
                            </svg>
                            <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">History of Edits</h3>
                            <p class="mt-6 text-base text-gray-600">Go back and forth your history of changes and
                                restore your designs to any point in time</p>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute -inset-1">
                            <div
                                class="w-full h-full rotate-180 opacity-30 blur-lg filter bg-gradient-to-r from-yellow-400 via-pink-500 to-green-600">
                            </div>
                        </div>
                        <div class="relative overflow-hidden bg-white shadow-md rounded-xl h-full">
                            <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 8L20 8" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                                    <path d="M4 16L14 16" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                                    <ellipse cx="7" cy="8" rx="3" ry="3" transform="rotate(90 7 8)" stroke="#111827"
                                        stroke-width="2" stroke-linecap="round"></ellipse>
                                    <ellipse cx="17" cy="16" rx="3" ry="3" transform="rotate(90 17 16)" stroke="#111827"
                                        stroke-width="2" stroke-linecap="round"></ellipse>
                                </svg>
                                <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">Integrations</h3>
                                <p class="mt-6 text-base text-gray-600">Step up your designs and workflow with
                                    integrations with your favourite tools such as mailchimp, slack, jira etc</p>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden bg-white shadow-md rounded-xl">
                        <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="13" y="14" width="2" height="2" rx="1" fill="#111827"></rect>
                                <rect x="7" y="11" width="2" height="6" rx="1" fill="#111827"></rect>
                                <rect x="11" y="13" width="2" height="6" rx="1" transform="rotate(90 11 13)" fill="#111827">
                                </rect>
                                <rect x="16" y="12" width="2" height="2" rx="1" fill="#111827"></rect>
                                <path
                                    d="M14 8V8C14 7.58326 14 7.37488 13.9655 7.19144C13.8455 6.5546 13.4245 6.01534 12.8358 5.74455C12.6662 5.66654 12.464 5.616 12.0597 5.51493L12 5.5C11.5388 5.3847 11.3082 5.32706 11.1171 5.233C10.5686 4.96315 10.1737 4.45731 10.0449 3.85979C10 3.65151 10 3.41382 10 2.93845V2"
                                    stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                                <path
                                    d="M3 14C3 11.4412 3 10.1618 3.61994 9.28042C3.77954 9.05351 3.96572 8.85041 4.17372 8.6763C4.98164 8 6.15442 8 8.5 8H15.5C17.8456 8 19.0184 8 19.8263 8.6763C20.0343 8.85041 20.2205 9.05351 20.3801 9.28042C21 10.1618 21 11.4412 21 14C21 16.5588 21 17.8382 20.3801 18.7196C20.2205 18.9465 20.0343 19.1496 19.8263 19.3237C19.0184 20 17.8456 20 15.5 20H8.5C6.15442 20 4.98164 20 4.17372 19.3237C3.96572 19.1496 3.77954 18.9465 3.61994 18.7196C3 17.8382 3 16.5588 3 14Z"
                                    stroke="#111827" stroke-width="2"></path>
                            </svg>
                            <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">Publish webpage online</h3>
                            <p class="mt-6 text-base text-gray-600">Effortlessly publish your webpages online and make
                                it available to the world with a click of a button</p>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="absolute -inset-1">
                            <div
                                class="w-full h-full rotate-180 opacity-30 blur-lg filter bg-gradient-to-r from-yellow-400 via-pink-500 to-green-600">
                            </div>
                        </div>
                        <div class="relative overflow-hidden bg-white shadow-md rounded-xl h-full">
                            <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 8L20 8" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                                    <path d="M4 16L14 16" stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                                    <ellipse cx="7" cy="8" rx="3" ry="3" transform="rotate(90 7 8)" stroke="#111827"
                                        stroke-width="2" stroke-linecap="round"></ellipse>
                                    <ellipse cx="17" cy="16" rx="3" ry="3" transform="rotate(90 17 16)" stroke="#111827"
                                        stroke-width="2" stroke-linecap="round"></ellipse>
                                </svg>
                                <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">Forms and Data Collection
                                </h3>
                                <p class="mt-6 text-base text-gray-600">Collect data and information from users with
                                    forms built on windframe and sort through them in a nice interface</p>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-hidden bg-white shadow-md rounded-xl">
                        <div class="p-9"><svg class="w-12 h-12 mx-auto text-gray-400 sm:mx-0" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect x="13" y="14" width="2" height="2" rx="1" fill="#111827"></rect>
                                <rect x="7" y="11" width="2" height="6" rx="1" fill="#111827"></rect>
                                <rect x="11" y="13" width="2" height="6" rx="1" transform="rotate(90 11 13)" fill="#111827">
                                </rect>
                                <rect x="16" y="12" width="2" height="2" rx="1" fill="#111827"></rect>
                                <path
                                    d="M14 8V8C14 7.58326 14 7.37488 13.9655 7.19144C13.8455 6.5546 13.4245 6.01534 12.8358 5.74455C12.6662 5.66654 12.464 5.616 12.0597 5.51493L12 5.5C11.5388 5.3847 11.3082 5.32706 11.1171 5.233C10.5686 4.96315 10.1737 4.45731 10.0449 3.85979C10 3.65151 10 3.41382 10 2.93845V2"
                                    stroke="#111827" stroke-width="2" stroke-linecap="round"></path>
                                <path
                                    d="M3 14C3 11.4412 3 10.1618 3.61994 9.28042C3.77954 9.05351 3.96572 8.85041 4.17372 8.6763C4.98164 8 6.15442 8 8.5 8H15.5C17.8456 8 19.0184 8 19.8263 8.6763C20.0343 8.85041 20.2205 9.05351 20.3801 9.28042C21 10.1618 21 11.4412 21 14C21 16.5588 21 17.8382 20.3801 18.7196C20.2205 18.9465 20.0343 19.1496 19.8263 19.3237C19.0184 20 17.8456 20 15.5 20H8.5C6.15442 20 4.98164 20 4.17372 19.3237C3.96572 19.1496 3.77954 18.9465 3.61994 18.7196C3 17.8382 3 16.5588 3 14Z"
                                    stroke="#111827" stroke-width="2"></path>
                            </svg>
                            <h3 class="mt-6 text-2xl font-bold text-gray-900 sm:mt-10">Custom Domains</h3>
                            <p class="mt-6 text-base text-gray-600">Attach your own custom domain to your published
                                projects or website on windframe</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
    </div>
   
    

</body>
</html>