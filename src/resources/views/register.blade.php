<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
  <form method="POST" action="/users" class="login-form">
    @csrf
    <label>Name</label>
    <input name='name' type="text" placeholder="Jeff" value={{old('name')}}>
    <label>Email</label>
    <input name='email' type="text" placeholder="example@example.com" value={{old('email')}}>
    <label>Password</label>
    <input name='password' type="password" placeholder="password..">

    @error('email')
      <p class="error">{{$message}}</p>
    @enderror

    @error('password')
      <p class="error">{{$message}}</p>
    @enderror

    <button type='submit'>Register</button>
  </form>

  <div> 
    <a href='/login'>Already have an account yet?</a>
  </div>
</body>
</html>
