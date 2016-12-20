<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | Lara Demo</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
    @include('shared.top_nav')

    <div class="container">
        @include('shared.flashes')
        <h1>@yield('title')</h1>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @yield('page')
            </div>
        </div>
    </div>

    @section('js_footer')
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @endsection
</body>
</html>