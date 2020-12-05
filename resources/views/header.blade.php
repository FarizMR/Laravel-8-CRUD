<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    {{-- Custom.css --}}
    <link rel="stylesheet" href="{{ url('css/custom.css') }}">

</head>

<body>
    <div class="container">
        <div class="text-center font-weight-bold">
            <a class="text-dark header-text px-2" href="{{ url('/') }}">HOME</a>
            <a class="text-dark header-text px-2" href="{{ url('/products') }}">PRODUCT</a>
            <a class="text-dark header-text px-2" href="{{ url('/order') }}">ORDER</a>
            <a class="text-dark header-text px-2" href="{{ url('/history') }}">HISTORY</a>
        </div>
    </div>

    @yield('content')

    {{-- Bootstrap script --}}
    <script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>

</html>
