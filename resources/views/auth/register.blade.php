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
                <h1 class="text-3xl font-semibold text-gray-900">Sign up</h1>
                <p class="mt-2 text-gray-500">Sign Up below to create your account</p>
            </div>
            <div class="mt-5">
                <form action="{{route('registerpr')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="relative mt-6">
                        <div class="flex-1 items-center max-w-screen-sm mx-auto mb-3 space-y-4 sm:flex sm:space-y-0">
                            <div class="relative w-full">
                              <div class="items-center justify-center max-w-xl mx-auto">
                                <label class="flex justify-center w-full h-14 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none" id="drop"><span class="flex items-center space-x-2"><svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg><span class="font-medium text-gray-600">Your Profile Picture<span class="text-blue-600 underline ml-[4px]">browse</span></span></span><input type="file" name="image" class="hidden" accept="image/png,image/jpeg" id="input"></label>
                              </div>
                            </div>
                          </div>
                    </div>
                    <div class="relative mt-6">
                        <input type="text" name="username" id="username" placeholder="Username" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
                        <label for="username" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Username</label>
                    </div>
                    <div class="relative mt-6">
                        <input type="email" name="email" id="email" placeholder="Email Address" class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" autocomplete="NA" />
                        <label for="email" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Email Address</label>
                    </div>
                    <div class="relative mt-6">
                        <input type="password" name="password" id="password" placeholder="Password" class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                        <label for="password" class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">Password</label>
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