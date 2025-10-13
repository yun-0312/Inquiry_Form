@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/modal.css') }}">
@endsection

@section('header')
@extends('layouts.header_login')
@endsection

@section('content')
<div class="admin">
    <h2 class="admin__title">Admin</h2>
    <div class="search__wrap">
        <form class="search-form" action="{{ route('admin.index') }}" method="get">
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前やメールアドレスを入力してください">
                <select name="gender" class="search-form__item-select">
                    <option value="" disabled {{ request('gender') === null || request('gender') === '' ? 'selected' : '' }}>性別</option>
                    <option value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>全て</option>>
                    <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
                </select>
                <select name="category_id" class="search-form__item-select">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value=" {{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                    @endforeach
                </select>
                <input type="date" name="created_at" class="search-form__item-filter" value="{{ request('created_at') }}">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-search" type="submit">検索</button>
                <a href="{{ route('admin.index') }}" class="admin__reset-button">リセット</a>
            </div>
        </form>
    </div>
    <div class="export__button">
        <a href="{{ route('admin.export', request()->query()) }}" class="export-button">エクスポート</a>
    </div>
    <div class="pagination-wrapper">
        {{ $contacts->appends(request()->query())->links() }}
    </div>
    <table class="admin-table">
        <tr class="admin-table__head">
            <th>ID</th>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="admin-table__body">
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>
                @if ($contact->gender == 1)
                男性
                @elseif ($contact->gender == 2)
                女性
                @else
                その他
                @endif
            </td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content }}</td>
            <td><button class="detail-button" data-id="{{ $contact->id }}">詳細</button></td>
        </tr>
        @endforeach
    </table>

    <!-- モーダル -->
    <div id="contactModal" class="modal">
        <div class="modal__overlay"></div>
        <div class="modal__content">
            <button class="modal__close">&times;</button>
            <div id="modalContent"></div>
        </div>
    </div>
</div>
<script src="{{ asset('js/modal.js') }}"></script>
@endsection