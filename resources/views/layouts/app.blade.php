<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.components.head')
    @section('title','Online Tutor')
</head>
<body>
    @include('layouts.components.header')
        @yield('content')
    @include('layouts.components.footer')
</body>
</html>
