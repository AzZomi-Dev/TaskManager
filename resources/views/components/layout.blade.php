<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hands on</title>

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