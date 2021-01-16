<!DOCTYPE html>
<html>
<head>
    @include('admin.layouts.head')
</head>
<body>
@include('admin.layouts.sidenav')
<div class="page">
    <!-- navbar-->
@include('admin.layouts.header')
<!-- Counts Section -->
    @yield('content')
{{-- @include('admin.layouts.footer') --}}
</body>
</html>
