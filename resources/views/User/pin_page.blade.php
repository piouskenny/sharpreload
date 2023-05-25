@extends('Layout.User.app')

@section('content')
    @if (session()->has('success'))
        <!--modal content-->
        <div
            class="fixed flex justify-center text-center content-center items-center h-screen  w-screen bg-gray-300 bg-opacity-50">
            <div class="mt-[10%] fixed top-20 z-60 mx-auto p-5 border w-[90%] md:w-[30%] shadow-lg rounded-md  bg-white">
                <div class="mt-3 text-center">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Successful!</h3>
                    <div class="mt-2 px-7 py-3">
                        <p class="text-sm text-gray-500">
                            Pin Has Been Successfully Created
                        </p>
                    </div>
                    <div class="items-center px-4 py-3">
                        <a href="{{ route('user.dashboard') }}">
                            <button id="ok-btn"
                                class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                OK
                            </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    @endif


    <div id="app" class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow">
            <h1 class="text-red-700 bg-red-200 text-center px-2  py-8 text-center mx-10">
                You don't have a transaction pin Yet,
                <span class="block">
                    so you can perform any transaction
                </span>
            </h1>

            <div class="flex justify-center">
                <div>
                    <h2 class="text-xl font-semibold mb-4 mt-4">Create Transaction 4 Digit Pin</h2>
                    <form id="pin-form" action="{{ route('user.create_user_pin') }}" method="POST">
                        @csrf
                        @method('Post')
                        <div class="mb-4">
                            <label for="pin" class="block mb-2">Create Pin</label>
                            <input type="number" minlength="4" maxlength="4" id="pin" name="pin"
                                class="border border-gray-300  w-full px-3 py-2 rounded" required>
                            <span id="error_pin" class="block text-red-500">
                                @error('pin')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-4">
                            <label for="confirm-pin" class="block mb-2">Confirm Pin</label>
                            <input type="number" minlength="4" maxlength="4" id="confirm-pin" name="confirm_pin"
                                class="border border-gray-300  w-full px-3 py-2 rounded" required>
                            <span id="error_pin" class="block text-red-500">
                                @error('confirm_pin')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <button type="submit" class="bg-green-500 text-white w-full px-4 py-2 rounded">Submit</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
