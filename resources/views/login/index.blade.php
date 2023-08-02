<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="login">
      <form action="{{ url('login.proses') }}" method="post">
        @csrf
        <h1>LoginForm</h1>
        <hr>
        <p>Login first to continue</p>
        <label for="username">username</label>
        <input autofocus type="text" class="form-control @error('username') is-invalid @enderror" placeholder="username" name="username">

        @error('username')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror

        <label for="password">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" name="password">

        @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror

          <button>login</button>

      </form>
    </div>
    <div class="right">
        <img src="logopt.jpeg" alt="gambar_logo">
    </div>
  </div>
  
</body>
</html>