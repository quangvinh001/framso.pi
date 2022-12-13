<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login From </title>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
  <link rel="stylesheet" href="/build/css/css.css" />
</head>

<body>
  <div class="login">
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    @if (session()->has('message'))
    <div class="alert alert-danger">
      {{ session('message') }}
    </div>
    @endif

    @if (session('message'))
    <div class="alert alert-success">
      {{ session('message') }}
    </div>
    @endif
    <h1 class="login-top">Login</h1>
    <form action="{{route('postLoginadmin')}}" method="post">
    @csrf
      <label for="username" class="login-label">Username</label>
      <div class="login-input">
        <input type="email" name="email" id="username" placeholder="Type your username" />
        <i class="fa-solid fa-user"></i>
      </div>
      <label for="password" class="login-label">Password</label>
      <div class="login-input">
        <input type="password" name="pwd" id="password" placeholder="Type your password" />
        <i class="fa-solid fa-lock"></i>
      </div>
      <a class="porgot" href="#">Forgot password?</a>
      <button type="submit" class="login-sub">Login</button>
    </form>

    <div class="signup">
      <span>Or Sign Up Using</span>
      <a class="btn" href="#">Signup</a>
    </div>


  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>