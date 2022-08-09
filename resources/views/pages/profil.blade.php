@extends('layouts.loggedinLayout')

@section('content')

<div class="grid grid-cols-3 bg-white md:w-1/2 mx-auto mb-2">
    <div class="xs:col-span-3 md:col-span-1 p-3 mx-auto rounded flex">
        <div class="my-auto">
            <img class="w-40 rounded-[9999px] shadow-2xl mx-auto" src="{{$user->avatar}}" alt="">
            <div class="text-center">
                <br><span class="bg-white p-2 rounded shadow-lg">Company Manager</span>
            </div>
        </div>
    </div>
    <div class="xs:col-span-3 md:col-span-2 pt-5 pb-5 pr-5">
        <div class=" h-full w-full p-5 flex">
            <ul class="grid grid-rows-4 gap-5 my-auto w-full">
                <li class="bg-white p-2 rounded shadow-lg text-center"><span class="font-bold"> Name:</span>
                    {{ $user->name }}blabla
                    blabla
                </li>
                <li class="bg-white p-2 rounded shadow-lg text-center"><span class="font-bold"> Email:</span>
                    {{$user->email}}
                    bla@blablabal
                </li>
                <li class="bg-white p-2 rounded shadow-lg text-center"><span class="font-bold"> Phone Number:
                    </span>053964651685</li>
                <li class="bg-white p-2 rounded shadow-lg text-center"><span class="font-bold"> Adress: </span>xyz sok z
                    cad d mah</li>
            </ul>


        </div>
    </div>

</div>

@endsection