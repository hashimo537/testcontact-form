@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

<div class="confirm__content">
  <div class="confirm__heading">
    <h2>Confirm</h2>
  </div>

  <form class="form" action="/thanks" method="post">
    @csrf
    
    <table class="confirm-table">

<tr>
<th class="confirm-table__header">お名前</th>
<td class="confirm-table__text">
{{ $contact['first_name'] }} {{ $contact['last_name'] }}
</td>
</tr>

<tr>
<th class="confirm-table__header">性別</th>
<td class="confirm-table__text">
@if(($contact['gender'] ?? null) == 1) 男性
@elseif(($contact['gender'] ?? null) == 2) 女性
@else その他
@endif
</td>
</tr>

<tr>
<th class="confirm-table__header">メールアドレス</th>
<td class="confirm-table__text">{{ $contact['email'] }}</td>
</tr>

<tr>
<th class="confirm-table__header">電話番号</th>
<td class="confirm-table__text">{{ $contact['tel'] }}</td>
</tr>

<tr>
<th class="confirm-table__header">住所</th>
<td class="confirm-table__text">{{ $contact['address'] }}</td>
</tr>

<tr>
<th class="confirm-table__header">建物名</th>
<td class="confirm-table__text">{{ $contact['building'] }}</td>
</tr>

<tr>
<th class="confirm-table__header">お問い合わせの種類</th>
<td class="confirm-table__text">{{ $category->content ?? '' }}</td>
</tr>

<tr>
<th class="confirm-table__header">お問い合わせ内容</th>
<td class="confirm-table__text">{{ $contact['detail'] }}</td>
</tr>

</table>

    <!-- hiddenで値を保持 -->
    <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
    <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
    <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
    <input type="hidden" name="email" value="{{ $contact['email'] }}">
    <input type="hidden" name="tel" value="{{ $contact['tel'] }}">
    <input type="hidden" name="address" value="{{ $contact['address'] }}">
    <input type="hidden" name="building" value="{{ $contact['building'] }}">
    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
    <input type="hidden" name="detail" value="{{ $contact['detail'] }}">

    <div class="form__button">
        <button class="form__button-submit" type="submit">送信</button>
        <button class="form__button-fix" type="button" onclick="history.back()">修正</button>
  </div>

  </form>
</div>

@endsection