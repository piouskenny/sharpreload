@extends('Layout.User.app')

@section('content')
    <div class=" pt-[5rem] ">
        <h1 class="text-center font-bold my-4 text-xl text-green-500">BUY AIRTIME</h1>
        <div class=" h-screen w-screen" class="mb-4 ">

            <div class="grid grid-cols-2 space-x-4 md:space-x-10 px-8 md:px-48 mt-10">

                <div class="col-span-1 text-center bg-white shadow p-1 rounded-md my-2 md:my-6 md:ml-10 ml-4">
                    <a href="{{ route('user.buy_mtn_data') }}">
                        <div class="rounded-[100%] flex justify-center   ">
                            <img src="{{ asset('static_images/icons/MTN.png') }}" class="w-fit h-30" alt="">

                        </div>

                        <div class="text-center text-semibold text-gray-700">
                            MTN
                        </div>
                    </a>

                </div>

                <div class="col-span-1 text-center bg-white shadow p-1 rounded-md my-2 md:my-6">
                    <a href="{{ route('user.buy_airtel_data') }}">

                        <div class="rounded-[100%] flex justify-center  m-auto items-center mt-10 ">
                            <img src="{{ asset('static_images/icons/airtel-logo.png') }}" class="w-fit h-30" alt="">

                        </div>

                        <div class="text-center text-semibold text-gray-700 mt-8">
                            AIRTEL
                        </div>
                    </a>
                </div>

                <div class="col-span-1 text-center bg-white shadow p-1 rounded-md my-2 md:my-6">
                    <a href="{{ route('user.buy_9mobile_data') }}">
                        <div class="rounded-[100%] flex justify-center   ">
                            <img src="{{ asset('static_images/icons/9mobile.png') }}" class=" h-28" alt="">


                        </div>

                        <div class="text-center text-semibold text-gray-700">
                            9MOBILE
                        </div>
                    </a>
                </div>

                <div class="col-span-1 text-center bg-white shadow p-1 rounded-md my-2 md:my-6">
                    <a href="{{ route('user.buy_glo_data') }}">

                        <div class="rounded-[100%] flex justify-center   ">
                            <img src="{{ asset('static_images/icons/9mobile.png') }}" class=" h-28" alt="">


                        </div>

                        <div class="text-center text-semibold text-gray-700">
                            GLO
                        </div>
                    </a>
                </div>
            </div>


        </div>
    </div>



    </div>
@endsection
