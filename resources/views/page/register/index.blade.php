@extends('layout.frame')

@section('title', 'Register')

@include('block.head')

@section('css')
  <link rel="stylesheet" href="/css/register/style.css" media="screen">
@endsection


@section('main')
  @include('block.header')
  @include('block.nav.error')

  <div class="display">
    <form id="form" method="post">
      @csrf

      <h2 class="title">Laratify</h2>
      <div class="div_subject">
        <div class="subject">
          <label for="email" class="">あなたのメールアドレス</label>
        </div>

        <input type="email" aria-invalid="false" id="email" name="email" placeholder="メールアドレスを入力してください。" required value="{{ old('email') }}" class="text">
      </div>

      <div class="div_subject">
        <div class="subject">
          <label for="password" class="">パスワードを作成</label>
        </div>

        <input type="password" aria-invalid="false" autocomplete="new-password" id="password" pattern="^(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)(?=.*?[!-/:-@[-`{-~])[!-~]{8,}$" name="password" placeholder="パスワードを作成。" required class="text">
        <div class="subject_info">半角英小文字大文字数字記号をそれぞれ1種類以上含む8文字以上</div>
      </div>

      <div class="div_subject">
        <div class="subject">
          <label for="name" class="">表示名は何にしますか？</label>
        </div>

        <input type="text" aria-invalid="true" id="name" name="name" placeholder="プロフィール名を入力します。" required value="{{ old('name') }}" class="text">

        <div class="subject_info">これはプロフィールに表示されます。</div>
      </div>

      <div>
        <div class="div_subject">
          <label for="agree_checkbox" class="agree_checkbox">
            <input type="checkbox" id="agree_checkbox" name="agree_checkbox" required="">
            <span class="agree_checkbox_dummy"></span>
            <span>
              {{-- route作ったら書き換える必要がある --}}
              <a href="/agreement" target="_blank" rel="noopener noreferrer" class="url">Testifyの利用規約</a>に同意します。
            </span>
          </label>

          <p id="agreeError" class="error_message default_display_none">利用規約に同意の上、チェックをつけてください。</p>
        </div>

        <div class="div_subject">
          <div class="submit">
            <button type="button" class="submit_button" onclick="checkAgreeAndSubmit();">
              <div class="">登録する</div>
            </button>
          </div>

          <p class="account_have">
            <span class="">アカウントをお持ちですか？<a href="{{ route('login') }}" class="url">ログイン</a>。</span>
          </p>
        </div>
      </div>
    </form>
  </div>
@endsection


@section('script')
  <script type="text/javascript">
    function displayError() {
      const agreeError = $('#agreeError');
      agreeError.css('display', 'block');
    }

    function registerSubmit() {
      const form = $('#form');
      form.submit();
    }

    function checkAgreeAndSubmit() {
      const checkbox = $('#agree_checkbox');
      if (checkbox.is(':checked')) {
        registerSubmit();
      }
      else {
        displayError();

        return false;
      }
    }
  </script>
@endsection
