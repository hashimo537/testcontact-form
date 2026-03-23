@extends('layouts.admin-app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">

@endsection


@section('content')
<h1>Admin</h1>

<!-- 検索フォーム -->
<form method="GET" action="/admin">

<input type="text" name="keyword" placeholder="名前やメールアドレス">

<select name="gender">
<option value="">性別</option>
<option value="1">男性</option>
<option value="2">女性</option>
<option value="3">その他</option>
</select>

<select name="category_id">
<option value="">お問い合わせの種類</option>
@foreach($categories as $category)
<option value="{{ $category->id }}">
{{ $category->content }}
</option>
@endforeach
</select>

<input type="date" name="date">

<button type="submit">検索</button>

<a href="/admin">
<button type="button">リセット</button>
</a>

</form>

<!-- エクスポート -->
<form method="GET" action="/export">
<button type="submit">エクスポート</button>
</form>

<!-- ページネーション -->
{{ $contacts->links() }}


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

        <h2>お問い合わせ詳細</h2>

        <p>お名前：{{ $contact->first_name }} {{ $contact->last_name }}</p>

        <p>性別：
        @if($contact->gender == 1)
        男性
        @elseif($contact->gender == 2)
        女性
        @else
        その他
        @endif
        </p>

        <p>メールアドレス：{{ $contact->email }}</p>
        <p>電話番号：{{ $contact->tel }}</p>
        <p>住所：{{ $contact->address }}</p>
        <p>建物名：{{ $contact->building }}</p>
        <p>お問い合わせの種類：{{ $contact->category->content }}</p>
        <p>お問い合わせ内容：{{ $contact->detail }}</p>

        <form action="/delete/{{ $contact->id }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit">削除</button>

        </form>


        </div>
    </div>

@endforeach
</table>

@endsection