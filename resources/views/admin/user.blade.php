<x-layout>
    <h2 class="mt-5 text-3xl font-semibold pt-8 lg:pt-0 text-gray-900 dark:text-white">Data Gedung</h2>

    @if (session('success'))
    <div id="successModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
        <div class="relative p-4 w-full max-w-md">
            <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeSuccessModal()">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                    <svg aria-hidden="true" class="w-8 h-8 text-green-500 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Success</span>
                </div>
                <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">{{ session('success') }}</p>
                <button type="button" onclick="closeSuccessModal()" class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-900">
                    Continue
                </button>
            </div>
        </div>
    </div>
@endif

<!-- Modal Konfirmasi -->
<div id="confirmationModal" style="display: none;" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-lg font-bold mb-4">Konfirmasi Penghapusan</h2>
        <p>Apakah Anda yakin ingin User ini?</p>
        <div class="mt-4 flex justify-end gap-2">
            <button class="bg-gray-300 px-4 py-2 rounded" onclick="closeModal()">Batal</button>
            <button id="confirmDeleteButton" class="bg-red-900 text-white px-4 py-2 rounded hover:bg-red-600">Hapus</button>
        </div>
    </div>
</div>

 <!-- Alert Banner Error -->
 @if($errors->any())
 @foreach ($errors->all() as $error)
     

 <div id="successModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
     <div class="relative p-4 w-full max-w-md">
         <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
             <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeSuccessModal()">
                 <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                 </svg>
                 <span class="sr-only">Close modal</span>
             </button>
             <div class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                 <svg width="800px" height="800px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M44 24V9H24H4V24V39H24" stroke="#FF0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M40 31L32 39" stroke="#FF0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M32 31L40 39" stroke="#FF0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M4 9L24 24L44 9" stroke="#FF0000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                 </svg>
                 
                 <span class="sr-only">GAGAL</span>
             </div>
             <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">     {{ $error }}</p>
             <button type="button" onclick="closeSuccessModal()" class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-900">
                 Continue
             </button>
         </div>
     </div>
 </div>
 @endforeach
 @endif
    <div class="max-w-screen-lg px-0 lg:px-0 mx-auto">
        
    <div class="container mt-10">
        <div class="flex mb-4">
            <button type="button" id="createGedungButton" data-modal-target="createGedung" data-modal-toggle="createGedung"
                class="rounded-lg border border-gray-200 bg-purple-600 px-3 py-2 text-sm font-medium text-white hover:bg-purple-500">
                Tambah User
            </button>
        </div>
        <!-- Modal Create Gedung -->
<div id="createGedung" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-20 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between  pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Tambah User Baru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createGedung">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="createGedungForm" method="POST" action="{{ route('admin.user.store') }}"enctype="multipart/form-data">
                @csrf
                <div class ="grid gap-4 mb-4   grid-cols-2">
                    <div>
                        <label for="Username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="Username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="Password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                        <input type="text" name="password" id="Password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="User_class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User_class</label>
                        <input type="text" name="user_class" id="User_class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="No_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor WA</label>
                        <input type="number" name="no_telp" id="No_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto User</label>
                        <input type="file" name="foto" id="foto" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                   
                </div>
                <!-- Submit Form -->
                <div class="flex justify-end items-center space-x-4">
                    <button type="submit" class="w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                        Tambah User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    <div class="overflow-hidden overflow-x-auto rounded-lg border border-gray-200 shadow-md m-5">
        <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
          <thead class="bg-gray-50 text-center">
            <tr>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Username</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">E-mail</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">User_class</th>
              <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nomor WA</th>
              <th scope="col" colspan="2" class="text-center px-6 py-4 font-medium text-gray-900">Aksi</th>
        
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 border-t border-gray-100">
            @foreach ($user as $g )
                
           
            <tr class="hover:bg-gray-50">
              <th class="flex gap-3 px-6 py-4 font-normal text-gray-900 text-center" >
                <div class="relative h-10 w-10">
                  <img
                    class="h-full w-full rounded-full object-cover object-center"
                    src="{{ asset('storage/profile/' . $g->foto)?? 'default_siluet.png' }}"
                    alt="foto"
                  />

                  <span class="absolute right-0 bottom-0 h-2 w-2 rounded-full bg-green-400 ring ring-white"></span>
                </div>
                <div class="text-sm">
                  <div class="font-medium text-gray-700">{{ $g->username }}</div>
                </div>
              </th>
              <td class="px-6 py-4 text-center">{{ $g->email }}</td>
              <td class="px-6 py-4 text-center">{{ $g->user_class }}</td>
              <td class="px-6 py-4 text-center">
                {{ $g->no_telp }}
              </td>
              <td class="px-6 py-4 text-center">
                <div class="flex justify-end gap-4">
                    <!-- Form untuk menghapus gedung -->
                    <form id="delete-form-{{ $g->id }}" action="{{ route('admin.user.destroy', $g->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Tombol hapus dengan konfirmasi -->
                        <button type="button" onclick="confirmDelete({{ $g->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="h-6 w-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </td>
           
            
            <td>
                 <!-- Button Edit Gedung -->
                 <button type="button" id="editGedungButton" data-modal-target="editGedung" data-modal-toggle="editGedung"
                 data-id="{{ $g->id }}"
                 data-username="{{ $g->username }}"
                 data-email="{{ $g->email }}"
                 data-no_telp="{{ $g->no_telp }}"
                 data-user_class="{{ $g->user_class }}"
                 class="w-full rounded-lg border border-gray-200 bg-purple-800 px-3 py-2 text-sm font-medium text-white hover:bg-purple-500 hover:text-white focus:z-10 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-blue-800 dark:bg-blue-800 dark:text-white dark:hover:bg-blue-900 dark:hover:text-white dark:focus:ring-white sm:w-auto mb-3">
             Edit User
         </button>
    
     
     <!-- Modal Edit Gedung -->
  <!-- Modal Edit Gedung -->
<div id="editGedung" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-20 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <!-- Modal header -->
            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Edit User
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editGedung">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="editGedungForm" method="POST" action="" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4   grid-cols-2">
                    <div>
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password</label>
                        <input type="text" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="user_class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User_class</label>
                        <input type="text" name="user_class" id="user_class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor WA</label>
                        <input type="number" name="no_telp" id="no_telp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div>
                        <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Foto Baru (Optional)</label>
                        <input type="file" name="foto" id="foto" accept="image/*" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                </div>

                <!-- Submit Form -->
                <div class="flex justify-end items-center space-x-4">
                    <button type="submit" class="w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                        Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

                </div>
              </td>
            </tr>
            @endforeach
            </table>
    </div>
</div>
<div class="flex justify-center mt-5 mb-5"> 
    @if ($user->hasPages())
<nav aria-label="Page navigation example">
<ul class="inline-flex -space-x-px text-base h-10">
    {{-- Previous Page Link --}}
    @if ($user->onFirstPage())
        <li aria-disabled="true">
            <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
        </li>
    @else
        <li>
            <a href="{{ $user->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($user->links()->elements as $element)  {{-- Perubahan di sini --}}
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li aria-disabled="true">
                <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
            </li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $user->currentPage())
                    <li aria-current="page">
                        <span class="flex items-center justify-center px-4 h-10 leading-tight text-white bg-purple-500 border border-e-0 border-gray-300 dark:border-gray-700 dark:bg-gray-700 dark:text-white">{{ $page }}</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $url }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($user->hasMorePages())
        <li>
            <a href="{{ $user->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
        </li>
    @else
        <li aria-disabled="true">
            <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Next</span>
        </li>
    @endif
</ul>
</nav>
@endif
</div>
</div>
<script>
   document.querySelectorAll('[data-modal-toggle="editGedung"]').forEach(button => {
    button.addEventListener('click', () => {
        // Get data from data-* attributes
        const id = button.getAttribute('data-id');
        const username = button.getAttribute('data-username');
        const email = button.getAttribute('data-email');
        const user_class = button.getAttribute('data-user_class');
        const no_telp = button.getAttribute('data-no_telp');

        // Set the form action for the edit form
        const editForm = document.getElementById('editGedungForm');
        editForm.action = `/admin/user/${id}`; // Adjust the route as necessary

        // Populate the input fields in the edit modal
        document.getElementById('username').value = username;
        document.getElementById('email').value = email;
        document.getElementById('user_class').value = user_class;
        document.getElementById('no_telp').value = no_telp;

        // Show the modal (optional if you're using a framework)
        document.getElementById('editGedung').classList.remove('hidden');
    });
});
 // Fungsi untuk menampilkan pop-up konfirmasi
 function confirmDelete(classId) {
    // Set the onclick function of the confirmation button
    document.getElementById('confirmDeleteButton').onclick = function() {
        document.getElementById('delete-form-' + classId).submit();
    };

    // Show the confirmation modal
    document.getElementById('confirmationModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('confirmationModal').style.display = 'none';
}


  
      function closeConfirmationModal() {
          document.getElementById('confirmationModal').style.display = 'none';
      }
  
      // Fungsi untuk menutup modal sukses
      function closeSuccessModal() {
          document.getElementById('successModal').style.display = 'none';
      }
      function confirmCancelClass(classId) {
    document.getElementById('confirmCancelClassButton').setAttribute('onclick', `cancelClass(${classId})`);
    document.getElementById('cancelClassConfirmationModal').classList.remove('hidden');
  }

  function closeCancelClassModal() {
    document.getElementById('cancelClassConfirmationModal').classList.add('hidden');
  }

  function cancelClass(classId) {
    document.getElementById(`cancel-class-form-${classId}`).submit();
  }
</script>
</x-layout>