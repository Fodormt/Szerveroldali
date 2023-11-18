<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auto-check</title>
</head>
<body>
    <div class="navbar">
        @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a onclick="event.preventDefault(); this.closest('form').submit();" href="{{ route('logout') }}">Log out</a>
                        </form>
                    @else
                        <a href="{{ route('login') }}">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    </div>
    <div class="content">
        <h1>Vehicle damage history management system</h1>
        <h2>@yield('title')</h2>
        <div>@yield('content')</div>
    </div>
</body>
</html>