<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>
    <div class="container bg-cyan-50/30">
        {{-- @include('elements.header')
        @include('elements.sidebar') --}}

        <div class="content-body">
            @yield('content')
        </div>
        {{-- @include('elements.footer')--}}
    </div>
    {{-- @include('elements.footer-scripts')--}}

    @livewireScripts
</body>

</html>