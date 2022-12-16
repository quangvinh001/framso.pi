@extends('admin.master')
@section('title')
    LOGIN
@endsection
@section('content')

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
@endsection
