<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @powerGridStyles
    @livewireStyles
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.2/dist/flowbite.min.css" />
</head>

<body class="place-items-center bg-[#f4f4f4]">
    <div class="grid grid-cols-5">
        <div class="grid  lg:grid-cols-1 gap-5 lg:block xs:hidden mb-8 ">
            <div class="bg-[#ffffff]/95 fixed h-full w-1/5 ">
                <div class="h-28 flex justify-center bg-[#ffffff]">
                    <img src="https://cdn.dribbble.com/users/1266491/screenshots/3671609/media/9eac6f4eb377d901d3c63b945eab92d1.png?compress=1&resize=400x300&vertical=top"
                        class="h-full">
                </div>

                <div class="">
                    @include('components.sidebar')
                </div>
            </div>
        </div>
        <div class="lg:col-span-4 xs:col-span-5 ">
            <div class="bg-[#ffffff] p-5 fixed lg:w-4/5 xs:w-full md:w-full  z-10 h-28">
                <div class=""> @include('components.header') </div>
            </div>
            <div class="md:mx-10 xs:mt-[130px]">
                @yield('content')
            </div>
            <div class="bg-[#ffffff] text-center  lg:mt-5 lg:my-10 md:m-10">
                <div class="">@include('components.footer')</div>
            </div>
        </div>
    </div>
    {{-- --}}
    {{-- @include('elements.footer-scripts')--}}
    @livewire('livewire-ui-modal')
    @powerGridScripts
    @livewireScripts

    <script src="https://unpkg.com/flowbite@1.5.2/dist/flowbite.js"></script> -->
</body>

</html>