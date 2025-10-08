<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-logo">
                <a class="header-logo__link" href="/">FashionablyLate</a>
            </div>
            <div class="header-link">
                <form>
                    <button class="header-link__button">logout</button>
                </form>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>

</html>