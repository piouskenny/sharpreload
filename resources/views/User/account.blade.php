@include('Layout.User.base')

<div class="eth-card white-glassmorpism w-full h-screen pb-40">
    @include('Layout.User.nav')
    <div class="w-full h-full md:flex justify-center items-center text-center md:pt-10">


        <div class="bg-white md:w-4/5 md:h-4/5 ">
            <div class="md:grid grid-cols-2">
                <div id="illustratiion" class="col-span-1 bg-gray-100 pt-40 pb-10">

                    <h1 class="md:text-2xl text-xl">
                        <span class="text-green-400 ">SharpReload</span> your Data & other

                        <span class="block md:none">very Fast</span>
                    </h1>
                </div>

                <div id="acctioon_buttons"
                    class="col-span-1  flex justify-center my-auto content-center items-center text-center pt-40 pb-10">
                    <div class="text-base">
                        <a href={{ route('user.login') }}>
                            <button
                                class="bg-green-400 hover:bg-green-600 opacity-80 md:w-full w-[300px] border-2 text-white rounded-md px-10 py-1  ">
                                Login
                            </button>
                        </a>

                        <a href={{ route('user.account') }}>
                            <button
                                class="border-gray-200 text-gray-800 md:w-full w-[300px] block border-2 my-2 rounded-md px-10 py-1  ">
                                Continue with Google
                            </button>
                        </a>

                        <a href={{ route('user.create') }}>
                            <button
                                class=" text-pink-800 md:w-full w-[300px] block text-center my-2 rounded-md px-10 py-1  ">
                                Sign Up
                            </button>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
