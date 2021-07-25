<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    @include('admin.layout.header')
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
         data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('admin.layout.navbar')
        <div class="page-wrapper">
            @yield('content')
            @include('admin.layout.footer')
        </div>
    </div>
    @include('admin.layout.script')
</body>

</html>
