@extends('Layout.User.app')

@section('content')
    <div class="flex justify-center">
        <div class="pt-[6rem] w-full max-w-sm border border-gray-200 rounded-lg shadow  mb-28">
            <h1 class="text-center font-bold  text-xl text-green-500">PROFILE</h1>



            {{-- ALERT MODEL FOR SUCCESS --}}
            <div class="flex justify-center">
                @if (session()->has('success'))
                    <!--modal content-->
                    <div
                        class="fixed flex justify-center text-center content-center items-center h-screen  w-screen bg-gray-300 bg-opacity-50">
                        <div
                            class="mt-[10%] fixed top-20 z-60 mx-auto p-5 border md:w-[30%] w-[90%] shadow-lg rounded-md  bg-white">
                            <div class="mt-3 text-center">
                                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Successful!</h3>
                                <div class="mt-2 px-7 py-3">
                                    <p class="text-sm text-gray-500">
                                        {{ session('success') }}
                                    </p>
                                </div>
                                <div class="items-center px-4 py-3">
                                    <a href="{{ route('user.profile') }}">
                                        <button id="ok-btn"
                                            class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                            OK
                                        </button>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @elseif (session()->has('message_error'))
                    <div class="text-red-800 bg-red-300 py-10 my-4 w-[300px]">
                        {{ session('message_error') }}
                    </div>
                @endif
            </div>
            {{-- Modal Ends Here --}}


            <div class="flex flex-col items-center pb-10 pt-10">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset('profile.PNG') }}"
                    alt="{{ $user->username }} Image" />
                <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $user->username }}</h5>
                <div class="text-start px-10">
                    <span class="text-md text-gray-500 dark:text-gray-600 my-2  block">{{ $user->full_name }}</span>
                    <span class="text-md text-gray-500 dark:text-gray-600 my-2  block">Email: {{ $user->email }}</span>
                    <span class="text-md text-gray-500 dark:text-gray-600 my-2  block">Phone Number:
                        {{ $user->phone_number }}</span>

                    <hr class=" h-1 bg-gray-300 w-[90%] text-center mt-4">
                    <span class="text-md text-gray-500 dark:text-gray-500 my-1 w-[70%] overflow-y-auto ">
                        Referral Link: <a href="https://www.sharpreload.com/{{ $user->username }}"
                            target="blank">https://www.sharpreload.com/{{ $user->username }}</a>

                    </span>

                </div>

                <span class="text-md text-gray-500 dark:text-gray-600 mt-4">Person Bank Account Details</span>

                <div class="text-start">
                    @if ($user->userAdditionInfo)
                        <span class="text-md text-gray-500 dark:text-gray-600 my-1 block">Bank Name:
                            {{ $user->userAdditionInfo->bank_name }}
                        </span>
                        <span class="text-md text-gray-500 dark:text-gray-600 my-1 block">Account Number:
                            {{ $user->userAdditionInfo->account_number }}
                        </span>
                        <span class="text-md text-gray-500 dark:text-gray-600 my-1 block">Account Name:
                            {{ $user->userAdditionInfo->account_name }}

                        </span>
                    @else
                        <p class="text-red-600 mt-2">
                            You've not added your personal Account details
                        </p>
                        <div class="flex justify-center mt-2">
                            <a href="#" class="bg-green-400 rounded text-white px-2 mt-2 py-1" id="model_show">Click
                                Here
                                to add</a>
                        </div>
                        <div class="flex justify-center">
                            <!--modal content-->
                            <div id="form_modal"
                                class="hidden fixed  justify-center text-center content-center items-center h-screen  w-screen bg-gray-300 bg-opacity-50">
                                <div
                                    class="mt-[2%] fixed top-20 z-60 mx-auto p-5 border w-[90%]  md:w-[40%] shadow-lg rounded-md  bg-white">
                                    <div class="mt-3 text-center">
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Alert!!!</h3>
                                        <p class="text-red-400">Your Personal Account will be used to process your
                                            withdrawel
                                        </p>
                                        <div class="mt-2 px-7 py-3">
                                            <form action="{{ route('user.add_bank_account') }}" method="post">
                                                @csrf
                                                @method('post')

                                                <div class="">
                                                    <input type="number" name="account_number"
                                                        class="border-2 px-2 md:h-12 mt-2 rounded-lg md:w-[300px] w-[80%] h-[7vh] input_focus"
                                                        min="0" placeholder="Account Number">

                                                    <span class="block text-red-500 text-center">
                                                        @error('account_number')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>


                                                <div class="">
                                                    <input type="text" name="account_name"
                                                        class="border-2 px-2 md:h-12 mt-2 rounded-lg md:w-[300px] w-[80%] h-[7vh] input_focus"
                                                        min="0" placeholder="Account Name">

                                                    <span class="block text-red-500 text-center">
                                                        @error('account_name')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>


                                                <div class="">
                                                    <select name="bank_name" id=""
                                                        class="border-2 px-2 md:h-12 mt-2 rounded-lg md:w-[300px] w-[80%] h-[7vh] input_focus">
                                                        <option value="">select Bank</option>
                                                        <option value="uba">UBA</option>
                                                        <option value="first_bank">FIRST BANK</option>
                                                        <option value="kuda">KUDA MFB</option>
                                                        <option value="zenith">ZENITH BANK</option>
                                                        <option value="wema">WEMA BANK</option>
                                                    </select>

                                                    <span class="block text-red-500 text-center">
                                                        @error('bank_name')
                                                            {{ $message }}
                                                        @enderror
                                                    </span>
                                                </div>




                                                <div class="my-2">
                                                    <button type="submit"
                                                        class="opacity-80   w-fit border-2 text-white bg-green-400 py-1 rounded-md px-5 ">
                                                        Add Bank Details
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
    </div>


    <script>
        function removeHiddenClass() {
            var element = document.getElementById("form_modal");

            if (element.classList.contains("hidden")) {
                element.classList.remove("hidden");
                element.classList.add('flex');
            }
        }

        var button = document.getElementById("model_show");
        button.addEventListener("click", removeHiddenClass);
    </script>
@endsection
