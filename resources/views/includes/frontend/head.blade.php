<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> 
    International Seminar on Public Health and Education 2018
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

</head>
<body>
    <div id="app">
        @foreach($posts as $post)
            @include('includes.frontend.navbar', compact('post'))
        @endforeach  
        <div class="line-bottom" style="height: 65px; background-color: #57a212;"></div>  

        @yield('content')

        @include('includes.frontend.footer')
    </div>

    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

</body>
</html>
