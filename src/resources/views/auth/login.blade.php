@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset ('css/login.css') }}">
@endsection

@section('content')
<div class="login-form__content"> <!-- 全体枠を指定 -->
  <div class="login-form__heading"> 
    <h2>ログイン</h2>
  </div>
  <form class="form" action="/login" method="post"> <!-- ログインフォーム CSSでは枠と配置を指定 -->
    @csrf
    <div class="form__group"> <!-- アイテムごとに余白 -->
      <div class="form__group-title"> <!-- タイトルの配置 -->
        <span class="form__label--item">メールアドレス</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text"> <!-- 入力フォーム枠の設定 -->
          <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form__error"> <!-- エラーの書式 -->
          @error('email')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__group">
      <div class="form__group-title">
        <span class="form__label--item">パスワード</span>
      </div>
      <div class="form__group-content">
        <div class="form__input--text">
          <input type="password" name="password">
        </div>
        <div class="form__error">
          @error('password')
          {{ $message }}
          @enderror
        </div>
      </div>
    </div>
    <div class="form__button">
      <button class="form__button-submit" type="submit">ログイン</button>
    </div>
   </form>
   <div class="register__link">
    <a class="register__button-submit" href="/register">会員登録の方はこちら</a>
   </div>
</div>
@endsection