@include('Layout.User.base')

<div class="eth-card white-glassmorpism w-full h-screen pb-40">
    @include('Layout.User.nav')
    <div class="w-full h-full md:flex justify-center items-center text-center md:pt-10">



        <div class="bg-white md:w-4/5  mt-10">
            <div class=" md:grid grid-cols-2 ">
                <div id="illustratiion" class="col-span-1 bg-gray-100 pt-28 pb-10 hidden md:block">
                    <div>
                        <div class="flex justify-center">
                            <img src="{{ asset('logo.png') }}" alt="" class="h-[50%] w-[50%]">
                        </div>
                        <h1 class="md:text-2xl text-xl mt-10">
                            <span class="text-green-400 ">SharpReload</span> your Data & other

                            <span class="block md:none">very Fast</span>
                        </h1>
                    </div>

                </div>


                <div class="col-span-1 md:w-4/5  flex justify-center">
                    <div class="form pt-10 pb-20">
                        <h1 class="text-center text-green-500 font-bold text-xl mb-4">SIGN UP</h1>

                        <form action={{ route('user.store') }} method="post">
                            @csrf
                            @method('post')
                            <div class="my-2">
                                <input type="text" name="username"
                                    class="border-2 px-2 md:h-12 rounded-lg md:w-[300px] w-full h-12 input_focus"
                                    value="{{ old('username') }}" placeholder="username">
                                <span class="text-center text-red-400 block">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="my-2">
                                <input type="text" name="full_name"
                                    class="border-2 px-2 md:h-12 rounded-lg md:w-[300px] w-full h-12 input_focus"
                                    value="{{ old('full_name') }}" placeholder="Full Name e.g Jon Doe">
                                <span class="text-center text-red-400 block">
                                    @error('full_name')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="my-2">
                                <input type="email" name="email"
                                    class="border-2 px-2 md:h-12 rounded-lg md:w-[300px] w-full h-12 input_focus"
                                    value="{{ old('email') }}" placeholder="Email e.g example@mail.com">
                                <span class="text-center text-red-400 block">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="my-2">
                                <input type="number" name="phone_number"
                                    class="border-2 px-2 md:h-12 rounded-lg md:w-[300px] w-full h-12 input_focus"
                                    value="{{ old('phone_number') }}" placeholder="phone Number e.g 07011223344">
                                <span class="text-center text-red-400 block">
                                    @error('phone_number')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="my-2">
                                <input type="password" name="password"
                                    class="border-2 px-2 md:h-12 rounded-lg md:w-[300px] input_focus w-full h-12"
                                    placeholder="password">
                                <span class="text-center text-red-400 block">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>



                            <div class="my-2">
                                <button type="submit"
                                    class="opacity-80 md:w-full w-[300px] border-2 text-white bg-green-400 h-12 rounded-md px-10 py-1">
                                    Create Account
                                </button>
                            </div>
                        </form>

                        <p>Already have an account? <a href={{ route('user.login') }} class="text-green-400">Login</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
