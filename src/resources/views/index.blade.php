@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('header')
    @extends('layouts.header')
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
                    <input type="text" name="last_name" class="contact__input--name" placeholder="例: 山田" value="{{ old('last_name') }}">
                    <input type="text" name="first_name" class="contact__input--name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                </div>
                <div class="form__error">
                    @error('first_name')
                    <p class="validation__error">{{ $message }}</p>
                    @enderror
                    @error('last_name')
                    <p class="validation__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- 性別 -->
            <div class="contact__field">
                <label class="contact__label">性別 <span class="contact__required">※</span></label>
                <div class="contact__radio-group">
                    <label for="gender1">
                        <input type="radio" name="gender" id="gender1" value="1" {{ old('gender',1) == 1 ? 'checked' : '' }}>
                        男性
                    </label>
                    <label for="gender2">
                        <input type="radio" name="gender" id="gender2" value="2" {{ old('gender') == 2 ? 'checked' : '' }}>
                        女性
                    </label>
                    <label for="gender3">
                        <input type="radio" name="gender" id="gender3" value="3" {{ old('gender') == 3 ? 'checked' : '' }}>
                        その他
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                    <p class="validation__error">{{ $message }}</p>
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
                <p class="validation__error">{{ $message }}</p>
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
                    @error('tel1')
                    <p class="validation__error">{{ $message }}</p>
                    @enderror
                    @error('tel2')
                    <p class="validation__error">{{ $message }}</p>
                    @enderror
                    @error('tel3')
                    <p class="validation__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- 住所 -->
            <div class="contact__field">
                <label class="contact__label">住所 <span class="contact__required">※</span></label>
                <input type="text" name="address" class="contact__input" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                <div class="form__error">
                    @error('address')
                    <p class="validation__error">{{ $message }}</p>
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
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}
                    </option>
                    @endforeach
                </select>
                <div class="form__error">
                    @error('category_id')
                    <p class="validation__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- お問い合わせ内容 -->
            <div class=" contact__field">
                <label class="contact__label">お問い合わせ内容 <span class="contact__required">※</span></label>
                <textarea class="contact__textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                <div class="form__error">
                    @error('detail')
                    <p class="validation__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- 確認ボタン -->
            <div class="contact__button-container">
                <button type="submit" class="contact__button">確認画面</button>
            </div>
        </div>
    </form>
</div>
@endsection