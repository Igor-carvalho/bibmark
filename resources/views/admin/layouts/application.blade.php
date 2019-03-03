<!DOCTYPE html>

<html lang="en" class="default-style">
<head>
    <title>BibMark Admin</title>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

    <link rel="stylesheet" href="{{ mix('/css/vendor.css') }}">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    
    <!-- Core scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    @yield('styles')
    <script>
        window.Laravel = {!! json_encode([
            'user' => [
                'authenticated' => auth()->check(),
                'id' => auth()->check() ? auth()->user()->id : null,
                'firstname' => auth()->check() ? auth()->user()->firstname : null,
                'lastname' => auth()->check() ? auth()->user()->lastname : null,
                'email' => auth()->check() ? auth()->user()->email : null,
                'phone' => auth()->check() ? auth()->user()->phone : null,
            ]
        ]) !!}
    </script>
</head>
<body>
    <div class="page-loader"><div class="bg-primary"></div></div>

    <div id="app">
        @yield('layout-content')
    </div>

    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>