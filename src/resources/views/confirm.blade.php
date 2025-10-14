@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('header')
    @include('layouts.header')
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="{{ route('contact.send') }}" method="post">
        @csrf
        <table class="confirm-table__wrapper">
            <tr class="confirm-table">
                <th class="confirm-table__label">お名前</th>
                <td class="confirm-table__value">
                    <p name="confirm-table--item">{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</p>
                    <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
                    <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
                </td>
            </tr>
            <tr class="confirm-table">
                <th class="confirm-table__label">性別</th>
                <td class="confirm-table__value">
                    <p name="confirm-table--item">
                        @if ($inputs['gender'] == 1)
                        男性
                        @elseif ($inputs['gender'] == 2)
                        女性
                        @else
                        その他
                        @endif
                    </p>
                    <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
                </td>
            </tr>
            <tr class="confirm-table">
                <th class="confirm-table__label">メールアドレス</th>
                <td class="confirm-table__value">
                    <p name="confirm-table--item">{{ $inputs['email'] }}</p>
                    <input type="hidden" name="email" value="{{ $inputs['email'] }}">
                </td>
            </tr>
            <tr class="confirm-table">
                <th class="confirm-table__label">電話番号</th>
                <td class="confirm-table__value">
                    <p name="confirm-table--item">{{ $inputs['tel'] }}</p>
                    <input type="hidden" name="tel1" value="{{ $inputs['tel1'] }}">
                    <input type="hidden" name="tel2" value="{{ $inputs['tel2'] }}">
                    <input type="hidden" name="tel3" value="{{ $inputs['tel3'] }}">
                    <input type="hidden" name="tel" value="{{ $inputs['tel'] }}">
                </td>
            </tr>
            <tr class="confirm-table">
                <th class="confirm-table__label">住所</th>
                <td class="confirm-table__value">
                    <p name="confirm-table--item">{{ $inputs['address'] }}</p>
                    <input type="hidden" name="address" value="{{ $inputs['address'] }}">
                </td>
            </tr>
            <tr class="confirm-table">
                <th class="confirm-table__label">建物名</th>
                <td class="confirm-table__value">
                    <p name="confirm-table--item">{{ $inputs['building'] }}</p>
                    <input type="hidden" name="building" value="{{ $inputs['building'] }}">
                </td>
            </tr>
            <tr class="confirm-table">
                <th class="confirm-table__label">お問い合わせの種類</th>
                <td class="confirm-table__value">
                    <p>{{ $inputs['category_name'] }}</p>
                    <input type="hidden" name="category_id" value="{{ $inputs['category_id'] }}">
                </td>
            </tr>
            <tr class="confirm-table">
                <th class="confirm-table__label">お問い合わせ内容</th>
                <td class="confirm-table__value">
                    <p name="confirm-table--item">{{ $inputs['detail'] }}</p>
                    <input type="hidden" name="detail" value="{{ $inputs['detail'] }}">
                </td>
            </tr>
        </table>

        <div class="confirm__buttons">
            <button class="confirm__button confirm__button--submit" type="submit" name="action" value="submit">送信</button>
            <button class="confirm__button confirm__button--edit" type="submit" name="action" value="back">修正</button>
        </div>
    </form>
</div>
@endsection