@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header')
    @extends('layouts.header_login')
@endsection

@section('content')
<div class="login__wrapper">
    <h1 class="login__title">Login</h1>

    <div class="login__form-container">
        <form action="{{ route('login') }}" class="login__form" method="post">
            @csrf
            <div class="login-form__group">
                <label for="email" class="login-form__label">メールアドレス</label>
                <input type="text" name="email" id="email" class="login-form__input" placeholder="例: test@example.com">
                @error('email')
                    <p class="login__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="login-form__group">
                <label for="password" class="login-form__label">パスワード</label>
                <input type="password" name="password" id="password" class="login-form__input" placeholder="例: coachtech1106">
                @error('password')
                    <p class="login__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="login-form__button-wrapper">
                <button type="submit" class="login-form__button">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection