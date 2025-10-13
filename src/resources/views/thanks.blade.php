@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}" />
@endsection

@section('content')
<div class="thanks">
    <div class="thanks__background-text">Thank you</div>

    <div class="thanks__content">
        <p class="thanks__message">お問い合わせありがとうございました</p>
        <a href="{{ route('contact.index') }}" class="thanks__button">HOME</a>
    </div>
</div>
@endsection