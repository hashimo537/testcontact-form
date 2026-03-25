@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')

    <div class="thanks__content">

        <div class="thanks__background">
            Thank you
        </div>

        <div class="thanks__message">
            <p>お問い合わせありがとうございました</p>
            <a href="/" class="thanks__button">HOME</a>

        </div>

    </div>

@endsection