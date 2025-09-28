<x-layout>
    <div class="grid grid-cols-1  lg:overflow-hidden md:overflow-hidden xl:overflow-hidden 2xl:overflow-hidden">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
         </div>
        
        <div class="max-w-screen-lg px-0 lg:px-0 mx-auto">
            <div class="content-center">
            <h2 class=" px-3 text-center text-lg  font-inter text-white bg-purple-500 sm:text-xl dark:text-white mb-3 rounded-lg"> Tabel Jadwal KRS</h2> </div>

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
                             
                                
                            
                              @foreach ($matkul_dibatalkan as $class)
                              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                  <td class="px-6 py-4">{{ $class->matakuliah }}</td>
                                  <td class="px-6 py-4">{{ $class->nomorkelas }}</td>
                                  <td class="px-6 py-4">{{ $class->hari}}</td>
                                  <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->jammulai)->translatedFormat('H:i') }}</td>
                                  <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->jamakhir)->translatedFormat('H:i') }}</td>
                                  <td class="px-6 py-4">{{ ($class->dosen) }}</td>
                                  <td class="px-6 py-4">
                                      <span class= " @if( $class->matkul_status == 'sesuai')
                                          bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300
                                          @elseif($class->matkul_status == 'dibatalkan')
                                          bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                           @elseif($class->matkul_status == 'dilaksanakan')
                                           bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                                           @endif">
                                          {{ $class->matkul_status }}
                                      </span>
                                  </td>
                                  <td class="px-6 py-4">
                                    @auth
                                    <a href="/negotiate/{{ $class->user_id }}" class=" font-mediuminline-flex items-center rounded bg-purple-900 px-2.5 py-0.5 text-xs font-medium text-gray-100 dark:bg-purple-900 hover:bg-purple-500 hover:text-white dark:text-white">Negotiate</a>
                                    @endauth
                                   
                                    <a href=" {{ route('detail.index', $class->id) }}" class=" font-mediuminline-flex items-center rounded bg-blue-900 px-2.5 py-0.5 text-xs font-medium text-gray-100 dark:bg-blue-900 hover:bg-purple-500 hover:text-white dark:text-white">Detail</a>

                                  </td>
                              </tr>
                          @endforeach
                            
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="flex justify-center mt-5 mb-5"> 
            @if ($matkul_dibatalkan->hasPages())
    <nav aria-label="pesan_selesai">
        <ul class="inline-flex -space-x-px text-base h-10">
            {{-- Previous Page Link --}}
            @if ($matkul_dibatalkan->onFirstPage())
                <li aria-disabled="true">
                    <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                </li>
            @else
                <li>
                    <a href="{{ $matkul_dibatalkan->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($matkul_dibatalkan->links()->elements as $element)  {{-- Perubahan di sini --}}
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li aria-disabled="true">
                        <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $matkul_dibatalkan->currentPage())
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
            @if ($matkul_dibatalkan->hasMorePages())
                <li>
                    <a href="{{ $matkul_dibatalkan->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
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

      </section>
   
      <div class="grid grid-cols-1  lg:overflow-hidden md:overflow-hidden xl:overflow-hidden 2xl:overflow-hidden">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
         </div>
        
        <div class="max-w-screen-lg px-0 lg:px-0 mx-auto">
            <div class="content-center">
            <h2 class=" px-3 text-center text-lg  font-inter text-white bg-purple-500  rounded-lg sm:text-xl dark:text-white"> Tabel Jadwal Matkul Ganti</h2> </div>

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
                             
                                  
                            
                              @foreach ($matkulganti_selesai as $class)
                              @if ($class->tanggalganti)
                                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                      <td class="px-6 py-4">{{ $class->matakuliah }}</td>
                                      <td class="px-6 py-4">{{ $class->nomorkelas }}</td>
                                      <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->tanggalganti)->translatedFormat('d F Y') }}</td>
                                      <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->matkulganti_jm)->translatedFormat('H:i') }}</td>
                                      <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->matkulganti_ja)->translatedFormat('H:i') }}</td>
                                      <td class="px-6 py-4">
                                          <span class="
                                           @if($class->matkulganti_status == 'dilaksanakan')
                                           bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                                           @elseif($class->matkulganti_status == 'dibooking' )
                                           bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300
                                            
                                           @elseif($class->matkulganti_status == 'selesai' )
                                           bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                            @endif">
                                              {{ $class->matkulganti_status }}
                                          </span>
                                      </td>
                                      <td class="px-6 py-4">
                                        @auth
                                        <a href="/negotiate/{{ $class->user_id }}" class=" font-mediuminline-flex items-center rounded bg-purple-900 px-2.5 py-0.5 text-xs font-medium text-gray-100 dark:bg-purple-900 hover:bg-purple-500 hover:text-white dark:text-white">Negotiate</a>
                                        @endauth
                                      
                                        <a href=" {{ route('detail.index', $class->kelas_id) }}" class=" font-mediuminline-flex items-center rounded bg-blue-900 px-2.5 py-0.5 text-xs font-medium text-gray-100 dark:bg-blue-900 hover:bg-purple-500 hover:text-white dark:text-white">Detail</a>

                                      </td>
                                  </tr>
                              @endif
                          @endforeach
                            
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        
        <div class="flex justify-center mt-5 mb-5"> 
          @if ($matkulganti_selesai->hasPages())
  <nav aria-label="pesan_selesai">
      <ul class="inline-flex -space-x-px text-base h-10">
          {{-- Previous Page Link --}}
          @if ($matkulganti_selesai->onFirstPage())
              <li aria-disabled="true">
                  <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
              </li>
          @else
              <li>
                  <a href="{{ $matkulganti_selesai->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
              </li>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($matkulganti_selesai->links()->elements as $element)  {{-- Perubahan di sini --}}
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                  <li aria-disabled="true">
                      <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                  </li>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                  @foreach ($element as $page => $url)
                      @if ($page == $matkulganti_selesai->currentPage())
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
          @if ($matkulganti_selesai->hasMorePages())
              <li>
                  <a href="{{ $matkulganti_selesai->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
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

      </section>
      <div class="grid grid-cols-1  lg:overflow-hidden md:overflow-hidden xl:overflow-hidden 2xl:overflow-hidden">
        <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
         </div>
        
        <div class="max-w-screen-lg px-0 lg:px-0 mx-auto">
            <div class="content-center">
            <h2 class=" px-3 text-center text-lg  font-inter text-white bg-purple-500  rounded-lg sm:text-xl dark:text-white"> Tabel Pesan</h2> </div>

              <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                  <div class="overflow-x-auto">
                    
                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                          <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                              <tr>
                                  <th scope="col" class="px-6 py-3">kelas</th>
                                  <th scope="col" class="px-6 py-3">tanggal pesan</th>
                                  <th scope="col" class="px-6 py-3">mulai</th>
                                  <th scope="col" class="px-6 py-3">akhir</th>
                                  <th scope="col" class="px-6 py-3">kegiatan</th>
                                  <th scope="col" class="px-6 py-3">status</th>
                                  <th scope="col" class="px-6 py-3">action</th>
                              </tr>
                          </thead>
                          <tbody>
                             
                                  
                            
                              @foreach ($pesan_selesai as $class)
                              @if ($class->tanggalpesan)
                                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                      <td class="px-6 py-4">{{ $class->nomorkelas }}</td>
                                      <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->tanggalpesan)->translatedFormat('d F Y') }}</td>
                                      <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->jammulai)->translatedFormat('H:i') }}</td>
                                      <td class="px-6 py-4">{{ \Carbon\Carbon::parse($class->jamakhir)->translatedFormat('H:i') }}</td>
                                      <td class="px-6 py-4">{{ $class->kegiatan }}</td>
                                      <td class="px-6 py-4">
                                          <span class="
                                           @if($class->status == 'dilaksanakan')
                                           bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                                           @elseif($class->status == 'dibooking')
                                           bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300
                                            
                                           @elseif($class->status == 'selesai')
                                           bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                            @endif">
                                              {{ $class->status }}
                                          </span>
                                      </td>
                                      <td class="px-6 py-4">
                                        @auth
                                        <a href="/negotiate/{{ $class->id }}" class=" font-mediuminline-flex items-center rounded bg-purple-900 px-2.5 py-0.5 text-xs font-medium text-gray-100 dark:bg-purple-900 hover:bg-purple-500 hover:text-white dark:text-white">Negotiate</a>
                                        @endauth
                                      
                                        <a href=" {{ route('detail.index', $class->kelas_id) }}" class=" font-mediuminline-flex items-center rounded bg-blue-900 px-2.5 py-0.5 text-xs font-medium text-gray-100 dark:bg-blue-900 hover:bg-purple-500 hover:text-white dark:text-white">Detail</a>

                                      </td>
                                  </tr>
                              @endif
                          @endforeach
                            
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        
        <div class="flex justify-center mt-5 mb-5"> 
          @if ($pesan_selesai->hasPages())
  <nav aria-label="pesan_selesai">
      <ul class="inline-flex -space-x-px text-base h-10">
          {{-- Previous Page Link --}}
          @if ($pesan_selesai->onFirstPage())
              <li aria-disabled="true">
                  <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
              </li>
          @else
              <li>
                  <a href="{{ $pesan_selesai->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
              </li>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($pesan_selesai->links()->elements as $element)  {{-- Perubahan di sini --}}
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                  <li aria-disabled="true">
                      <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                  </li>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                  @foreach ($element as $page => $url)
                      @if ($page == $pesan_selesai->currentPage())
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
          @if ($pesan_selesai->hasMorePages())
              <li>
                  <a href="{{ $pesan_selesai->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
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

      </section>
</x-layout>