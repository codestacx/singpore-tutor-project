<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.components.head')
    @include('application.dashboard.layouts.head')

</head>
<body>

@include('layouts.components.header')

<main class="sl-main">
    <div class="sl-main-section">
        <div class="container">
            <div class="row">
                @include('application.dashboard.layouts.sidebar')
                @yield('content')
            </div>
        </div>
    </div>
</main>


@include('layouts.components.footer')
@include('application.dashboard.layouts.footer')
</body>
</html>
