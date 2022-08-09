@extends('layouts.defaultLayout')


@section('content')
<div class="p-5 bg-white m-auto mt-20   md:w-1/5 xs:w-full xs:h-4/5 rounded-[10px]">
    <div class="bg-white h-full grid grid-rows-3 p-2 gap-3">
        <div class="row-span-2 bg-white shadow-md text-center p-1 rounded">
            <span class="text-blue-200 font-bold">VERIFICATION</span>
            <br> Check your email and verify your account.
        </div>
        <div class="row-span-1 m-auto shadow-xl">
            <a href="https://www.google.com/intl/tr/gmail/about/" target="_blank"
                class="bg-stone-100  hover:bg-white w-2/3 m-auto rounded text-center p-2">
                <span class="font-bold text-red-400">Gmail</span>
                <span class="font-bold text-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mb-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </span>
            </a>
        </div>

    </div>

</div>
@endsection