<header class="header">
    <div class="header-logo">
        <a class="header-logo__link" href="/">FashionablyLate</a>
    </div>
    <div class="header-link">
        @if (Auth::check())
            <form class="header__logout-form" action="{{ route('logout') }}" method="post">
                @csrf
                <button class="header-link__button">logout</button>
            </form>
        @else
            <a href="{{ route('register') }}" class="header-link__button">register</a>
        @endif
    </div>
</header>