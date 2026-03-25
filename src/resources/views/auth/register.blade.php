@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

@section('header-btn')
    <a href="/login" class="header__btn">login</a>
@endsection
    <h2 class="form__title">Register</h2>

    <div class="form">
        <form action="/register" method="post" novalidate>
        @csrf

        <div class="form__group">
            <div class="form__label">
                お名前
            </div>
            <div class="form__input">
                <input type="text" name="name" placeholder="例：山田 太郎" value="{{ old('name') }}">
                <div class="form__error">
                    @error('name') {{ $message }} @enderror
                </div>
            </div>
        </div>

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
            <button type="submit">登録</button>
        </div>

        </form>
    </div>

@endsection