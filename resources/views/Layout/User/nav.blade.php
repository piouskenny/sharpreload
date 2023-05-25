<nav class="flex justify-between px-4 md:justify-around md:pt-4 pt-2 items-center content-center text-center">

    <div id="links" class="text-start hidden md:flex">
        <ul class="flex justify-between space-x-4 text-gray-200">
            <li>
                <a href={{ route('home') }}>
                    Home
                </a>
            </li>
            <li>
                <a>
                    About
                </a>
            </li>
            <li>
                Testimonies
            </li>
            {{-- <li>
                Contact/support
            </li> --}}
        </ul>
    </div>

    <div id="brandname">
        <a href="" class="text-white md:font-semibold md:text-lg text-md">SharpReload</a>
    </div>

    <span class="text-white md:hidden">
        MENU
    </span>

    <div id="button" class="hidden md:flex space-x-10 text-end">
        <a href={{ route('user.account') }}>
            <button class="border-white border-2 text-white rounded-md px-10 py-1  ">
                Account
            </button>
        </a>

    </div>
</nav>
