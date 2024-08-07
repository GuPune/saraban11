<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('dist/img/logoiddrives.png') }}" />

    <title>ระบบสารบรรณ</title>

    <script src="https://fastly.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://fastly.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>

    <!-- icon -->
    <link rel="stylesheet" href="https://fastly.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- add -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/ckeditor5.css') }}">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <script type="importmap">
		{
			"imports": {
				"ckeditor5": "https://cdn.ckeditor.com/ckeditor5/42.0.2/ckeditor5.js",
				"ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/42.0.2/"
			}
		}
	</script>
    @vite(['resources/js/app.js'])

    <!-- Styles -->

    @livewireStyles
</head>

<style>
    body {
        font-family: 'Kanit', sans-serif;

    }
</style>

<body class="hold-transition sidebar-mini sidebar-collapse layout-fixed ">
    <div class="wrapper">
        <!-- user -->
        @if (Auth::user()->role == 0)
            @include('layouts.menu.header')
            @include('layouts.user.sidebar')
            @yield('content')
            @include('layouts.menu.footer')

            <!-- staff -->
        @elseif(Auth::user()->role == 1)
            @include('layouts.menu.header')
            @include('layouts.staff.sidebar')
            @yield('content')
            @include('layouts.menu.footer')

            <!-- admin -->
        @elseif(Auth::user()->role == 2)
            @include('layouts.menu.header')
            @include('layouts.admin.sidebar')
            @yield('content')
            @include('layouts.menu.footer')
        @endif
    </div>

    <script type="module" src="{{ asset('dist/js/ckeditor5.js') }}"></script>
</body>

</html>
