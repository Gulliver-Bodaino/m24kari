<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- meta name="viewport" content="width=device-width, initial-scale=1" -->
        <!-- meta name="viewport" content="initial-scale=1.0" -->
        <!-- meta name="viewport" content="width=767, initial-scale=1.0" -->
        <meta name="viewport">
        <title>@yield('title') | ＩＴソフトウェア業界の人材に関する意識調査 | 日本M&Aセンター</title>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
        {{-- 共通で使用するjavascript --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/otk247.css') }}">
    </head>
    <body>
        
        <!-- ヘッダー -->
            @include('layouts.header')
        <!-- ヘッダー ここまで -->

        <!-- メイン -->
            @yield('main')
        <!-- メイン ここまで -->
        
        <!-- フッター -->
            @include('layouts.footer')
        <!-- フッター ここまで -->
    </body>
</html>