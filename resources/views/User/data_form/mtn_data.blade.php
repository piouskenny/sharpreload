@extends('Layout.User.app')

@section('content')
    <div class=" pt-[5rem] ">


        <!--modal content-->

        @if (session()->has('success'))
            <div
                class="fixed flex justify-center text-center content-center items-center h-screen  w-screen 
              {{-- bg-gray-300 --}}
               bg-opacity-50 z-50">
                <div
                    class="mt-[10%] fixed top-20 z-60 mx-auto p-5 border w-[90%] md:w-[30%]  shadow-lg rounded-md  bg-white">
                    <div class="mt-3 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Successful!</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">
                                {{ session('success') }}
                            </p>
                        </div>
                        <div class="items-center px-4 py-3 z-50">
                            <a href="{{ route('user.buy_mtn_data') }}">
                                <button id="ok-btn"
                                    class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                    OK
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        @elseif(session()->has('failed'))
            <div
                class="fixed flex justify-center text-center content-center items-center h-screen  w-screen z-50 bg-opacity-50">
                <div
                    class="mt-[10%] fixed top-20 z-60 mx-auto p-5 border w-[90%] md:w-[30%]  shadow-lg rounded-md  bg-white">
                    <div class="mt-3 text-center">

                        <h3 class="text-lg leading-6 font-medium text-red-900">Failed!</h3>
                        <div class="mt-2 px-7 py-3">
                            <p class="text-sm text-gray-500">
                                {{ session('failed') }}
                            </p>
                        </div>
                        <div class="items-center px-4 py-3">
                            <a href="{{ route('user.buy_mtn_data') }}">
                                <button id="ok-btn"
                                    class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                    OK
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        @endif




        <h1 class="text-center font-bold my-4 text-xl text-green-500">BUY MTN DATA</h1>
        <div class=" h-screen w-screen" class="mb-4">

            <div class="flex justify-center w-screen">
                <div class="w-full ">
                    <form action="{{ route('user.buy_mtn_data_request') }}" method="post">
                        @csrf
                        @method('post')

                        <div class="flex justify-center">
                            <input type="number" name="phone_number"
                                class="border-2 px-2 md:h-12 mt-4 rounded-lg md:w-[300px] w-[80%]  h-[8vh] input_focus"
                                min="0" placeholder="Phone Number">
                        </div>
                        <span class="block text-red-500 text-center">
                            @error('phone_number')
                                {{ $message }}
                            @enderror
                        </span>




                        <div class="flex justify-center">
                            <select name="data_plans" id=""
                                class="border-2 px-2 md:h-12 mt-4 rounded-lg md:w-[300px] w-[80%]  h-[8vh] input_focus text-gray-800">
                                <option value="">Select Plan</option>
                                <option value="mtn 1GB">MTN 1GB #240</option>
                                <option value="mtn 2GB">MTN 2GB #300</option>
                                <option value="mtn 3GB">MTN 3GB #500</option>
                                <option value="mtn 4GB">MTN 4GB #600</option>
                                <option value="mtn">MTN 5GB #800</option>
                                <option value="mtn">MTN 6GB #900</option>
                                <option value="mtn">MTN 6GB #1200</option>
                                <option value="mtn">MTN 7GB #1400</option>
                                <option value="mtn">MTN 8GB #1800</option>

                            </select>
                        </div>
                        <span class="block text-red-500 text-center">
                            @error('data_plans')
                                {{ $message }}
                            @enderror
                        </span>



                        <div class="flex justify-center">
                            <input type="text" name="coupon"
                                class="border-2 px-2 md:h-12 mt-4 rounded-lg md:w-[300px] w-[80%]  h-[8vh] input_focus"
                                min="0" placeholder="Coupon Code (Optional)">
                        </div>
                        <p class="block px-10 text-gray-500 mt-2">Leave Blank if you don't have a coupon</p>
                        <span class="block text-red-500 text-center">
                            @error('coupon')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="flex justify-center">
                            <input type="password" name="pin"
                                class="border-2 px-2 md:h-12 mt-4 rounded-lg md:w-[300px] w-[80%]  h-[8vh] input_focus"
                                min="0" placeholder="Pin">
                        </div>
                        <span class="block text-red-500 text-center">
                            @error('pin')
                                {{ $message }}
                            @enderror
                        </span>


                        <div class="my-4 flex justify-center">
                            <button type="submit"
                                class="opacity-80  md:w-[23%] w-[80%] border-2 h-[8vh] text-white bg-green-400 py-1 rounded-md px-5 ">
                                Purchase
                            </button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
    </div>




    </div>
@endsection
