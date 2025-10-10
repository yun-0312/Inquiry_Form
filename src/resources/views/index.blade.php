@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>Contact</h2>
        </div>
        <form class="form" action="/confirm" method="post">
            @csrf
            <div class="contact__group">
                <!-- お名前 -->
                <div class="contact__field">
                    <label class="contact__label">お名前 <span class="contact__required">※</span></label>
                    <div class="contact__input-group--name">
                        <input type="text" name="first_name" class="contact__input--name" placeholder="例: 山田" value="{{ old('first_name') }}">
                        <input type="text" name="last_name" class="contact__input--name" placeholder="例: 太郎" value="{{ old('last_name') }}">
                    </div>
                    <div class="form__error">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <!-- 性別 -->
                <div class="contact__field">
                    <label class="contact__label">性別 <span class="contact__required">※</span></label>
                    <div class="contact__radio-group">
                        <label for="1"><input type="radio" name="gender" value="1" checked> 男性</label>
                        <label for="2"><input type="radio" name="gender" value="2"> 女性</label>
                        <label for="3"><input type="radio" name="gender" value="3"> その他</label>
                    </div>
                    <div class="form__error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <!-- メールアドレス -->
                <div class="contact__field">
                    <label class="contact__label">メールアドレス <span class="contact__required">※</span></label>
                    <input type="email" name="email" class="contact__input" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <!-- 電話番号 -->
                <div class="contact__field">
                    <label class="contact__label">電話番号 <span class="contact__required">※</span></label>
                    <div class="contact__input-group--tel">
                        <input type="text" name="tel1" class="contact__input--tel" placeholder="080" value="{{ old('tel1') }}">
                        <span class="contact__tel-hyphen">-</span>
                        <input type="text" name="tel2" class="contact__input--tel" placeholder="1234" value="{{ old('tel2') }}">
                        <span class="contact__tel-hyphen">-</span>
                        <input type="text" name="tel3" class="contact__input--tel" placeholder="5678" value="{{ old('tel3') }}">
                    </div>
                    <div class="form__error">
                        @error('tel')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <!-- 住所 -->
                <div class="contact__field">
                    <label class="contact__label">住所 <span class="contact__required">※</span></label>
                    <input type="text" name="address" class="contact__input" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <!-- 建物名 -->
                <div class="contact__field">
                    <label class="contact__label">建物名</label>
                    <input type="text" name="building" class="contact__input" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
                <!-- お問い合わせの種類 -->
                <div class="contact__field">
                    <label class="contact__label">お問い合わせの種類 <span class="contact__required">※</span></label>
                    <select class="contact__select" name="category_id">
                        <option selected disabled>選択してください</option>
                    </select>
                    <div class="form__error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <!-- お問い合わせ内容 -->
                <div class="contact__field">
                    <label class="contact__label">お問い合わせ内容 <span class="contact__required">※</span></label>
                    <textarea class="contact__textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                </div>
                <!-- 確認ボタン -->
                <div class="contact__button-container">
                    <button type="submit" class="contact__button">確認画面</button>
                </div>
            </div>
        </form>
    </div>
@endsection