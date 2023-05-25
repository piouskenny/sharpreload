@extends('Layout.User.app')

@section('content')
    <div class=" pt-[5rem] ">
        <h1 class="text-center font-bold my-4 text-xl text-green-500">BUY 9MOBILE DATA</h1>
        <div class=" h-screen w-screen" class="mb-4">

            <div class="flex justify-center w-screen">
                <div class="w-full ">
                    <form action="" method="post">
                        @csrf
                        @method('post')

                        <div class="flex justify-center">
                            <input type="number" name="phone_number"
                                class="border-2 px-2 md:h-12 mt-4 rounded-lg md:w-[300px] w-[80%]  h-[8vh] input_focus"
                                min="0" placeholder="Phone Number">
                        </div>
                        <span class="block text-red-500 text-center">
                            @error('amount')
                                {{ $message }}
                            @enderror
                        </span>


                        <div class="flex justify-center">
                            <select name="netword" id=""
                                class="border-2 px-2 md:h-12 mt-4 rounded-lg md:w-[300px] w-[80%]  h-[8vh] input_focus text-gray-800">
                                <option value="mtn">Select Network</option>
                                <option value="mtn">MTN</option>
                                <option value="mtn">Airtel</option>
                                <option value="mtn">GLO</option>
                                <option value="mtn">9Mobile</option>

                            </select>
                        </div>
                        <span class="block text-red-500 text-center">
                            @error('amount')
                                {{ $message }}
                            @enderror
                        </span>


                        <div class="flex justify-center">
                            <select name="netword" id=""
                                class="border-2 px-2 md:h-12 mt-4 rounded-lg md:w-[300px] w-[80%]  h-[8vh] input_focus text-gray-800">
                                <option value="mtn">Select Plan</option>
                                <option value="mtn">MTN 1GB #240</option>
                                <option value="mtn">MTN 2GB #300</option>
                                <option value="mtn">MTN 3GB #500</option>
                                <option value="mtn">MTN 4GB #600</option>
                                <option value="mtn">MTN 5GB #800</option>
                                <option value="mtn">MTN 6GB #900</option>
                                <option value="mtn">MTN 6GB #1200</option>
                                <option value="mtn">MTN 7GB #1400</option>
                                <option value="mtn">MTN 8GB #1800</option>

                            </select>
                        </div>
                        <span class="block text-red-500 text-center">
                            @error('amount')
                                {{ $message }}
                            @enderror
                        </span>



                        <div class="flex justify-center">
                            <input type="text" name="pin"
                                class="border-2 px-2 md:h-12 mt-4 rounded-lg md:w-[300px] w-[80%]  h-[8vh] input_focus"
                                min="0" placeholder="Coupon Code (Optional)">
                        </div>
                        <span class="block text-red-500 text-center">
                            @error('amount')
                                {{ $message }}
                            @enderror
                        </span>

                        <div class="flex justify-center">
                            <input type="password" name="pin"
                                class="border-2 px-2 md:h-12 mt-4 rounded-lg md:w-[300px] w-[80%]  h-[8vh] input_focus"
                                min="0" placeholder="Pin">
                        </div>
                        <span class="block text-red-500 text-center">
                            @error('amount')
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
