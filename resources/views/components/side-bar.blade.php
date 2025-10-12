<!-- Sidebar -->

<aside
class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white border-r border-gray-200 md:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
aria-label="Sidenav"
id="drawer-navigation"
>
<div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">
  <form action= "{{ route('dashboard') }}" method="GET" class="md:hidden mb-2">
    <label for="sidebar-search" class="sr-only">Search</label>
    <div class="relative">
      <div
        class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none"
      >
        <svg
          class="w-5 h-5 text-gray-500 dark:text-gray-400"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            clip-rule="evenodd"
            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
          ></path>
        </svg>
      </div>
      <input
        type="text"
        name="search"
        id="sidebar-search"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-500 dark:focus:border-purple-500"
        placeholder="Search"
      />
    </div>
  </form>
  @auth
  @if (Auth::user()->role == 1)
  <ul class="space-y-2 list-none">
    <li class="list-none">
      <button
        type="button"
        class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
        aria-controls="dropdown-admin"
        data-collapse-toggle="dropdown-admin"
      >
      <svg class="  group-hover:text-white dark:group-hover:text-white w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
      </svg>
      
        <span class="flex-1 ml-3 text-left whitespace-nowrap"
          >Admin Dashboard</span
        >
        <svg
          aria-hidden="true"
          class="w-6 h-6"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <ul id="dropdown-admin" class="hidden py-2 space-y-2">
        <li class="list-none">
          <a
            href="{{ route('admin.gedung.index') }}"
            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
            >Gedung</a
          >
        </li>
        <li class="list-none">
          <a
            href="{{ route('admin.kelas.index') }}"
            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
            >Kelas</a
          >
        </li>
        <li class="list-none">
          <a
            href="{{ route('admin.matkul.index') }}"
            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
            >Matkul</a
          >
        </li>
        <li class="list-none">
          <a
            href="{{ route('admin.matkulganti.index') }}"
            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
            >Matkul Ganti</a
          >
        </li>
        <li class="list-none">
          <a
            href="{{ route('admin.pesan.index') }}"
            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
            >Pesan</a
          >
        </li>
        <li class="list-none">
          <a
            href="{{ route('admin.user.index') }}"
            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
            >Users</a
          >
        </li>
      </ul>
    </li>
   @endif
   @endauth
    <li class="list-none mb-2">
      <a
        href="/dashboard"
        class="flex items-center p-2 text-base font-medium  text-gray-900 rounded-lg dark:text-white hover:bg-purple-500 dark:hover:bg-gray-700 group hover:text-white"
      >
        <svg
          aria-hidden="true"
          class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"></path>
         
        </svg>
        <span class="ml-3">All class</span>
      </a>
    </li>
    <li class="list-none mb-2">
        <a
          href="/myclass"
          class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-purple-500 dark:hover:bg-gray-700 dark:text-white group hover:text-white"
        >
          <svg
            aria-hidden="true"
            class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
            fill="currentColor"
            viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
            <path
              fill-rule="evenodd"
              d="M13.09 3.294c1.924.95 3.422 1.69 5.472.692a1 1 0 0 1 1.438.9v9.54a1 1 0 0 1-.562.9c-2.981 1.45-5.382.24-7.25-.701a38.739 38.739 0 0 0-.622-.31c-1.033-.497-1.887-.812-2.756-.77-.76.036-1.672.357-2.81 1.396V21a1 1 0 1 1-2 0V4.971a1 1 0 0 1 .297-.71c1.522-1.506 2.967-2.185 4.417-2.255 1.407-.068 2.653.453 3.72.967.225.108.443.216.655.32Z"
              clip-rule="evenodd"
            ></path>
          </svg>
          <span class="ml-3">Myclass</span>
        </a>
      </li>
    <li class="list-none mb-2">
      <button
        type="button"
        class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 dark:text-white dark:hover:bg-gray-700 hover:text-white  "
        aria-controls="dropdown-pages"
        data-collapse-toggle="dropdown-pages"
      >
        <svg
          aria-hidden="true"
          class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white"
          fill="currentColor "
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z"
            clip-rule="evenodd"
          ></path>
        </svg>
        <span class="flex-1 ml-3 text-left whitespace-nowrap"
          >Gedung</span
        >
        <svg
          aria-hidden="true"
          class="w-6 h-6"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <ul id="dropdown-pages" class="hidden py-2 space-y-2">
        @php
          $gedung = DB::table('gedung')->select('id','nomorgedung','lokasi')->get();
        @endphp
        @foreach ($gedung as $gedung )
          
        
        <li class="list-none">
          <a
          href="{{ route('datagedung.index', ['id' => $gedung->nomorgedung]) }}"

            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 dark:text-white dark:hover:bg-gray-700 hover:text-white"
            >{{ $gedung->nomorgedung }}</a
          >
        </li>
        @endforeach
      </ul>
    </li>
    <li class="list-none mb-2">
      <button
        type="button"
        class="flex items-center p-2 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
        aria-controls="dropdown-sales"
        data-collapse-toggle="dropdown-sales"
      >
        <svg
          aria-hidden="true"
          class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-white dark:text-gray-400 dark:group-hover:text-white"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M8 3a3 3 0 0 0-1 5.83v6.34a3.001 3.001 0 1 0 2 0V15a2 2 0 0 1 2-2h1a5.002 5.002 0 0 0 4.927-4.146A3.001 3.001 0 0 0 16 3a3 3 0 0 0-1.105 5.79A3.001 3.001 0 0 1 12 11h-1c-.729 0-1.412.195-2 .535V8.83A3.001 3.001 0 0 0 8 3Z"
            clip-rule="evenodd"
          ></path>
        </svg>
        <span class="flex-1 ml-3 text-left whitespace-nowrap"
          >Ketersediaan</span
        >
        <svg
          aria-hidden="true"
          class="w-6 h-6"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </button>
      <ul id="dropdown-sales" class="hidden py-2 space-y-2">
        <li>
          <a
            href="{{ route('tersedia.tersediaFilter') }}"
            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
            >Tersedia</a
          >
        </li>
        <li>
          <a
            href="/dipakai"
            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
            >Dipakai</a
          >
        </li>
        <li>
          <a
            href="/dipesan"
            class="flex items-center p-2 pl-11 w-full text-base font-medium text-gray-900 rounded-lg transition duration-75 group hover:bg-purple-500 hover:text-white dark:text-white dark:hover:bg-gray-700"
            >Dipesan</a
          >
        </li>
      </ul>
    </li>
   
    
  </ul>
  <ul
    class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700"
  >
    <li class="list-none mb-2">
    <a href="{{ route('panduan.api') }}" class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg dark:text-white hover:bg-purple-500 dark:hover:bg-gray-700 group hover:text-white">
        {{-- Ikon untuk API --}}
        <svg class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 1h3a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-3m-6 0H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h3m1 14-4-14m5 14 4-14"/>
        </svg>
        <span class="ml-3">Panduan API</span>
    </a>
    </li>
    <li>
      <a
        href="{{ route('about') }}"
        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-purple-500 hover:text-white dark:hover:bg-gray-700 dark:text-white group"
      >
        <svg
          aria-hidden="true"
          class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M11 4.717c-2.286-.58-4.16-.756-7.045-.71A1.99 1.99 0 0 0 2 6v11c0 1.133.934 2.022 2.044 2.007 2.759-.038 4.5.16 6.956.791V4.717Zm2 15.081c2.456-.631 4.198-.829 6.956-.791A2.013 2.013 0 0 0 22 16.999V6a1.99 1.99 0 0 0-1.955-1.993c-2.885-.046-4.76.13-7.045.71v15.081Z"
          ></path>
        </svg>
        <span class="ml-3">About Us</span>
      </a>
    </li>
    
    <li>
      <a
        href="/team"
        class="flex items-center p-2 text-base font-medium text-gray-900 rounded-lg transition duration-75 hover:bg-purple-500 hover:text-white dark:hover:bg-gray-700 dark:text-white group"
      >
        <svg
          aria-hidden="true"
          class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
          fill="currentColor"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z"
            clip-rule="evenodd"
          ></path>
        </svg>
        <span class="ml-3">Team</span>
      </a>
    </li>
  </ul>
</div>

</aside>