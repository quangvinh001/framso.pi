<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <link rel="stylesheet" href="/build/css/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('build/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('build/css/style1.css') }}">
    

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

   
    <title>@yield('title') - FarmSoPi</title>

    <link rel = "icon" href = "{{asset('/build/images/organic farm.svg')}}" 
    type = "image/x-icon" class="logo-title">
    @yield('css')
</head>

<body>
    @include('admin.layout.silder')
    <section class="dashboard">
        @include('admin.layout.header')
        @yield('content')
    </section>
    @include('admin.layout.footer')
    {{-- <script src="/build/js/script.js"></script> --}}

</body>
@yield('js')
<script src="{{ asset('build/js/script.js') }}"></script>

</html>
