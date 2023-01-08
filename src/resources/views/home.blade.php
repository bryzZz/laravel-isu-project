<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
</head>
<body>
  <header class="home__header">
    <div class="home__container home__header-container">
      <h1>Todo Laravel</h1>
      <div class="home__header-right">
        <p>{{auth()->user()->name}}</p>
        <form method="POST" action="/logout">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </div>
    </div>
  </header>
  <main class="home__main">
    <div class="home__container">
      <form class="home__form" method="POST" action="/todo" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="New Todo">
        <button type="submit">Add Todo</button>
        @if ($errors->any())
          <div class="error">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
      </form>
      <div class="todos">
        @unless($todos->isEmpty())
        @foreach($todos as $todo)
          <div class="todo">
            <p>{{$todo->title}}</p>
            <form method="POST" action="/todos/{{$todo->id}}">
              @csrf
              @method('DELETE')
              <button type="submit">Delete</button>
            </form>
          </div>
        @endforeach
        @else
          <p>No Todos Found</p>
        @endunless
      </div>
    </div>
  </main>
</body>
</html>
