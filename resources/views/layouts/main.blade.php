<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')

    @stack('styles')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('components.header')
            @include('components.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
                @include('components.settingSidebar')
            </div>
            @include('components.footer')
        </div>
    </div>
    @include('partials.alerts')
    @include('partials.delete-modal')
</body>

@include('partials.script')

@include('partials.delete-script')

@stack('script')

</html>