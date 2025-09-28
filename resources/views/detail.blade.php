<x-layout>
    <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
          <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
              <img class="w-full dark:hidden" src="{{ asset('storage/' . $kelas->foto) }}" alt="" />
              <img class="w-full hidden dark:block" src="{{ asset('storage/' . $kelas->foto) }}" alt="" />
            </div>
    
            <div class="mt-6 sm:mt-8 lg:mt-0">
              <h1
                class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
              >
              Ruang Kelas {{ $kelas->nomorkelas }}
              </h1>
              <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                <div class="mt-6 sm:mt-8">
                    <div class="relative  border-b border-gray-200 dark:border-gray-800">
                      <table class="w-full text-left font-medium text-gray-900 dark:text-white md:table-fixed">
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-800">
                            
                          <tr>
                            <td class="whitespace-nowrap py-4 md:w-[384px]">

                              <div class="flex items-center gap-4">
                                
                              
                                <span class=" font-inter font-bold">Fasilitas</span>
                              </div>
                            </td>
            
                            <td class="p-4 text-base font-bold text-gray-900 dark:text-white">Jumlah</td>
            
                          </tr>
            
                          <tr>
                            <td class="whitespace-nowrap py-4 md:w-[384px]">
                              <div class="flex items-center gap-4">
                                <a href="#" class="flex items-center aspect-square w-10 h-10 shrink-0">
                                    <svg fill="#000000" width="800px" height="800px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21,2.5H3a1,1,0,0,0-1,1v8a1,1,0,0,0,1,1H21a1,1,0,0,0,1-1v-8A1,1,0,0,0,21,2.5Zm-3,8H6a1,1,0,0,1,0-2H18a1,1,0,0,1,0,2Zm0-4H17a1,1,0,0,1,0-2h1a1,1,0,0,1,0,2Z"/><path d="M12.793,14.793l-2,2a1,1,0,0,0,0,1.414l.293.293L9.793,19.793a1,1,0,1,0,1.414,1.414l2-2a1,1,0,0,0,0-1.414l-.293-.293,1.293-1.293a1,1,0,0,0-1.414-1.414Z"/><path d="M18.293,14.793l-2,2a1,1,0,0,0,0,1.414l.293.293-1.293,1.293a1,1,0,1,0,1.414,1.414l2-2a1,1,0,0,0,0-1.414l-.293-.293,1.293-1.293a1,1,0,0,0-1.414-1.414Z"/><path d="M7.293,14.793l-2,2a1,1,0,0,0,0,1.414l.293.293L4.293,19.793a1,1,0,1,0,1.414,1.414l2-2a1,1,0,0,0,0-1.414L7.414,17.5l1.293-1.293a1,1,0,0,0-1.414-1.414Z"/></svg>
                                </a>
                                <span class="hover:underline">AC</span>
                              </div>
                            </td>
            
                            <td class="p-4 text-base font-inter font-semibold text-gray-900 dark:text-white">{{$kelas->ac}} Buah</td>
            
                          </tr>
            
                          <tr>
                            <td class="whitespace-nowrap py-4 md:w-[384px]">
                              <div class="flex items-center gap-4">
                                <span class="flex items-center aspect-square w-10 h-10 shrink-0">
                                    <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                                    width="800px" height="800px" viewBox="0 0 529.987 529.988"
                                    xml:space="preserve">
                               <g>
                                   <path d="M417.369,15.13c-20.157-9.62-132.564,153.382-132.564,153.382s-0.622,26.67,7.152,47.946
                                       c7.048,0.297,13.875,1.922,20.312,5.001c9.294,4.437,16.639,11.303,21.735,19.45c23.361-5.853,47.449-26.259,47.449-26.259
                                       S437.537,24.759,417.369,15.13z"/>
                                   <path d="M337.207,290.731c-0.086,0.182-0.144,0.373-0.229,0.563c-6.234,13.054-17.643,22.702-31.04,27.12
                                       c-6.799,21.4-5.345,47.448-5.345,47.448S418.307,525.079,438.14,514.79c19.832-10.279-42.468-198.23-42.468-198.23
                                       S363.16,290.807,337.207,290.731z"/>
                                   <path d="M0.004,260.867c-1.081,22.309,192.713,62.94,192.713,62.94s34.272-13.454,49.218-33.736
                                       c-5.422-12.163-6.226-26.287-1.349-39.474c-14.392-19.364-42.696-33.765-42.696-33.765S1.085,238.558,0.004,260.867z"/>
                                   <path d="M251.068,250.281c-2.008,4.208-3.107,8.654-3.672,13.148c-0.603,4.752-0.392,9.543,0.641,14.287
                                       c0.383,1.769,0.698,3.557,1.31,5.298c3.806,10.776,11.6,19.431,21.917,24.365c5.824,2.782,12.021,4.188,18.418,4.188
                                       c7.851,0,15.386-2.237,21.927-6.139c5.183-3.089,9.696-7.248,13.196-12.259c1.319-1.894,2.534-3.863,3.548-5.977
                                       c7.229-15.138,4.6-32.369-5.098-44.772c-3.939-5.049-8.931-9.371-15.099-12.316c-3.662-1.75-7.507-2.754-11.418-3.404
                                       c-2.313-0.382-4.628-0.784-7-0.784C273.32,225.906,258.135,235.479,251.068,250.281z"/>
                                   <path d="M117.155,370.329l-8.243,4.849c21.209,36.099,52.479,64.757,90.413,82.868c11.877,5.671,24.26,10.146,36.873,13.493
                                       l-22.252,31.967l97.997-30.953l-91.638-46.531l17.117,35.955c-11.619-3.156-23.017-7.335-33.976-12.565
                                       C167.233,432.122,137.398,404.783,117.155,370.329z"/>
                                   <path d="M452.961,144.673l7.344,102.51l21.832-32.943c13.301,46.885,9.371,96.514-11.753,140.75
                                       c-3.175,6.646-6.751,13.196-10.643,19.469l8.138,5.03c4.063-6.569,7.812-13.426,11.14-20.388
                                       c22.357-46.827,26.354-99.43,11.877-149.012l39.092,2.61L452.961,144.673z"/>
                                   <path d="M145.278,116.75l-15.855-36.099l-24.709,99.756l87.497-53.914l-38.996-4.093c29.434-27.396,67.024-45.737,106.995-51.724
                                       l-1.415-9.457C216.28,67.59,176.318,87.298,145.278,116.75z"/>
                               </g>
                               </svg>
                            </span>
                                <span class="font-inter">KIPAS</span>
                              </div>
                            </td>
            
                            <td class="p-4 text-base font-inter font-semibold text-gray-900 dark:text-white">{{ $kelas->kipas }} Buah</td>
            
                          </tr>
            
                          <tr>
                            <td class="whitespace-nowrap py-0 md:w-[384px]">
                                <div class="flex items-center gap-4">
                                    <span class="flex items-center aspect-square w-10 h-10 shrink-0">
                                        <svg fill="#000000"  viewBox="-13.79 0 122.88 122.88" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  style="enable-background:new 0 0 95.3 122.88" xml:space="preserve">
                                            <g>
                                                <path class="st0" d="M0.91,73.04h93.37c1.47-1.96,1.25-3.97,0-6L59.64,22.9H37.03L0.91,67.03C-0.1,69.08-0.5,71.1,0.91,73.04 L0.91,73.04z M45.38,97.3c0-1.25,1.02-2.27,2.27-2.27c1.25,0,2.27,1.02,2.27,2.27v23.32c0,1.25-1.02,2.27-2.27,2.27 c-1.25,0-2.27-1.02-2.27-2.27V97.3L45.38,97.3z M65.66,93.83c-0.91-0.85-0.97-2.27-0.12-3.19c0.85-0.91,2.27-0.97,3.19-0.12 l17.98,16.63c0.91,0.85,0.97,2.27,0.12,3.19c-0.85,0.91-2.28,0.97-3.19,0.12L65.66,93.83L65.66,93.83z M27.15,90.47 c0.94-0.82,2.37-0.73,3.19,0.21c0.82,0.94,0.73,2.37-0.21,3.19L12.15,109.6c-0.94,0.82-2.37,0.73-3.19-0.21 c-0.82-0.94-0.73-2.37,0.21-3.19L27.15,90.47L27.15,90.47z M45.09,0h5.13v8.9c4.88,1.17,8.53,5.58,8.53,10.8v0.72h-22.2v-0.72 c0-5.22,3.66-9.63,8.54-10.8V0L45.09,0z M47.82,88.58L47.82,88.58c5.99,0,10.9-4.9,10.9-10.9v-0.7H36.92v0.7 C36.92,83.68,41.82,88.58,47.82,88.58L47.82,88.58z"/>
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="font font-inter">LAMPU</span>
                                </div>
                            </td>
                            <td class="p-4 text-base font-inter font-semibold text-gray-900 dark:text-white ">{{ $kelas->lampu }} Buah</td>
                        </tr>
                          <tr>
                            <td class="whitespace-nowrap py-0 md:w-[384px]">
                                <div class="flex items-center gap-4">
                                    <span class="flex items-center aspect-square w-10 h-10 shrink-0">
                                        <svg width="800px" height="800px" viewBox="0 -8 72 72" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#010002;}</style></defs><title>users</title><path class="cls-1" d="M18.87,28.44c.2.21.41.4.63.6a10.59,10.59,0,0,0,14.15,0c.22-.2.43-.39.62-.6s.4-.43.58-.65a10.64,10.64,0,1,0-16.55,0C18.48,28,18.68,28.23,18.87,28.44Z"/><path class="cls-1" d="M41.63,25.76c.17.18.35.35.53.52a9,9,0,0,0,12.05,0c.19-.17.36-.34.53-.52a6.41,6.41,0,0,0,.49-.55,9,9,0,0,0-7-14.73,9,9,0,0,0-7,14.73C41.3,25.4,41.46,25.59,41.63,25.76Z"/><path class="cls-1" d="M9.49,45.52H43.66A1.57,1.57,0,0,0,44.83,45a1.24,1.24,0,0,0,.31-1,18.77,18.77,0,0,0-9.9-14.22,12.25,12.25,0,0,1-17.33,0A18.77,18.77,0,0,0,8,44a1.25,1.25,0,0,0,.31,1A1.57,1.57,0,0,0,9.49,45.52Z"/><path class="cls-1" d="M9.49,45.52H43.66A1.57,1.57,0,0,0,44.83,45a1.24,1.24,0,0,0,.31-1,18.77,18.77,0,0,0-9.9-14.22,12.25,12.25,0,0,1-17.33,0A18.77,18.77,0,0,0,8,44a1.25,1.25,0,0,0,.31,1A1.57,1.57,0,0,0,9.49,45.52Z"/><path class="cls-1" d="M64,39a16,16,0,0,0-8.42-12.11,10.41,10.41,0,0,1-14.76,0,16.59,16.59,0,0,0-3.13,2.16,18.81,18.81,0,0,1,8.26,11.24H62.73a1.33,1.33,0,0,0,1-.44A1.06,1.06,0,0,0,64,39Z"/></svg>
                                    </span>
                                    <span class="font font-inter">kapasitas</span>
                                </div>
                            </td>
                            <td class="p-4 text-base font-inter font-semibold text-gray-900 dark:text-white ">{{ $kelas->kapasitas }} orang</td>
                        </tr>
                        </tbody>
                      </table>                        
                    </div>
                </div>
            
              </div>
    
    
             
    
              <p class="mb-6 mt-5 text-gray-500 dark:text-gray-400">
               {{$kelas->keterangan }}
              </p>
            </div>
          
            
            

          </div> 
         
          <div class="grid grid-cols-1  lg:overflow-hidden md:overflow-hidden xl:overflow-hidden 2xl:overflow-hidden">
            <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
                <div class="max-w-screen-lg px-0 lg:px-5 mx-auto">
                   <h1
          class=" text-center text-lg font-semibold font-inter text-white bg-purple-500 my-3 rounded-xl sm:text-xl dark:text-white shadow-2xl" 
        > 
        Detail Pemesan Ruang {{ $kelas->nomorkelas }}
        </h1> 
                    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                          
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nama</th>
                                        <th scope="col" class="px-6 py-3">kelas Pemesan</th>
                                        <th scope="col" class="px-6 py-3">Tanggal</th>
                                        <th scope="col" class="px-6 py-3">Booking Dari</th>
                                        <th scope="col" class="px-6 py-3">Sampai</th>
                                        <th scope="col" class="px-6 py-3">Status</th>
                                        @auth
                                        <th scope="col" class="px-6 py-3">Aksi</th>
                                        @endauth
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesan_Data as $pesanData )
                                        
                                  
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">{{ $pesanData->username }}</td>
                                        <td class="px-6 py-4">{{ $pesanData->user_class }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pesanData->tanggalpesan)->translatedFormat('d F Y') }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pesanData->jammulai)->translatedFormat('H:i') }}</td>
                                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($pesanData->jamakhir)->translatedFormat('H:i') }}</td>
                                        <td class="px-6 py-4">
                                            <span class=" @if( $pesanData->status == 'selesai')
                                     bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                     @elseif($pesanData->status == 'dibooking')
                                     bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300
                                      @elseif($pesanData->status == 'dilaksanakan')
                                      bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                                      @endif">{{ $pesanData->status }}</span>
                                        </td>
                                        @auth
                                        <td class="px-6 py-4">
                                          <a href="/negotiate/{{ $pesanData->id }}" class=" font-mediuminline-flex items-center rounded bg-purple-900 px-2.5 py-0.5 text-xs font-medium text-gray-100 dark:bg-purple-900 hover:bg-purple-500 hover:text-white dark:text-white">Negotiate</a>
                                         
                                      </td>
                                        @endauth
                                      
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center mt-5 mb-5"> 
                  @if ($pesan_Data->hasPages())
          <nav aria-label="Page navigation example">
              <ul class="inline-flex -space-x-px text-base h-10">
                  {{-- Previous Page Link --}}
                  @if ($pesan_Data->onFirstPage())
                      <li aria-disabled="true">
                          <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                      </li>
                  @else
                      <li>
                          <a href="{{ $pesan_Data->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                      </li>
                  @endif
        
                  {{-- Pagination Elements --}}
                  @foreach ($pesan_Data->links()->elements as $element)  {{-- Perubahan di sini --}}
                      {{-- "Three Dots" Separator --}}
                      @if (is_string($element))
                          <li aria-disabled="true">
                              <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                          </li>
                      @endif
        
                      {{-- Array Of Links --}}
                      @if (is_array($element))
                          @foreach ($element as $page => $url)
                              @if ($page == $pesan_Data->currentPage())
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
                  @if ($pesan_Data->hasMorePages())
                      <li>
                          <a href="{{ $pesan_Data->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
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
        </div>
        <div class="grid grid-cols-1  lg:overflow-hidden md:overflow-hidden xl:overflow-hidden 2xl:overflow-hidden">
          <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
              <div class="max-w-screen-lg px-0 lg:px-5 mx-auto">
                <h1
                class=" text-center text-lg font-semibold font-inter text-white bg-purple-500 my-3 rounded-xl sm:text-xl dark:text-white shadow-2xl" 
              > 
              Detail KRS Tetap Ruangan {{ $kelas->nomorkelas }}
              </h1> 
                  <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                      <div class="overflow-x-auto">
                        
                          <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                              <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                  <tr>
                                      <th scope="col" class="px-6 py-3">matkul</th>
                                      <th scope="col" class="px-6 py-3">Hari</th>
                                      <th scope="col" class="px-6 py-3">Booking Dari</th>
                                      <th scope="col" class="px-6 py-3">Sampai</th>
                                      <th scope="col" class="px-6 py-3">Status</th>
                                      @auth
                                      <th scope="col" class="px-6 py-3">Aksi</th>

                                      @endauth
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($matkul_Data as $matkul )
                                      
                                
                                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                      <td class="px-6 py-4">{{ $matkul->matakuliah }}</td>
                                      <td class="px-6 py-4">{{ $matkul->hari}}</td>
                                      <td class="px-6 py-4">{{ \Carbon\Carbon::parse($matkul->jammulai)->translatedFormat('H:i') }}</td>
                                       <td class="px-6 py-4">{{ \Carbon\Carbon::parse($matkul->jamakhir)->translatedFormat('H:i') }}</td>
                                      <td class="px-6 py-4">
                                          <span class=" @if( $matkul->matkul_status == 'dibatalkan')
                                     bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                     @elseif($matkul->matkul_status == 'sesuai')
                                     bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300
                                      @elseif($matkul->matkul_status == 'dilaksanakan')
                                      bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                                      @endif">{{ $matkul->matkul_status }}</span>
                                      </td>
                                      @auth
                                      <td class="px-6 py-4">
                                        <a href="/negotiate/{{ $matkul->user_id }}" class=" font-mediuminline-flex items-center rounded bg-purple-900 px-2.5 py-0.5 text-xs font-medium text-gray-100 dark:bg-purple-900 hover:bg-purple-500 hover:text-white dark:text-white">Negotiate</a>
                                         
                                      </td>
                                      @endauth
                                     
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <div class="flex justify-center mt-5 mb-5"> 
                @if ($matkul_Data->hasPages())
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-base h-10">
                {{-- Previous Page Link --}}
                @if ($matkul_Data->onFirstPage())
                    <li aria-disabled="true">
                        <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $matkul_Data->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                @endif
      
                {{-- Pagination Elements --}}
                @foreach ($matkul_Data->links()->elements as $element)  {{-- Perubahan di sini --}}
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li aria-disabled="true">
                            <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                        </li>
                    @endif
      
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $matkul_Data->currentPage())
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
                @if ($matkul_Data->hasMorePages())
                    <li>
                        <a href="{{ $matkul_Data->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
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
      </div>
        
         <div class="grid grid-cols-1  lg:overflow-hidden md:overflow-hidden xl:overflow-hidden 2xl:overflow-hidden">
           <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
               <div class="max-w-screen-lg px-0 lg:px-5 mx-auto">
                <h1
                class=" text-center text-lg font-semibold font-inter text-white bg-purple-500 my-3 rounded-xl sm:text-xl dark:text-white shadow-2xl" 
              > 
              Detail Matkul Ganti {{ $kelas->nomorkelas }}
              </h1>
                   <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                       <div class="overflow-x-auto">
                         
                           <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                               <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                   <tr>
                                       <th scope="col" class="px-6 py-3">matkul</th>
                                       <th scope="col" class="px-6 py-3">Tanggal</th>
                                       <th scope="col" class="px-6 py-3">Booking Dari</th>
                                       <th scope="col" class="px-6 py-3">Sampai</th>
                                       <th scope="col" class="px-6 py-3">Status</th>
                                       @auth
                                       <th scope="col" class="px-6 py-3">Aksi</th>

                                       @endauth
                                   </tr>
                               </thead>
                               <tbody>
                                   @foreach ($matkulganti_Data as $mg )
                                       
                                 
                                   <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                       <td class="px-6 py-4">{{ $mg->matakuliah }}</td>
                                       <td class="px-6 py-4">{{ \Carbon\Carbon::parse($mg->tanggalganti)->translatedFormat('d F Y') }}</td>
                                       <td class="px-6 py-4">{{ \Carbon\Carbon::parse($mg->matkulganti_jm)->translatedFormat('H:i') }}</td>
                                       <td class="px-6 py-4">{{ \Carbon\Carbon::parse($mg->matkulganti_ja)->translatedFormat('H:i') }}</td>
                                       <td class="px-6 py-4">
                                           <span class=" @if( $mg->matkulganti_status == 'selesai')
                                     bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                     @elseif($mg->matkulganti_status == 'dibooking')
                                     bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300
                                      @elseif($mg->matkulganti_status == 'dilaksanakan' )
                                      bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                                      @endif">{{ $mg->matkulganti_status }}</span>
                                       </td>
                                       @auth
                                       <td class="px-6 py-4">
                                        <a href="/negotiate/{{ $mg->user_id }}" class=" font-mediuminline-flex items-center rounded bg-purple-900 px-2.5 py-0.5 text-xs font-medium text-gray-100 dark:bg-purple-900 hover:bg-purple-500 hover:text-white dark:text-white">Negotiate</a>
                                          
                                       </td>
                                       @endauth
                                      
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                   </div>
               </div>
           </section>
       </div>
          <br> 
        <div class="grid grid-cols-3 md:grid-cols-8 lg:grid-cols-3 ">
            <a href="{{ url()->previous() }}" class=" rounded-full flex items-center font-semibold text-purple-600  mr-2 px-2.5 py-0.5  p-2">
                <svg class="w-6 h-6 text-gray-800 dark:text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 16-4-4 4-4m-6 8-4-4 4-4"/>
                </svg>
                Kembali
            </a>
        </div>
        </div>
        <div class="flex justify-center mt-5 mb-5"> 
          @if ($matkulganti_Data->hasPages())
  <nav aria-label="Page navigation example">
      <ul class="inline-flex -space-x-px text-base h-10">
          {{-- Previous Page Link --}}
          @if ($matkulganti_Data->onFirstPage())
              <li aria-disabled="true">
                  <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
              </li>
          @else
              <li>
                  <a href="{{ $matkulganti_Data->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
              </li>
          @endif

          {{-- Pagination Elements --}}
          @foreach ($matkulganti_Data->links()->elements as $element)  {{-- Perubahan di sini --}}
              {{-- "Three Dots" Separator --}}
              @if (is_string($element))
                  <li aria-disabled="true">
                      <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                  </li>
              @endif

              {{-- Array Of Links --}}
              @if (is_array($element))
                  @foreach ($element as $page => $url)
                      @if ($page == $matkulganti_Data->currentPage())
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
          @if ($matkulganti_Data->hasMorePages())
              <li>
                  <a href="{{ $matkulganti_Data->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
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


