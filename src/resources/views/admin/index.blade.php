@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header-btn')
    <form action="/logout" method="post">
        @csrf
        <button class="header__btn">logout</button>
    </form>
@endsection

@section('content')
<div class="admin">

    <h2 class="admin__title">Admin</h2>

    <form class="search-form" method="GET" action="/admin">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
        <select name="gender">
            <option value="">性別</option>
            <option value="1" {{ request('gender')==1 ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender')==2 ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender')==3 ? 'selected' : '' }}>その他</option>
        </select>
        <select name="category">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>
        <input type="date" name="date" value="{{ request('date') }}">
        <button type="submit">検索</button>
        <a href="/reset" class="reset-btn">リセット</a>
    </form>

    <div class="admin-header">
        <a href="/admin/export?{{ http_build_query(request()->query()) }}">
            エクスポート</a>
        {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
    </div>
    <table class="admin-table">
        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th>
        </tr>

        @foreach($contacts as $contact)
        <tr>
            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
            <td>
                @if($contact->gender == 1)
                    男性
                @elseif($contact->gender == 2)
                    女性
                @else
                    その他
                @endif
            </td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->category->content ?? '' }}</td>
            <td>
                <a href="#" class="detail-btn"
                    data-id="{{ $contact->id }}"
                    data-name="{{ $contact->last_name }} {{ $contact->first_name }}"
                    data-gender="{{ $contact->gender }}"
                    data-email="{{ $contact->email }}"
                    data-category="{{ $contact->category->content ?? '' }}"
                    data-tel="{{ $contact->tel }}"
                    data-address="{{ $contact->address }}"
                    data-building="{{ $contact->building }}"
                    data-detail="{{ $contact->detail }}">
                    詳細
                </a>
            </td>
        </tr>
        @endforeach

    </table>
    <div id="modal" class="modal">
        <div class="modal-content">
        <span class="close">&times;</span>
            <p>お名前：<span id="modal-name"></span></p>
            <p>性別：<span id="modal-gender"></span></p>
            <p>メール：<span id="modal-email"></span></p>
            <p>種類：<span id="modal-category"></span></p>
            <p>電話番号：<span id="modal-tel"></span></p>
            <p>住所：<span id="modal-address"></span></p>
            <p>建物名：<span id="modal-building"></span></p>
            <p>内容：<span id="modal-detail"></span></p>
            <form id="delete-form" action="/delete" method="POST">
            @csrf
                <input type="hidden" name="id" id="modal-id">
                <button class="delete-btn" type="submit" onclick="return confirm('削除しますか？')">
                    削除
                </button>
            </form>
        </div>
    </div>

<script>
document.querySelectorAll('.detail-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();

        document.getElementById('modal-name').textContent = this.dataset.name;
        let genderText = '';
        if (this.dataset.gender == 1) {
            genderText = '男性';
        } else if (this.dataset.gender == 2) {
            genderText = '女性';
        } else {
            genderText = 'その他';
        }
        document.getElementById('modal-gender').textContent = genderText;
        document.getElementById('modal-email').textContent = this.dataset.email;
        document.getElementById('modal-category').textContent = this.dataset.category;
        const tel = this.dataset.tel.replace(/-/g, '');
        document.getElementById('modal-tel').textContent = tel;
        const address = this.dataset.address.replace(/^\d{7}\s?/, '');
        document.getElementById('modal-address').textContent = address;
        const building = this.dataset.building;

        if (building) {
            document.getElementById('modal-building').textContent = building;
        } else {
            document.getElementById('modal-building').textContent = '';
        }
        document.getElementById('modal-detail').textContent = this.dataset.detail;

        document.getElementById('modal').style.display = 'block';

        document.getElementById('modal-id').value = this.dataset.id;
    });
});

document.querySelector('.close').addEventListener('click',     function() {
    document.getElementById('modal').style.display = 'none';
});
</script>

</div>
@endsection