<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard app</title>
       
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href='{{ asset('css/app.css')}}' rel="stylesheet" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }
        </script>
        

        <!-- Styles -->
        
    </head>
    <body>
       <div id="app">
        <Navbar></Navbar>
       
        
       </div>
       <script src="{{ asset('/js/app.js') }}">
      
       </script>
    </body>
</html>
