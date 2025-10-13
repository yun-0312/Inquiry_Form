<header class="header">
    <div class="header-logo">
        <a class="header-logo__link" href="/">FashionablyLate</a>
    </div>
    <div class="header-link">
        @if (Auth::check())
        <form class="form" action="{{ route('logout') }}" method="post">
            @csrf
            <button class="header-link__button">logout</button>
        </form>
        @endif
    </div>
</header>