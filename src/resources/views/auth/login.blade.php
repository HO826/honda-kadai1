@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header-btn')
    <a href="/register" class="header__btn">register</a>
@endsection

@section('content')

<h2 class="form__title">Login</h2>

<div class="form">
    <form action="/login" method="post">
        @csrf

        <div class="form__group">
            <div class="form__label">
                メールアドレス
            </div>
            <div class="form__input">
                <input type="email" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
                <div class="form__error">
                    @error('email') {{ $message }} @enderror
                </div>
            </div>
        </div>

        <div class="form__group">
            <div class="form__label">
                パスワード
            </div>
            <div class="form__input">
                <input type="password" name="password" placeholder="例：パスワードを入力">
                <div class="form__error">
                    @error('password') {{ $message }} @enderror
                </div>
            </div>
        </div>

        <div class="form__button">
            <button type="submit">ログイン</button>
        </div>

    </form>
</div>

@endsection