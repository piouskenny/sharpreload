<section class="mx-2 md:px-60 md:mt-10 mt-8">
    <div class="flex justify-between">
        <h1 class="text-green-500 text-xl  mt-1 mb-2">Quick Actions</h1>
        {{-- <h1 class="font-bold text-red-400">More >></h1> --}}
    </div>

    <div class="flex justify-between pt-6 items-center content-center ">

        <a href="{{ route('user.deposit') }}">
            <div class="text-center items-center place-items-center bg-white shadow p-3 rounded-md">
                <div class="rounded-[100%] flex justify-center  ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="green" class="w-10 h-10 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>


                <div class="text-center text-semibold text-gray-700">
                    Deposit
                </div>
            </div>
        </a>

        <a href="{{ route('user.buy_data') }}">
            <div class="text-center bg-white shadow p-3 rounded-md">
                <div class="rounded-[100%] flex justify-center  ">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        class="w-10 h-10 text-white" stroke="green">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                    </svg>
                </div>
                <div class="text-center text-semibold text-gray-700">
                    Buy Data
                </div>
            </div>
        </a>


        <div class="text-center bg-white shadow py-3 px-4 rounded-md">
            <div class="rounded-[100%] flex justify-center  ">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    class="w-10 h-10 text-white" stroke="green">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                </svg>
            </div>

            <div class="text-center text-semibold text-gray-700">

                Airtime

            </div>
        </div>

        <div class="text-center bg-white shadow p-1 rounded-md">
            <div class="rounded-[100%] flex justify-center   ">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="green" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                </svg>

            </div>

            <div class="text-center text-semibold text-gray-700">
                Customer <span class="block">Support</span>
            </div>
        </div>

    </div>
</section>
