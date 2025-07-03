<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl mx-auto p-4">
        <a href="{{ route('departments.index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">PGN</span>
        </a>

        <!-- Search bar -->
        <form action="{{ route('spendings.index') }}" method="GET" class="hidden md:block md:w-1/3">
            <div class="relative">
                <input type="text" name="search" placeholder="Cari karyawan atau departemen"
                    value="{{ request('search') }}"
                    class="w-full pl-3 pr-10 py-2 text-sm border rounded-lg focus:outline-none focus:ring focus:border-blue-300" />
                <button type="submit" class="absolute right-2 top-2 text-gray-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z" />
                    </svg>
                </button>
            </div>
        </form>


        <div class="flex items-center md:order-2 space-x-2">
          <div class="relative" x-data="{ open: false }">
              @auth
                  <button @click="open = !open"
                          class="flex items-center space-x-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                      <img src="https://media.istockphoto.com/id/1142191318/id/foto/foto-profil-orang.jpg?s=612x612&w=0&k=20&c=wI7StiXgXpc8gyToW3vnWx7RQvtlOUp36-JB2vlFYzU="
                          alt="Profile"
                          class="w-8 h-8 rounded-full object-cover border-2 border-white shadow">
                      <span class="text-white text-sm">{{ auth()->user()->name }}</span>
                  </button>

                  <div x-show="open" @click.outside="open = false"
                      class="absolute right-0 mt-2 w-36 bg-white rounded shadow-lg z-50 py-1">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit"
                                  class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                              Logout
                          </button>
                      </form>
                  </div>
              @else
                  <a href="{{ route('login') }}"
                    class="text-white hover:text-blue-200 focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-4 py-2">
                      Login
                  </a>
                  {{-- <a href="#"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                      Sign up
                  </a> --}}
              @endauth
          </div>
        </div>


        <div id="mega-menu-icons" class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1">
            <ul class="flex flex-col mt-4 font-medium md:flex-row md:mt-0 md:space-x-8 rtl:space-x-reverse">
                <li>
                    <a href="{{ route('departments.index') }}" class="block py-2 px-3 text-white hover:text-blue-500">Departments</a>
                </li>
                <li>
                    <a href="{{ route('employees.index') }}" class="block py-2 px-3 text-white hover:text-blue-500">Employees</a>
                </li>
                <li>
                    <a href="{{ route('spendings.index') }}" class="block py-2 px-3 text-white hover:text-blue-500">Spendings</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
