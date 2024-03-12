<!doctype html>
<html data-theme="cupcake" class="h-full bg-white">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body class="h-full">
    <div class="h-screen flex items-center justify-center">
        <div
        class="relative mx-auto w-full max-w-md bg-white px-6 pt-10 pb-8 shadow-xl ring-1 ring-gray-900/5 sm:rounded-xl sm:px-10">
        <div class="w-full">
            <div class="text-center">
                <h1 class="text-3xl font-semibold text-gray-900">Update your password</h1>
                <p class="mt-2 text-gray-500">Enter your new Password</p>
            </div>
            <div class="mt-5">
                <form action="{{route('password.update')}}" method="POST" >
                    @csrf
                   <input type="hidden" name="token" value="{{$token}}">
                    <div class="relative mt-6">
                        <input type="email" name="email" id="email" placeholder="Email Address" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
                        <label for="email" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Email Address</label>
                    </div>
                    <div class="relative mt-6">
                        <input type="password" name="password" id="password" placeholder="Password" class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                        <label for="password" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Password</label>
                    </div>
                    <div class="relative mt-6">
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation" class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                        <label for="password_confirmation" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Confirm Password</label>
                    </div>
                    <div class="my-6">
                        <button type="submit" class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">Sign up</button>
                    </div>
                  
                </form>
            </div>
        </div>
    </div>
    </div>
   
  
   
    

</body>
</html>