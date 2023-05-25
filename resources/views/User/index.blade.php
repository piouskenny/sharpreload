@extends('Layout.User.app')

@section('content')
    <div class="pt-[5rem] ">
        <div class=" h-screen" class="mb-4">
            <div class="flex flex-col flex-1 items-center  justify-center   md:mt-0 mx-2">
                <div
                    class="p-3 justify-end items-start flex-col rounded-xl h-[13rem] md:h-48 sm:w-72 w-full my-5 eth-card white-glassmorpism">
                    <div class="flex justify-between flex-col w-full h-full">
                        <div class="flex justify-between items-start">
                            <div class="w-10 h-10 rounded-md text-white bg-yellow-400 flex justify-center items-center">
                            </div>
                            <span>
                                <img src={{ asset('icons/airteime.svg') }} alt="">
                            </span>
                        </div>
                        <div>
                            <p class="text-white font-light text-2xl md:text-xl">
                                {{ $user->full_name }}
                            </p>
                            @php
                                $balance = $user->userAccount->account_balance;
                            @endphp
                            <p class="text-white font-semibold mt-4  md:text-lg text-3xl nd:mt-1">
                                {{-- <i>&racute;</i> --}}
                                Balance
                                ₦{{ $balance }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>


            {{-- Quick Actions Section --}}

            @include('components.dashboard_components.quickactions')


            {{-- Contact Support, Price List Referals --}}

            @include('components.dashboard_components.other_links')


            {{-- Popular Data plans  --}}
            @include('components.dashboard_components.popularplans')
        </div>
    </div>
@endsection
