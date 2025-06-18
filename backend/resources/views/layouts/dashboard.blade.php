<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

    
    @yield('styles')
    

</head>
<body>
    <div class="pageWrapper flex flex-row w-full h-full">
        <x-side-bar :messagesAmount="$messagesAmount"/>
    
        @yield("content")


    </div>

    @yield("scripts")
</body>

</html>