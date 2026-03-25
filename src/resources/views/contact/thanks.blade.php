@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

<div class="thanks">

    <div class="thanks__bg">Thank you</div>

    <h2 class="thanks__message">お問い合わせありがとうございました</h2>

    <a href="/" class="thanks__btn">
        HOME
    </a>

</div>

@endsection