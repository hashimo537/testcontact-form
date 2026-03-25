@extends('layouts.admin-app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@endsection


@section('content')
<h1>Admin</h1>

<!-- 検索フォーム -->
<form method="GET" action="/admin" class="search-form">

<input type="text"
name="keyword"
placeholder="名前やメールアドレスを入力してください"
value="{{ request('keyword') }}">

<select name="gender">
<option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
<option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
<option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
</select>

<select name="category_id">
<option value="">お問い合わせの種類</option>

@foreach($categories as $category)

<option value="{{ $category->id }}"
{{ request('category_id') == $category->id ? 'selected' : '' }}>
{{ $category->content }}
</option>

@endforeach

</select>

<input type="date" name="date">

<button type="submit" class="search-button">検索</button>

<a href="/admin">
<button type="button" class="reset-button">リセット</button>
</a>

</form>

<div class="admin-nav">
<!-- エクスポート -->
<div class="export">
    <form method="GET" action="/export">
        <button type="submit" class="export-button">エクスポート</button>
    </form>
</div>
<!-- ページネーション -->
<div class="pagination">
{{ $contacts->links() }}
</div>


</div>

<!-- 一覧テーブル -->
<table>

<tr>
<th>お名前</th>
<th>性別</th>
<th>メールアドレス</th>
<th>お問い合わせ種類</th>
<th></th>
</tr>

@foreach($contacts as $contact)

<tr>
<td>{{ $contact->first_name }} {{ $contact->last_name }}</td>

<td>
@if($contact->gender == 1) 男性
@elseif($contact->gender == 2) 女性
@else その他
@endif
</td>

<td>{{ $contact->email }}</td>

<td>{{ $contact->category->content }}</td>

<td>
<label for="modal-{{ $contact->id }}" class="detail-button">
詳細
</label>
</td>

</tr>

<!-- モーダル -->

<input type="checkbox" id="modal-{{ $contact->id }}" class="modal-toggle">

    <div class="modal">

        <div class="modal-content">

            <label for="modal-{{ $contact->id }}" class="modal-close">×</label>

            <div class="modal-row">
    <span class="modal-label">お名前</span>
    <span class="modal-value">{{ $contact->first_name }} {{ $contact->last_name }}</span>
</div>

<div class="modal-row">
    <span class="modal-label">性別</span>
        <span class="modal-value">
        @if($contact->gender == 1) 男性
        @elseif($contact->gender == 2) 女性
        @else その他
        @endif
        </span>
    </div>

<div class="modal-row">
    <span class="modal-label">メールアドレス</span>
    <span class="modal-value">{{ $contact->email }}</span>
</div>

<div class="modal-row">
    <span class="modal-label">電話番号</span>
    <span class="modal-value">{{ $contact->tel }}</span>
</div>

<div class="modal-row">
    <span class="modal-label">住所</span>
    <span class="modal-value">{{ $contact->address }}</span>
</div>

<div class="modal-row">
    <span class="modal-label">建物名</span>
    <span class="modal-value">{{ $contact->building }}</span>
</div>

<div class="modal-row">
    <span class="modal-label">お問い合わせの種類</span>
    <span class="modal-value">{{ $contact->category->content }}</span>
</div>

<div class="modal-row">
    <span class="modal-label">お問い合わせ内容</span>
    <span class="modal-value">{{ $contact->detail }}</span>
</div>

            <form action="/delete/{{ $contact->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">削除</button>
            </form>


        </div>
    </div>

@endforeach
</table>

@endsection