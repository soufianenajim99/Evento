<!doctype html>
<html data-theme="cupcake">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="{{ asset('pdf.css') }}" type="text/css"> 
</head>
<body class="bg-base-200">
    @yield('content')
</body>
</html>