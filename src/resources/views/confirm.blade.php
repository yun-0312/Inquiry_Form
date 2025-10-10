@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form">
        <table class="confirm-table">
            <tr class="confirm-table__row">
                <th class="confirm-table__label">お名前</th>
                <td class="confirm-table__value">山田　太郎</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__label">性別</th>
                <td class="confirm-table__value">男性</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__label">メールアドレス</th>
                <td class="confirm-table__value">test@example.com</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__label">電話番号</th>
                <td class="confirm-table__value">08012345678</td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__label">住所</th>
                <td class="confirm-table__value">
                    東京都渋谷区千駄ヶ谷1-2-3<br>
                    千駄ヶ谷マンション101
                </td>
            </tr>
            <tr class="confirm-table__row">
                <th class="confirm-table__label">お問い合わせ内容</th>
                <td class="confirm-table__value">
                    届いた商品が注文した商品ではありませんでした。<br>
                    商品の取り替えをお願いします。
                </td>
            </tr>
        </table>

        <div class="confirm__buttons">
            <button class="confirm__button confirm__button--submit">送信</button>
            <button class="confirm__button confirm__button--edit">修正</button>
        </div>
    </form>
</div>
@endsection