@extends('Layout.User.app')

@section('content')
    <style>
        * {
            user-select: none;
        }
    </style>
    <div class=" pt-[5rem] ">
        <div class=" h-screen" class="mb-4">
            <h1 class="text-center font-bold my-4 text-xl text-green-500">TRANSACTION RECORD</h1>

            <section class="mx-2 md:px-60 md:mt-10 mt-10">


                <h1 class="font-bold">Utilites Transaction History</h1>



                {{-- DATA, AIRTIME AND BILLS PAYMENT TRANSCATION HISTORY --}}
                @forelse ($utilities_transactions as $utilities_transaction)
                    <div
                        class="flex justify-between md:space-x-10 text-sm my-2 md:text-md  shadow-md rounded-md py-4 px-4 overflow-y-auto bg-white">
                        <div>
                            <p class="font-semibold">₦{{ $utilities_transaction->amount }} </p>
                            <p>{{ $utilities_transaction->plan }} </p>
                            <div class="mt-2 md:hidden">
                                <p>{{ $utilities_transaction->transaction_type }} </p>
                                <p><span class="font-semibold">Date:</span>
                                    {{ $utilities_transaction->created_at->format('M, d, Y H:i:s') }}</p>
                                <p>Phone Number{{ $utilities_transaction->phone_number }} </p>

                            </div>
                        </div>
                        <div class="hidden md:block">
                            <p>{{ $utilities_transaction->transaction_type }} </p>
                            <p><span class="font-semibold">Date:</span>
                                {{ $utilities_transaction->created_at->format('M, d, Y H:i:s') }}</p>
                            <p><span class="font-semibold">Phone Number:</span> 0{{ $utilities_transaction->phone_number }}
                            </p>
                        </div>
                        <p
                            class="{{ $utilities_transaction->status == 'successful' ? 'text-green-400' : 'text-red-400' }} uppercase">
                            {{ $utilities_transaction->status }}</p>
                    </div>
                @empty
                    <p class="text-red-500 text-center mt-4">
                        NO TRANSACTION HAS BEEN MADE ON THIS ACCOUNT
                    </p>
                @endforelse

                <div class="pb-[100px] md:pb-20 ">
                    {{ $utilities_transactions->links() }}
                </div>

            </section>
        </div>





    </div>
@endsection
