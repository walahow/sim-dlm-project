<x-layout>
    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="mb-4 text-3xl font-semibold pt-8 lg:pt-0 text-gray-900 dark:text-white">My Class</h2>
            
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
                                <img src="{{ asset('storage/' . $class->foto) }}"  alt="image" class="w-full" /> 
                                <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
                                    <h2 class="font font-inter font-semibold">{{ $class->nomorkelas }}</h2>
                                    <h3>
                                        <a href="javascript:void(0)" class="text-dark dark:text-white hover:text-primary mb-4 block text-xl font-semibold">
                                            <span class="font font-semibold">Book By:</span> {{ $class->username }} <br>
                                            {{ \Carbon\Carbon::parse($class->tanggalpesan)->translatedFormat('d F') }}, 
                                            {{ \Carbon\Carbon::parse($class->jammulai)->translatedFormat('H:i') }} - 
                                            {{ \Carbon\Carbon::parse($class->jamakhir)->translatedFormat('H:i') }}
                                        </a>
                                    </h3>
                                    <a href="/detail/{{ $class->id }}" class="inline-block py-2 text-base font-medium transition border rounded-full text-body-color hover:border-primary hover:bg-primary border-gray-3 px-7 bg-purple-500 text-white hover:bg-purple-400">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
    
    
  
  
    <div class="grid grid-cols-1  lg:overflow-hidden md:overflow-hidden xl:overflow-hidden 2xl:overflow-hidden">
      <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
       </div>
      
      <div class="max-w-screen-lg px-0 lg:px-0 mx-auto">
          <div class="content-center">
              <h2 class=" px-3 text-center text-lg  font-inter text-white bg-purple-500  rounded-md sm:text-xl dark:text-white my-3"> tabel jadwal matkul </h2>
              {{-- <div class="flex items-center justify-end gap-2 sm:justify-start"> --}}
        
             
           
        
  
      
        
           
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
  
  
   <script>
      function openInfoModal(keterangan) {
      document.getElementById('infoContent').textContent = keterangan || "Tidak ada keterangan.";
      document.getElementById('infoModal').classList.remove('hidden');
  }
  
  function closeInfoModal() {
      document.getElementById('infoModal').classList.add('hidden');
  }
  
  
  
  
      </script>
      </section>
</x-layout>