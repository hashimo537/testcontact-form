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

    <div class="confirm-table">
      <table class="confirm-table__inner">

        <tr>
          <th>お名前</th>
          <td>
            {{ $contact['first_name'] }} {{ $contact['last_name'] }}
          </td>
        </tr>

        <tr>
          <th>性別</th>
          <td>
            @if(($contact['gender'] ?? null) == 1) 男性
            @elseif(($contact['gender'] ?? null) == 2) 女性
            @else その他
            @endif
          </td>
        </tr>

        <tr>
          <th>メールアドレス</th>
          <td>{{ $contact['email'] }}</td>
        </tr>

        <tr>
          <th>電話番号</th>
          <td>{{ $contact['tel'] }}</td>
        </tr>

        <tr>
          <th>住所</th>
          <td>{{ $contact['address'] }}</td>
        </tr>

        <tr>
          <th>建物名</th>
          <td>{{ $contact['building'] }}</td>
        </tr>

        <tr>
          <th>お問い合わせの種類</th>
          <td>{{ $category->content ?? '' }}</td>
        </tr>

        <tr>
          <th>お問い合わせ内容</th>
          <td>{{ $contact['detail'] }}</td>
        </tr>

      </table>
    </div>

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
    <!-- 送信ボタン -->
    <button class="form__button-submit" type="submit">送信</button>
    </div>

    <div class="form__button">
    <!-- 修正ボタン -->
    <button class="form__button-back" type="submit" formaction="/" formmethod="get">
    修正
    </button>
    </div>

  </form>
</div>

@endsection