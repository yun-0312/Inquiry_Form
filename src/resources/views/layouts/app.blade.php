<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header-logo">
            <a class="header-logo__link" href="/">FashionablyLate</a>
        </div>
        <div class="header-link">
            @if (Auth::check())
                <form class="form" action="/logout" method="post">
                    @csrf
                    <button class="header-link__button">logout</button>
                </form>
            @endif
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>