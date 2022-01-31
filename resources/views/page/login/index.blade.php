@extends('layout.frame')

@section('title', 'login - Laratify')

@include('block.head')

@section('css')
  <link rel="stylesheet" href="/css/login/style.css" media="screen">
@endsection

@section('main')
  <div class="div_title">
    <h2 class="title">Laratify</h2>
  </div>

  @include('block.header')
  @include('block.nav.error')

  <div class="display">
    <form id="form" method="post">
      @csrf

      <div class="container">
        <div class="div_subject">
          <div class="subject">
            <label for="email">メールアドレス</label>
          </div>

          <input id="email" type="text" name="email" class="text" placeholder="メールアドレス" required value="{{ old('email') }}">
        </div>

        <div class="div_subject">
          <div class="subject">
            <label for="password">パスワードを設定してください。</label>
          </div>

          <input id="password" type="password" name="password" class="text" placeholder="パスワードを設定してください。" required>
        </div>

        <a href="password/reset" id="reset-password-link" class="reset_link">パスワードをお忘れですか?</a>

        <div class="div_login">
          <div class="div_remeber">
            <label for="remember_checkbox" class="remember_checkbox">
              <input type="checkbox" id="remember_checkbox" name="remember_checkbox">
              <span class="remember_checkbox_dummy"></span>
              <span>
                ログイン情報を記憶する
              </span>
            </label>
          </div>

          <div>
            <div class="div_submit_button">
              <button type="submit" id="submit" class="submit_button">
                <div>ログイン</div>
              </button>
            </div>
          </div>
        </div>
      </div>
    </form>

    <hr class="hr">

    <div>
      <form action="{{ route('register') }}" method="get">
        <p class="not_account_p">アカウントをお持ちでない場合は</p>
        <button type="submit" id="sign-up-link" class="register_button">
          <p>Laratifyに登録する</p>
        </button>
      <form>
    </div>
  </div>

@endsection


@section('script')

@endsection
