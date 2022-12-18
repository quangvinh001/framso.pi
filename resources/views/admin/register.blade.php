@section('title')
    REGISTER
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
    <link rel="stylesheet" href="{{ asset('build/css/style1.css') }}">




    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <title>@yield('title') - FarmSoPi</title>

    <link rel="icon" href="{{ asset('/build/images/organic farm.svg') }}" type="image/x-icon" class="logo-title">
</head>

<body>
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-danger text-center">
                {{ session('success') }}
            </div>
        @elseif(session('success'))
            <div class="alert alert-success ">
                {{ session('success') }}
            </div>
        @endif
        <div class="title">Registration</div>
        <div class="content">
            <form action="{{ route('postRegisteradmin') }} " method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input name="name" type="text" placeholder="Enter your name">
                        @error('name')
                            <span class="ermsg">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Email</span>
                        <input name="email" type="text" placeholder="Enter your email">
                        @error('email')
                            <span class="ermsg">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input name="phone" type="text" placeholder="Enter your phone number">
                        @error('phone')
                            <span class="ermsg">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Address</span>
                        <input name="adrress" type="text" placeholder="Enter your adrress">
                        @error('adrress')
                            <span class="ermsg">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Password</span>
                        <input name="password" type="password" placeholder="Enter your password">
                        @error('password')
                            <span class="ermsg">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input name="repassword" type="password" placeholder="Confirm your password">
                        @error('repassword')
                            <span class="ermsg">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="button">
                    <input type="submit" value="Register">
                </div>
                @csrf
            </form>
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
