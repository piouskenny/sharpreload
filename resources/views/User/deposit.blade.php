@extends('Layout.User.app')

@section('content')
    <style>
        * {
            user-select: none;
        }
    </style>
    <div class=" pt-[5rem] ">
        <div class=" h-screen" class="mb-4">
            <h1 class="text-center font-bold my-4 text-xl text-green-500">DEPOSIT</h1>

            <div class="text-center mt-2 ">
                <div class="grid grid-cols-3 justify-between px-10 pb-10 space-x-1 md:space-x-20">
                    <div class="col-span-1 shadow-lg rounded-md text-sm md:text-md bg-white p-2 flex-shrink-0">
                        <span class="block text-gray-600">
                            Balance
                        </span>
                        ₦{{ $userAccount->account_balance }}
                    </div>
                    <div class="col-span-1 shadow-lg rounded-md text-sm md:text-md bg-white p-2 flex-shrink-0">
                        <span class="block text-gray-600">
                            All Total
                        </span>
                        ₦{{ $all_transaction_total }}
                    </div>
                    <div class="col-span-1 shadow-lg rounded-md text-sm md:text-md bg-white p-2 flex-shrink-0">
                        <span class="block text-gray-600">
                            This Month
                        </span>
                        ₦{{ $all_transaction_this_month }}
                    </div>
                </div>


                <h1>Transfer to your virtual Accounts</h1>

                <div class=" overflow-x-auto flex flex-row  content-center px-10 space-x-4 mb-10">
                    <div
                        class=" p-3 flex-shrink-0 justify-end items-start  flex-col rounded-xl h-[13rem] md:h-48 sm:w-72  my-5 shadow bg-gradient-to-l from-green-300 to-blue-300">
                        <div class="justify-between content-center items-center mx-auto flex-col w-full h-full">
                            <div>
                                <p class="text-white font-light text-xl mt-3 md:text-xl">
                                    Account Name: <span class="font-bold block">{{ $user->full_name }}</span>
                                </p>
                                <p class="text-white font-light text-xl mt-3 md:text-xl">
                                    Account Number: <span class="font-bold">0068127228</span>
                                </p>
                                <p class="text-white font-light text-xl mt-3 md:text-xl">
                                    Bank Name: <span class="font-bold">MoniePoint</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class=" p-3 flex-shrink-0 justify-end items-start  flex-col rounded-xl h-[13rem] md:h-48 sm:w-72  my-5 shadow bg-gradient-to-l from-green-300 to-blue-300">
                        <div class="justify-between content-center items-center mx-auto flex-col w-full h-full">
                            <div>
                                <p class="text-white font-light text-xl mt-3 md:text-xl">
                                    Account Name: <span class="font-bold block">{{ $user->full_name }}</span>
                                </p>
                                <p class="text-white font-light text-xl mt-3 md:text-xl">
                                    Account Number: <span class="font-bold">0068127228</span>
                                </p>
                                <p class="text-white font-light text-xl mt-3 md:text-xl">
                                    Bank Name: <span class="font-bold">MoniePoint</span>
                                </p>
                            </div>
                        </div>
                    </div>





                </div>


                {{-- MODEL FOR ALERT MESSAGE --}}
                <div class="flex justify-center">
                    @if (session()->has('message'))
                        <!--modal content-->
                        <div
                            class="fixed flex justify-center text-center content-center items-center h-screen  w-screen bg-gray-300 bg-opacity-50">
                            <div
                                class="mt-[10%] fixed top-20 z-60 mx-auto p-5 border w-[90%] md:w-[30%] shadow-lg rounded-md  bg-white">
                                <div class="mt-3 text-center">
                                    <div
                                        class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
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
                                            {{ session('message') }}
                                        </p>
                                    </div>
                                    <div class="items-center px-4 py-3">
                                        <a href="{{ route('user.deposit') }}">
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


                <div class="flex justify-center">
                    @if (session()->has('failed'))
                        <!--modal content-->
                        <div
                            class="fixed flex justify-center text-center content-center items-center h-screen  w-screen bg-gray-300 bg-opacity-50">
                            <div
                                class="mt-[10%] fixed top-20 z-60 mx-auto p-5 border w-[90%] md:w-[30%] shadow-lg rounded-md  bg-white">
                                <div class="mt-3 text-center">

                                    <h3 class="text-lg leading-6 mt-5 font-medium text-red-900">Failed!</h3>
                                    <div class="mt-2 px-7 py-3">
                                        <p class="text-sm text-gray-500">
                                            {{ session('failed') }}
                                        </p>
                                    </div>
                                    <div class="items-center px-4 py-3">
                                        <a href="{{ route('user.deposit') }}">
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


                <p class="mt-4 font-semibold ">DEPOSIT WITH CARD</p>

                <form action="{{ route('user.deposit_request') }}" method="post">

                    @csrf
                    @method('post')
                    <input type="text" name="old_balance"
                        class="border-2 px-2 md:h-12 rounded-lg md:w-[300px] w-[80%] h-[7vh]" hidden
                        placeholder="old_balamce" value="{{ $userAccount->account_balance }}">
                    <div class="">
                        <input type="number" name="amount"
                            class="border-2 px-2 md:h-12 mt-2 rounded-lg md:w-[300px] w-[80%] h-[7vh] input_focus"
                            min="0" placeholder="Enter amount">

                        <span class="block text-red-500 text-center">
                            @error('amount')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="">
                        <input type="password" name="pin"
                            class="border-2 px-2 md:h-12 mt-2 rounded-lg md:w-[300px] w-[80%] h-[7vh] input_focus"
                            min="0" placeholder="Pin">

                        <span class="block text-red-500 text-center">
                            @error('pin')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>




                    <div class="my-2">
                        <button onclick="payWithMonnify()" type="submit"
                            class="opacity-80   w-fit border-2 text-white bg-green-400 py-1 rounded-md px-5 ">Pay Card
                        </button>
                    </div>
                </form>
            </div>
            <section class="mx-2 md:px-60 md:mt-10 mt-10">


                <h1 class="font-bold">Transaction History</h1>



                {{-- DATA, AIRTIME AND BILLS PAYMENT TRANSCATION HISTORY --}}
                @forelse ($TransactionHistories as $transactionHistory)
                    <div
                        class="flex justify-between md:space-x-10 text-sm my-2 md:text-md  shadow-md rounded-md py-4 px-4 overflow-y-auto bg-white">
                        <div>
                            <p class="font-semibold">₦{{ $transactionHistory->amount }} </p>
                            <p>{{ $transactionHistory->payment_method }} </p>
                            <div class="mt-2 md:hidden">
                                <p>{{ $transactionHistory->transaction_type }} </p>
                                <p><span class="font-semibold">Date:</span>
                                    {{ $transactionHistory->created_at->format('M, d, Y H:i:s') }}</p>
                            </div>
                        </div>
                        <div class="hidden md:block">
                            <p>{{ $transactionHistory->transaction_type }} </p>
                            <p><span class="font-semibold">Date:</span>
                                {{ $transactionHistory->created_at->format('M, d, Y H:i:s') }}</p>
                        </div>

                        <p
                            class="{{ $transactionHistory->status == 'success' ? 'text-green-400' : 'text-red-400' }} uppercase">
                            {{ $transactionHistory->status }}</p>


                    </div>
                @empty
                    <p class="text-red-500 text-center mt-4">
                        NO TRANSACTION HAS BEEN MADE ON THIS ACCOUNT
                    </p>
                @endforelse

                <div class="pb-[100px] md:pb-20 ">
                    {{ $TransactionHistories->links() }}

                </div>

            </section>
        </div>
    </div>





    </div>

    {{-- 
    <script type="text/javascript" src="https://sdk.monnify.com/plugin/monnify.js"></script>

    <script type="text/javascript">
        function payWithMonnify() {
            MonnifySDK.initialize({
                amount: 5000,
                currency: "NGN",
                reference: '' + Math.floor((Math.random() * 1000000000) + 1),
                customerName: "John Doe",
                customerEmail: "monnify@monnify.com",
                apiKey: "MK_TEST_SG9KVRJJAH",
                contractCode: "2687627063",
                paymentDescription: "Test Pay",
                isTestMode: true,
                metadata: {
                    "name": "Damilare",
                    "age": 45
                },
                paymentMethods: ["CARD", "ACCOUNT_TRANSFER"],
                incomeSplitConfig: [{
                        "subAccountCode": "MFY_SUB_342113621921",
                        "feePercentage": 50,
                        "splitAmount": 1900,
                        "feeBearer": true
                    },
                    {
                        "subAccountCode": "MFY_SUB_342113621922",
                        "feePercentage": 50,
                        "splitAmount": 2100,
                        "feeBearer": true
                    }
                ],
                onComplete: function(response) {
                    //Implement what happens when transaction is completed.
                    console.log(response);
                },
                onClose: function(data) {
                    //Implement what should happen when the modal is closed here
                    console.log(data);
                }
            });
        }
    </script> --}}
@endsection
