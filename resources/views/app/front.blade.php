<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset('images/logo.svg')}}" type="image/x-icon">
    <title>Front Portal</title>
    <script src="{{asset('source-code/jquery/dist/jquery.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('source-code/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('source-code/owl.carousel/dist/assets/owl.theme.default.min.css')}}">
    <script src="{{asset('source-code/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body id="app"></body>
@vite('resources/js/front/app.js')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    window.onload = function (){
        AOS.init({
            delay: 70,
            duration: 1000,
            offset: 120,
            disable: 'mobile',
        });
    };

    window.core = {
        @if(\Illuminate\Support\Facades\Auth::guard('customers')->check())
            UserInfo: {!! \Illuminate\Support\Facades\Auth::guard('customers')->user() !!},
        @else
            UserInfo: null
        @endif
    }
</script>
</html>
