@section('title')
    LOGIN
@endsection

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
    {{-- <link rel="stylesheet" href="/build/css/style.css"> --}}
    <link rel="stylesheet" href="{{ asset('build/css/css.css') }}">



    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <title>@yield('title') - FarmSoPi</title>

    <link rel="icon" href="{{ asset('/build/images/organic farm.svg') }}" type="image/x-icon" class="logo-title">
 
</head>

<body>

    <div class="login">
        @if (session()->has('message'))
            <div class="alert alert-danger text-center">
                {{ session('message') }}
            </div>
        @elseif(session('message'))
            <div class="alert alert-success ">
                {{ session('message') }}
            </div>
        @endif
        <h1 class="login-top">Login</h1>
        <form action="{{ route('postLoginadmin') }}" method="post">
            @csrf
            <label for="username" class="login-label">Username</label>
            <div class="login-input">
                <input type="text" name="email" id="username" placeholder="Type your username" />
                <i class="fa-solid fa-user"></i>
            </div>
            @error('email')
                <span class="ermsg">{{ $message }}</span>
            @enderror
            <label for="password" class="login-label">Password</label>
            <div class="login-input">
                <input type="password" name="password" id="password" placeholder="Type your password" />
                <i class="fa-solid fa-lock"></i>
            </div>
            @error('password')
                <span class="ermsg">{{ $message }}</span>
            @enderror
            <a class="porgot" href="#">Forgot password?</a>
            <button type="submit" class="login-sub">Login</button>
        </form>

        <div class="signup">
            <span>Or Sign Up Using</span>
            <a class="btn" href="{{ route('postRegisteradmin') }}">Signup</a>
        </div>


    </div>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<script src="{{ asset('build/js/script.js') }}"></script>

</html>
