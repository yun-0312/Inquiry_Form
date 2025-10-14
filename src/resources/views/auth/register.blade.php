@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection

@section('header')
    @include('layouts.header_login')
@endsection

@section('content')
<div class="register__wrapper">
    <h1 class="register__title">Register</h1>

    <div class="register__form-container">
        <form class="register__form" action="{{ route('register') }}" method="post">
            @csrf
            <div class="register-form__group">
                <label class="register-form__label" for="name">お名前</label>
                <input type="text" class="register-form__input" name="name" id="name" value="{{ old('name') }}" placeholder="例: 山田 太郎">
                @error('name')
                <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register-form__group">
                <label class="register-form__label" for="email">メールアドレス</label>
                <input type="text" class="register-form__input" name="email" id="email" value="{{ old('email') }}" placeholder="例: test@example.com">
                @error('email')
                <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register-form__group">
                <label class="register-form__label" for="password">パスワード</label>
                <input type="password" class="register-form__input" name="password" id="password" placeholder="例: coachtech1106">
                @error('password')
                <p class="register__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="register-form__button-wrapper">
                <button class="register-form__button" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection