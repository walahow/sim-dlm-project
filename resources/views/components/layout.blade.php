<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/logo.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
     <title>{{ config('app.name', 'SIM') }}
  </title>
</head>
<body>

<div class="antialiased bg-gray-50 dark:bg-gray-900">
   
<x-nav>
  
</x-nav>

    <x-sidebar></x-sidebar>
   
<x-main>
   {{ $slot }}
   
</x-main>
<x-footer>yura</x-footer>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>