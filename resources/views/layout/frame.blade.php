<!DOCTYPE html>
<html lang="ja">
    <head>
        @yield('head')
        @yield('css')

        {{-- エラーメッセージ用 --}}
        <link rel="stylesheet" href="/css/block/nav/error/style.css" media="screen">
    </head>
    <body>
        <div>
            @yield('main')
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

        @yield('script')
    </body>
</html>
