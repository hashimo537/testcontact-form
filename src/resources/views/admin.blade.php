@extends('layouts.admin-app')
<style>
  th {
    background-color: #289ADC;
    color: white;
    padding: 5px 40px;
  }

  tr:nth-child(odd) td {
    background-color: #FFFFFF;
  }

  td {
    padding: 25px 40px;
    background-color: #EEEEEE;
    text-align: center;
  }

  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>

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
<th>メール</th>
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

@endforeach

</table>

<!-- モーダル -->

<div id="modal" style="display:none">

<div class="modal-content">

<h2>お問い合わせ詳細</h2>

<p>名前：<span id="modal-name"></span></p>
<p>メール：<span id="modal-email"></span></p>

<form id="delete-form" method="POST">
@csrf
@method('DELETE')

<button type="submit">削除</button>

</form>

<button onclick="closeModal()">閉じる</button>

</div>

</div>


@endsection