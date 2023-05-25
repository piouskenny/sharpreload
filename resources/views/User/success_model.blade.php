      <!--modal content-->

      @if (session()->has('success'))
          <div
              class="fixed flex justify-center text-center content-center items-center h-screen  w-screen 
              {{-- bg-gray-300 --}}
               bg-opacity-50 z-50">
              <div
                  class="mt-[10%] fixed top-20 z-60 mx-auto p-5 border w-[90%] md:w-[30%]  shadow-lg rounded-md  bg-white">
                  <div class="mt-3 text-center">
                      <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                          <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                              xmlns="http://www.w3.org/2000/svg">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7">
                              </path>
                          </svg>
                      </div>
                      <h3 class="text-lg leading-6 font-medium text-gray-900">Successful!</h3>
                      <div class="mt-2 px-7 py-3">
                          <p class="text-sm text-gray-500">
                              {{ session('success') }}
                          </p>
                      </div>
                      <div class="items-center px-4 py-3 z-50">
                          <a href="{{ route('user.login') }}">
                              <button id="ok-btn"
                                  class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                  OK
                              </button>
                          </a>

                      </div>
                  </div>
              </div>
          </div>
      @elseif(session()->has('failed'))
          <div
              class="fixed flex justify-center text-center content-center items-center h-screen  w-screen z-50 bg-opacity-50">
              <div
                  class="mt-[10%] fixed top-20 z-60 mx-auto p-5 border w-[90%] md:w-[30%]  shadow-lg rounded-md  bg-white">
                  <div class="mt-3 text-center">

                      <h3 class="text-lg leading-6 font-medium text-red-900">Failed!</h3>
                      <div class="mt-2 px-7 py-3">
                          <p class="text-sm text-gray-500">
                              {{ session('failed') }}
                          </p>
                      </div>
                      <div class="items-center px-4 py-3">
                          <a href="{{ route('user.login') }}">
                              <button id="ok-btn"
                                  class="px-4 py-2 bg-red-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                  OK
                              </button>
                          </a>

                      </div>
                  </div>
              </div>
          </div>
      @endif
