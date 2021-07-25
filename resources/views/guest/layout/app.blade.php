<!DOCTYPE html>
<html lang="en">
<head>
@include('guest.layout.header')
</head>
<body id="page-top">
<!-- Navigation-->
@include('guest.layout.navbar')
<!-- Page Content-->
@yield('content')
@include('guest.layout.script')
</body>
</html>
