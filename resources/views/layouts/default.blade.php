<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!-- MyStyle -->
    <link href="{{ asset('/assets/mycss/styles.css') }}" rel="stylesheet">
</head>
<body>


<div class="container">
    {{-- コンテンツの表示 --}}
    @yield('content')
</div>

</body>
</html>
