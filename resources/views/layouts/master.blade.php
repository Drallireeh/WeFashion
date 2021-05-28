<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device.width, initial-scale=1">
    <title>Produit</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/index.css')}}" rel="stylesheet">
    <link href="{{asset('css/show.css')}}" rel="stylesheet">
    <link href="{{asset('css/partials.css')}}" rel="stylesheet">
</head>

<body>
    <header>
        @include('partials.menu')
    </header>
    <div class="content">
        @yield('content')
    </div>
    <footer>
        @include('partials.footer')
    </footer>
    
    @section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
    @show
</body>

</html>