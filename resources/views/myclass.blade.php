<x-layout>
    @auth
        
   
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
      <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
          <h2 class="mb-4 text-3xl font-semibold pt-8 lg:pt-0 text-gray-900 dark:text-white">My Class</h2>
  
          <!-- Alert Banner Success -->
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

  
          @if($noClass)
                <div class="text-center">
                    <p class="bg-yellow-100 text-yellow-800 font-medium px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300 text-xl">
                        Komting belum memesan kelas apapun.
                    </p>
                </div>
            @else
                <!-- Cards Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    @foreach ($userClasses as $class)
                        <div class="w-full px-4">
                            <div class="mb-10 overflow-hidden duration-300 bg-white rounded-lg dark:bg-dark-2 shadow-1 hover:shadow-3 dark:shadow-card dark:hover:shadow-3">
                                <img src="{{ asset('storage/' . $class->foto) }}" alt="image" width="100%" height="50%"/> 
                                <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
                                    <h2 class="text-dark dark:text-white hover:text-primary mb-4 block text-xl font-semibold">{{ $class->nomorkelas }}</h2>
                                    <h3>
                                        <a href="#" class="text-dark dark:text-white hover:text-primary mb-4 block text-xl font-semibold">
                                            <span class="font font-semibold">Book By:</span> {{ Auth::user()->username }} <br>
                                            {{ \Carbon\Carbon::parse($class->tanggalpesan)->translatedFormat('d F') }}, 
                                            {{ \Carbon\Carbon::parse($class->jammulai)->translatedFormat('H:i') }} - 
                                            {{ \Carbon\Carbon::parse($class->jamakhir)->translatedFormat('H:i') }}
                                        </a>
                                    </h3>
                                    <div class="flex items-center justify-between mt-2 grid grid-cols-1">
                                    <a href="/detail/{{ $class->id }}" class="inline-block py-1 text-base font-medium transition border rounded-full text-body-color hover:border-primary hover:bg-primary border-gray-3 px-7 bg-purple-500 text-white hover:bg-purple-400">
                                        View Details
                                    </a>
                                    <form id="delete-form-{{ $class->id }}" action="{{ route('myclass.destroy', $class->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $class->id }})" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-1.5 text-center">Tinggalkan kelas</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    
    
  
  
  
    <!-- Pop-up konfirmasi -->
    <div id="confirmationModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 bottom-0 z-50 hidden flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
      <div class="relative p-4 w-full max-w-md">
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
          <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeConfirmationModal()">
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <div class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 p-2 flex items-center justify-center mx-auto mb-3.5">
            <svg class="w-6 h-6 text-red-600 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
              </svg>
              
            <span class="sr-only">Warning</span>
          </div>
          <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Kamu yakin ingin meninggalkan kelas ini?</p>
          <button type="button" id="confirmDeleteButton" class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-900">Ya, tinggalkan</button>
          <button type="button" class="py-2 px-3 text-sm font-medium text-center text-gray-500 rounded-lg bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600" onclick="closeConfirmationModal()">Tidak</button>
        </div>
      </div>
    </div>
  {{-- mulai section --}}

  <div class="grid grid-cols-1  lg:overflow-hidden md:overflow-hidden xl:overflow-hidden 2xl:overflow-hidden">
    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
     </div>
    
    <div class="max-w-screen-lg px-0 lg:px-0 mx-auto">
        <div class="content-center">
            <h2 class=" px-3 text-center text-lg  font-inter text-white bg-purple-500  rounded-md sm:text-xl dark:text-white my-3"> tabel jadwal matkul </h2>
            <div class="flex items-center justify-end gap-2 sm:justify-start">
            <!-- Modal ganti  -->
           
         
            <button type="submit" id="updateProductButton" data-modal-target="ganti-" data-modal-toggle="ganti-" class="w-full rounded-lg border border-gray-200 bg-blue-800 px-3 py-2 text-sm font-medium text-white hover:bg-blue-500 hover:text-white focus:z-10 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-blue-800 dark:bg-blue-800 dark:text-white dark:hover:bg-blue-900 dark:hover:text-white dark:focus:ring-white sm:w-auto mb-3">Isi jadwal matkul</button> <img src="{{ asset('img/info.png') }}" alt="jadwal" width="30" height="30"> <h5 class="font-sm font-semibold text-slate-400">KRS DIISI OLEH SETIAP KOMTING KELAS SESUAI DENGAN JADWAL KRS YANG TELAH DI BERIKAN [jika terdapat kesalahan dalam pengisian KRS cukup klik tombol <span class="font-medium inline-flex items-center rounded bg-red-600 px-2.5 py-0.5 text-xs text-gray-100 dark:bg-red-800  dark:text-white">Batalkan</span> dan isi Keterangan dengan Kata "salah" dengan huruf kecil , tanpa spasi dan tanpa tanda kutip Maka Admin Akan menghapusnya secepatnya]</h5>
            <div id="ganti-" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-20 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
              <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                  <!-- Modal content -->
                  <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                      <!-- Modal header -->
                      <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                              Isi Jadwal KRS
                          </h3>
                          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="ganti-">
                              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                              <span class="sr-only">Close modal</span>
                          </button>
                      </div>
                      <!-- Modal body -->
                      <form method="POST" action="{{ route('tambah.tambahmatkul') }}">
                        @csrf
      
                  <!-- Inputhari -->
<div class="grid gap-4 mb-4 sm:grid-cols-2">
    <div class="relative max-w-sm">
        <label for="hari" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Hari</label>
        <div class="absolute start-0 flex items-center ps-3 py-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
            </svg>
        </div>
        <select id="hari" name="hari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            <option value="" disabled selected>Pilih Hari</option>
            <option value="senin">Senin</option>
            <option value="selasa">Selasa</option>
            <option value="rabu">Rabu</option>
            <option value="kamis">Kamis</option>
            <option value="jumat">Jumat</option>
        </select>
    </div>
    

    <!-- Input Matakuliah -->
    <div>
        <label for="matkul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matakuliah</label>
        <input type="text" name="matkul" id="matkul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required placeholder="Masukkan nama matakuliah" />
    </div>
     <!-- Input kelas -->
     <div>
        <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
        <select name="kelas_id" id="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
            @foreach($kelas as $id => $kelas)
                <option value="{{ $kelas->nomorkelas }}">{{ $kelas->nomorkelas }}</option>
            @endforeach
        </select>
    </div>
    <!-- Input Jam Awal -->
    <div>
        <label for="start-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Mulai:</label>
        <div class="relative">
            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                </svg>
            </div>
            <input type="time" name="jammulai" id="start-time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="18:00" value="00:00" required />
        </div>
    </div>

    <!-- Input Jam Akhir -->
    <div>
        <label for="end-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Selesai:</label>
        <div class="relative">
            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                </svg>
            </div>
            <input type="time" name="jamakhir" id="end-time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="07:00" max="20:00" value="00:00" autocomplete="off" />
        </div>
    </div>

    <!-- Input Dosen -->
    <div>
        <label for="dosen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dosen</label>
        <input type="text" name="dosen" id="dosen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
    </div>

    <!-- Input Hidden user_id dan kelas_id -->
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
    <input type="hidden" name="user_class" value="{{ Auth::user()->user_class }}">
    <input type="hidden" name="status" value="sesuai">
</div>

<!-- Submit Form -->
<div class="flex justify-end items-center space-x-4">
    <button type="submit" class="w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
        Tambah Matkul
    </button>
</div>

    
      
                      </form>
                  </div>
              </div>
            </div>
               
               <!-- Modal ganti end -->                    </div>
          </div>

         
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
              
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">matkul</th>
                            <th scope="col" class="px-6 py-3">kelas</th>
                            <th scope="col" class="px-6 py-3">hari</th>
                            <th scope="col" class="px-6 py-3">mulai</th>
                            <th scope="col" class="px-6 py-3">akhir</th>
                            <th scope="col" class="px-6 py-3">dosen</th>
                            <th scope="col" class="px-6 py-3">status</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            
                      
                        @foreach ($matkulData as $class)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $class->matakuliah }}</td>
                            <td class="px-6 py-4">{{ $class->nomorkelas }}</td>
                            <td class="px-6 py-4">{{ $class->hari}}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->jammulai)->translatedFormat('H:i') }}</td>
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->jamakhir)->translatedFormat('H:i') }}</td>
                            <td class="px-6 py-4">{{ ($class->dosen) }}</td>
                            <td class="px-6 py-4">
                                <a href="#alihkan"> 
                                    <span class="@if($class->matkul_status == 'sesuai')
                                                    bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300
                                                @elseif($class->matkul_status == 'dibatalkan')
                                                    bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                                                @elseif($class->matkul_status == 'dilaksanakan')
                                                    bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                                @endif">
                                        {{ $class->matkul_status }}
                                    </span>
                                    @if($class->matkul_status == 'dibatalkan' && !empty($class->keterangan))
                                    <button type="button" onclick="openInfoModal('{{ $class->keterangan }}')" class="text-center ml-2 text-gray-600 hover:text-gray-900 focus:outline-none">
                                        <img src="{{ asset('img/info.png') }}" alt="info" width="20" height="20">
                                    </button>
                                    @endif
                                </a> 
                            </td>
                            <!-- Modal for Information -->
                            <div id="infoModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 bottom-0 z-50 hidden flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
                                <div class="border border-separate border-yellow-300 relative p-4 w-full max-w-md">
                                    <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                       
                                        <p id="infoContent" class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Keterangan tidak tersedia</p>
                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" onclick="closeInfoModal()">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>


                            
                            <td class="py-4">
                                <div style="display: flex; gap: 1px;">
                                    <form id="cancel-class-form-{{ $class->id }}" action="{{ route('myclass.cancelMatkul', $class->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="font-medium inline-flex items-center rounded bg-red-800 px-2.5 py-0.5 text-xs text-gray-100 dark:bg-red-800 hover:bg-red-900 hover:text-white dark:text-white" onclick="openCancelClassModal({{ $class->id }})">Batalkan</button> 
                                    </form>
                                    <form action="{{ route('myclass.setMatkulSesuai', $class->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="font-medium inline-flex items-center rounded bg-green-800 px-2.5 py-0.5 text-xs text-gray-100 dark:bg-green-800 hover:bg-green-900 hover:text-white dark:text-white">
                                            Sesuai
                                        </button>
                                    </form>
                                    
                                </div>
                            </td>
                            
                        </tr>
                    @endforeach
                      
                   


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="container">
<section id="alihkan" class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 ">
    </div>
    <div class="max-w-screen-lg px-0 lg:px-0 mx-auto">
        <h2 class=" px-3 text-center text-lg  font-inter text-white bg-purple-500 my-3 rounded-md sm:text-xl dark:text-white"> tabel jadwal matkul ganti</h2>
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="overflow-x-auto">
              
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">matkul</th>
                            <th scope="col" class="px-6 py-3">kelas</th>
                            <th scope="col" class="px-6 py-3">tanggal</th>
                            <th scope="col" class="px-6 py-3">mulai</th>
                            <th scope="col" class="px-6 py-3">akhir</th>
                            <th scope="col" class="px-6 py-3">status</th>
                            <th scope="col" class="px-6 py-3">action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            
                      
                        @foreach ($matkulgantiData as $class)
                        @if ($class->tanggalganti)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">{{ $class->matakuliah }}</td>
                                <td class="px-6 py-4">{{ $class->nomorkelas }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->tanggalganti)->translatedFormat('d F Y') }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->matkulganti_jm)->translatedFormat('H:i') }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->matkulganti_ja)->translatedFormat('H:i') }}</td>
                                <td class="px-6 py-4">
                                    <span class="
                                     @if($class->matkulganti_status == 'dilaksanakan' || $class->matkulganti_status == 'sesuai')
                                     bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                     @elseif($class->matkulganti_status == 'dibooking' || $class->matkulganti_status == 'selesai')
                                     bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300
                                      @endif">
                                        {{ $class->matkulganti_status }}
                                    </span>
                                </td>
                              <td class="px-6 py-4">
                <!-- Form untuk menghapus -->
                <form id="delete-form-{{ $class->id }}" action="{{ route('matkulganti.destroymg', $class->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="confirmDelete({{ $class->id }})" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Selesai</button>
                </form>
            </td>
                            </tr>
                        @endif
                    @endforeach
                      
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</div>
  {{-- end section --}}

</div>
<div id="cancelClassConfirmationModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 bottom-0 z-50 hidden flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
    <div class="relative p-4 w-full max-w-md">
        <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" onclick="closeCancelClassModal()">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>

            <div class="w-12 h-12 rounded-full bg-red-100 dark:bg-red-900 p-2 flex items-center justify-center mx-auto mb-3.5">
                <svg class="w-6 h-6 text-red-600 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                </svg>
                <span class="sr-only">Warning</span>
            </div>

            <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Apakah kamu yakin ingin membatalkan kelas ini?</p>

            <!-- Input keterangan pembatalan -->
            <textarea id="cancelReason" class="w-full px-3 py-2 text-gray-900 bg-gray-50 rounded-md dark:bg-gray-700 dark:text-gray-300" rows="3" placeholder="Masukkan keterangan..."></textarea>

            <button type="button" id="confirmCancelClassButton" class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-red-900 hover:bg-red-500 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-900" onclick="submitCancelClassForm()">Ya, batalkan</button>
            <button type="button" class="py-2 px-3 text-sm font-medium text-center text-gray-500 rounded-lg bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-600" onclick="closeCancelClassModal()">Tidak</button>
        </div>
    </div>
</div>

 <script>
    function openInfoModal(keterangan) {
    document.getElementById('infoContent').textContent = keterangan || "Tidak ada keterangan.";
    document.getElementById('infoModal').classList.remove('hidden');
}

function closeInfoModal() {
    document.getElementById('infoModal').classList.add('hidden');
}



let selectedClassId = null; // Pastikan ini dideklarasikan di luar fungsi

function openCancelClassModal(classId) {
    selectedClassId = classId; // Simpan ID kelas yang dipilih
    document.getElementById('cancelClassConfirmationModal').classList.remove('hidden'); // Tampilkan modal
}

function closeCancelClassModal() {
    selectedClassId = null; // Reset ID saat modal ditutup
    document.getElementById('cancelClassConfirmationModal').classList.add('hidden'); // Sembunyikan modal
}

function submitCancelClassForm() {
    const cancelReason = document.getElementById('cancelReason').value.trim(); // Ambil nilai keterangan dan hilangkan spasi

    if (selectedClassId && cancelReason) { // Pastikan ID dan keterangan ada
        const form = document.getElementById('cancel-class-form-' + selectedClassId); // Ambil form yang sesuai
        const input = document.createElement('input'); // Buat elemen input baru
        input.type = 'hidden'; // Set tipe input
        input.name = 'keterangan'; // Set nama input
        input.value = cancelReason; // Set nilai input
        form.appendChild(input); // Tambahkan input ke form

        form.submit(); // Kirim form
    } else {
        alert('Mohon masukkan keterangan pembatalan.'); // Peringatan jika keterangan tidak ada
    }
}
      // Fungsi untuk menampilkan pop-up konfirmasi
      function confirmDelete(classId) {
          document.getElementById('confirmDeleteButton').onclick = function() {
              document.getElementById('delete-form-' + classId).submit();
          };
          document.getElementById('confirmationModal').style.display = 'flex';
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
 @endauth


@guest

<section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mb-4 flex items-center justify-between gap-4 md:mb-8">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Pilih Kelas Anda</h2>
  
      
      </div>
  
      <div class="grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
        @foreach ($pilihkelas as $kelas )
            
        
        <a href="guest/kelas/{{ $kelas->user_class }}" class=" flex items-center rounded-lg border border-gray-200 bg-white px-4 py-2 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <svg class="w-6 h-6 mr-5 text-gray-800 dark:text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5"/>
              </svg>
              
          <span class="text-sm text-center font-medium text-gray-900 dark:text-white">{{ $kelas->user_class }}</span>
        </a>
        @endforeach
      </div>
    </div></section>
    @endguest
  </x-layout>
  