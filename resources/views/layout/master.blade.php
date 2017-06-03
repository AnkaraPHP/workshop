<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="AnkaraPHP">
    <title>@yield('title', "AnkaraPHP Laravel Workshop")</title>
    <!-- Stylesheet-->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <!-- Page Styles-->
    @yield('css')
</head>
<body class="@yield('body.class')">
@yield('body')
<!-- Javascript-->
<script src="{{ asset('assets/js/app.js') }}"></script>
@if(session("success"))
<script>
    alert("{{ session('success') }}");
</script>
@endif
</body>
</html>