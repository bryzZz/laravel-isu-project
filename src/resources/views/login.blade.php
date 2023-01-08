<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
  <form method="POST" action='/users/authenticate' class="login-form">
    @csrf
    <label>Email</label>
    <input name='email' type="text" placeholder="example@example.com" value={{old('email')}}>

    <label>Password</label>
    <input name='password' type="password" placeholder="password.." value="{{old('password')}}">

    @error('error')
      <p class="error">{{$message}}</p>
    @enderror

    <button type="submit">Log in</button>
  </form>

  <div> 
    <a href='/register'>Don't have account yet?</a>
  </div>
</body>
</html>
