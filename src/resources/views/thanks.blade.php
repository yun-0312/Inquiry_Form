@extends('layouts.app')

@section('content')
<div class="thanks__content">
    <h2>送信が完了しました</h2>
    <p>お問い合わせありがとうございました。</p>
    <a href="{{ route('contact.index') }}">トップへ戻る</a>
</div>
@endsection