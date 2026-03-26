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
                            <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
                            <span>{{ $inputs['first_name'] }}</span>
                            <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
                        </div>
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
                        <span>{{ $inputs['email'] }}</span>
                        <input type="hidden" name="email" value="{{ $inputs['email'] }}">
                    </td>
                </tr>
                <tr>
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <div class="tel-group">
                            <span>{{ $inputs['tel1'] }}</span>
                            <input type="hidden" name="tel1" value="{{ $inputs['tel1'] }}">
                            <span>{{ $inputs['tel2'] }}</span>
                            <input type="hidden" name="tel2" value="{{ $inputs['tel2'] }}">
                            <span>{{ $inputs['tel3'] }}</span>
                            <input type="hidden" name="tel3" value="{{ $inputs['tel3'] }}">
                        </div>
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
                        <span>{{ $inputs['building'] ?? '' }}</span>
                        <input type="hidden" name="building" value="{{ $inputs['building'] ?? '' }}">
                    </td>
                </tr>
                <tr>
                    <th class="confirm-table__header">お問い合わせ種類</th>
                    <td class="confirm-table__text">
                        <span>{{ $category->content }}</span>
                        <input type="hidden" name="category_id" value="{{ $inputs['category_id'] }}">
                    </td>
                </tr>
                <tr>
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <span>{{ $inputs['detail'] }}</span>
                        <input type="hidden" name="detail" value="{{ $inputs['detail'] }}">
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