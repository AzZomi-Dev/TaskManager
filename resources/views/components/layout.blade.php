<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hands on</title>
<style>
    body{
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    }
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
nav {
    position: absolute;
    top: 0px;
    left: 0px;
    background-color: #fff;
    padding: 15px 30px;
    margin-bottom: 30px;
    width: 100%;
}

nav a {
    color: #3498db;
    text-decoration: none;
    margin-left: 20px;
    font-weight: bold;
    transition: color 0.3s ease;
}

nav a:hover {
    color: #222;
}

nav span {
    color: #222;
    font-weight: 500;
}

nav form {
    display: inline;
    margin-left: 20px;
}

nav .btn {
    background-color: transparent;
    border-color: #3498db;
    color: #3498db;
    padding: 6px 12px;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
}

nav .btn:hover {
    background-color: #3498db;
    color: #fff;
}
body.light-mode nav {
    background-color: #fff;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

body.light-mode nav a {
    color: #3498db;
}

body.light-mode nav a:hover {
    color: #222;
}

body.light-mode nav span {
    color: #222;
}

body.light-mode nav .btn {
    border-color: #3498db;
    color: #3498db;
}

body.light-mode nav .btn:hover {
    background-color: #3498db;
    color: #fff;
}
</style>
</head>
<body>
    @if(session('success'))
        {{session('success')}}
    @endif
    <header>
        <nav id="navbar" class="nav-bar">
            @guest
                <a href="{{ route('show.login') }}">Login</a>
                <a href="{{ route('show.register') }}">Register</a>
            @endguest
            @auth
                <span>
                    Name: {{Auth::user()->name}}
                </span>
                <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <button class="btn">Logout</button>
                </form>
                <button id="themeToggle" class="theme-toggle">🌞 Light Mode</button>
            @endauth
        </nav>
    </header>
    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>