@include('Layout.User.base')

<div class="eth-card white-glassmorpism w-full h-screen pb-40">
    @include('Layout.User.nav')
    <div class="w-full  md:flex justify-center items-center text-center md:pt-10">



        <div class="bg-white md:w-4/5  mt-10 h-fit md:h-full">
            <div class=" md:grid grid-cols-2 ">
                <div id="illustratiion" class="col-span-1 bg-gray-100 pt-40 pb-10 hidden md:block">
                    <div>
                        <h1 class="md:text-2xl text-xl">
                            <span class="text-green-400 ">SharpReload</span> your Data & other

                            <span class="block md:none">very Fast</span>
                        </h1>
                    </div>

                </div>


                <div class="col-span-1 md:w-4/5  flex justify-center">


                    <div class="form py-20">
                        {{-- modal Form --}}

                        <div class="flex justify-center">
                            @include('User.success_model')

                        </div>

                        <h1 class="text-center text-green-500 font-bold text-xl mb-4">LOGIN</h1>

                        <form action={{ route('user.check') }} method="post">
                            @csrf
                            @method('post')

                            <div class="my-2">
                                <input type="email" name="email"
                                    class="border-2 px-2 md:h-12 rounded-lg md:w-[300px] w-full h-12 
                                     input_focus "
                                    placeholder="Email e.g example@mail.com">
                                <span class="text-center text-red-400 block">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="my-4">
                                <input type="password" name="password"
                                    class="border-2 px-2 md:h-12 rounded-lg md:w-[300px] w-full h-12 
                                     input_focus"
                                    placeholder="password">
                                <span class="text-center text-red-400 block">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="my-4">
                                <button type="submit"
                                    class="opacity-80 md:w-full w-[300px] border-2 text-white bg-green-400 h-12 rounded-md px-10 py-1">
                                    Login
                                </button>
                            </div>
                        </form>

                        <p>Don't have an account? <a href={{ route('user.create') }} class="text-green-400">signup
                                here</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>




    </div>
</div>
