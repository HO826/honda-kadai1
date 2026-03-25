@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="form">
<h2>Contact</h2>

<form action="/confirm" method="post">
@csrf

<div class="form__group">
    <div class="form__label">
        お名前 <span class="required">※</span>
    </div>
    <div class="form__input">
        <div style="display:flex; gap:10px;">
            <input type="text" name="last_name" placeholder="例：山田" value="{{ old('address') }}">
            <input type="text" name="first_name" placeholder="例：太郎" value="{{ old('address') }}">
        </div>
        <div class="form__error">
            @error('last_name') {{ $message }} @enderror
            @error('first_name') {{ $message }} @enderror
        </div>
    </div>
</div>

<div class="form__group">
    <div class="form__label">
        性別 <span class="required">※</span>
    </div>
    <div class="form__input">
        <label>
            <input type="radio" name="gender" value="1" {{ old('gender')==1?'checked':'' }}> 男性
        </label>
        <label style="margin-left:20px;">
            <input type="radio" name="gender" value="2" {{ old('gender')==2?'checked':'' }}> 女性
        </label>
        <label style="margin-left:20px;">
            <input type="radio" name="gender" value="3" {{ old('gender')==3?'checked':'' }}> その他
        </label>
        <div class="form__error">
            @error('gender') {{ $message }} @enderror
        </div>
    </div>
</div>

<div class="form__group">
    <div class="form__label">
        メールアドレス <span class="required">※</span>
    </div>
    <div class="form__input">
        <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}">
        <div class="form__error">
            @error('email') {{ $message }} @enderror
        </div>
    </div>
</div>

<div class="form__group">
    <div class="form__label">
        電話番号 <span class="required">※</span>
    </div>
    <div class="form__input">
        <div style="display:flex; gap:10px;">
            <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
            <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
            <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
        </div>
        <div class="form__error">
            @error('tel1') {{ $message }} @enderror
            @error('tel2') {{ $message }} @enderror
            @error('tel3') {{ $message }} @enderror
        </div>
    </div>
</div>

<div class="form__group">
    <div class="form__label">
        住所 <span class="required">※</span>
    </div>
    <div class="form__input">
        <input type="text" name="address" placeholder="東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
        <div class="form__error">
            @error('address') {{ $message }} @enderror
        </div>
    </div>
</div>

<div class="form__group">
    <div class="form__label">建物名</div>
    <div class="form__input">
        <input type="text" name="building" placeholder="千駄ヶ谷マンション101" value="{{ old('building') }}">
    </div>
</div>

<div class="form__group">
    <div class="form__label">
        お問い合わせの種類 <span class="required">※</span>
    </div>
    <div class="form__input">
        <select name="category_id">
            <option value="">選択してください</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id')==$category->id?'selected':'' }}>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
        <div class="form__error">
            @error('category_id') {{ $message }} @enderror
        </div>
    </div>
</div>

<div class="form__group">
    <div class="form__label">
        お問い合わせ内容 <span class="required">※</span>
    </div>
    <div class="form__input">
        <textarea name="detail" placeholder="お問い合わせ内容をご記入ください">{{ old('detail') }}</textarea>
        <div class="form__error">
            @error('detail') {{ $message }} @enderror
        </div>
    </div>
</div>

<div class="form__button">
    <button type="submit">確認画面</button>
</div>

</form>
</div>

@endsection