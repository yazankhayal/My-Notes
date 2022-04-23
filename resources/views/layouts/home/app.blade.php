<!doctype html>
<html lang="en">
<head>
    @include("layouts.home.css")
    @yield('css')
</head>
<body>

@include("layouts.home.loader")

@include("layouts.home.switcher")

<div id="page" class="page">
    @include("layouts.home.header")

    @yield("content")

    @include("layouts.home.footer")

</div>

@include("layouts.home.js")
@yield('js')
</body>
</html>
