@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm">
    <div class="confirm__content">
    <div class="confirm__heading">
        <h2 class="confirm__title">Confirm</h2>
    </div>

    <form action="/thanks" method="post">
    @csrf

    <table class="confirm-table__inner">

    <tr>
    <th class="confirm-table__header">お名前</th>
        <td class="confirm-table__text">
            <div class="name-group">
                <span>{{ $inputs['last_name'] }}</span>
                <span>{{ $inputs['first_name'] }}</span>
            </div>
                <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
        </td>
    </tr>
    <tr>
    <th class="confirm-table__header">性別</th>
        <td class="confirm-table__text">
            <span>
                @if($inputs['gender']==1)男性
                @elseif($inputs['gender']==2)女性
                @else その他
                @endif
            </span>

            <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
        </td>
    </tr>
    <tr>
    <th class="confirm-table__header">メールアドレス</th>
        <td class="confirm-table__text">
            <input type="email" name="email" value="{{ $inputs['email'] }}" readonly>
        </td>
    </tr>
    <tr>
    <th class="confirm-table__header">電話番号</th>
        <td class="confirm-table__text">
            <div class="tel-group">
                <span>{{ $inputs['tel1'] }}</span>
                <span>{{ $inputs['tel2'] }}</span>
                <span>{{ $inputs['tel3'] }}</span>
            </div>
                <input type="hidden" name="tel1" value="{{ $inputs['tel1'] }}">
                <input type="hidden" name="tel2" value="{{ $inputs['tel2'] }}">
                <input type="hidden" name="tel3" value="{{ $inputs['tel3'] }}">
        </td>
    </tr>
    <tr>
    <th class="confirm-table__header">住所</th>
        <td class="confirm-table__text">
            <span>{{ $inputs['address'] }}</span>
            <input type="hidden" name="address" value="{{ $inputs['address'] }}">
        </td>
    </tr>
    <tr>
    <th class="confirm-table__header">建物名</th>
        <td class="confirm-table__text">
            <input type="text" name="building" value="{{ $inputs['building'] }}" readonly>
        </td>
    </tr>
    <tr>
    <th class="confirm-table__header">お問い合わせ種類</th>
        <td class="confirm-table__text">
            <input type="text" value="{{ $category->content }}" readonly>
            <input type="hidden" name="category_id" value="{{ $inputs['category_id'] }}">
        </td>
    </tr>
    <tr>
    <th class="confirm-table__header">お問い合わせ内容</th>
        <td class="confirm-table__text">
            <input type="text" name="detail" value="{{ $inputs['detail'] }}" readonly>
        </td>
    </tr>
    </table>
    <div class="confirm__button">
        <div class="confirm__btn-group">
            <button class="confirm__btn-send" type="submit">送信</button>
            <button type="submit" formaction="/" formmethod="get" class="confirm__link">修正</button>
        </div>
    </div>
    </form>
    </div>
</div>
@endsection