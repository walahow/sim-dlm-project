
    <x-layout>
      
      <section class="bg-white py-2 antialiased dark:bg-gray-900 px-3 rounded-xl">
        
        @php
        $nomorKelasUnik = array_unique($data->pluck('nomorkelas')->toArray());
      @endphp
    
      
            <div class="mt-2 flow-root sm:mt-8">
              <div class="divide-y divide-gray-400 dark:divide-gray-700">
                @if(session('success'))
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
            @php
            @endphp
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
     @if (session('noClass'))
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
                <p class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">     {{ session('noClass') }}</p>
                <button type="button" onclick="closeSuccessModal()" class="py-2 px-3 text-sm font-medium text-center text-white rounded-lg bg-purple-600 hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-purple-300 dark:focus:ring-purple-900">
                    Continue
                </button>
            </div>
        </div>
    </div>
@endif

  @foreach ($nomorKelasUnik as $index => $nomorkelas)
                  
            
                <div class="relative grid grid-cols-2 gap-4 py-6 sm:grid-cols-4 lg:grid-cols-4" id="resultContainer">
                  <div class="col-span-2 content-center sm:col-span-4 lg:col-span-1" id="nomorkelasContainer">
                    <a href="{{ route('detail.index', $data->where('nomorkelas', $nomorkelas)->first()->id) }}"  class="text-base font-bold text-gray-900 hover:underline dark:text-white" >
                    [ {{ $nomorkelas }}]
                    </a>
                  </div>
                 
                  
                    <div class="flex items-center gap-2 sm:grid-cols-2 lg:grid-cols-2">
                        <label for="dropdown-{{ $nomorkelas }}"><img src="{{ asset('img/sedia.png') }}" alt="jadwal" width="30" height="30"></label>
                      <button class="w-full rounded-2xl border border-gray-200 bg-purple-400 px-3 py-2 text-sm font-medium text-white hover:bg-purple-500 hover:text-white focus:z-10 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-purple-800 dark:bg-purple-800 dark:text-white dark:hover:bg-purple-900 dark:hover:text-white dark:focus:ring-white sm:w-auto" type="submit" id="dropdown-{{ $nomorkelas }}" data-dropdown-toggle="dropdown-menu-{{ $nomorkelas }}"> availibility</button>
                     
                            
           
          
                            
                        
            <!-- Dropdown menu availibility -->
            <div id="dropdown-menu-{{ $nomorkelas }}"  class=" z-50 hidden w-50 p-3 ">
              
              
                <table class=" border-hidden w-full text-sm text-center bg-gray-200 text-gray-900 dark:text-gray-400 rounded-xl">
                    <thead class="text-xs text-white uppercase bg-purple-400 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">kelas</th>
                            <th scope="col" class="px-4 py-3">Dari</th>
                            <th scope="col" class="px-4 py-3">sampai jam</th>
                            <th scope="col" class="px-4 py-3">status</th>
                           
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                      @if ($item->nomorkelas == $nomorkelas)
                        <tr class="border-b dark:border-gray-700">
                            <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $item->nomorkelas }}</th>
                            <td class="px-4 py-3 font-semibold">{{ \Carbon\Carbon::parse($item->tanggalpesan)->translatedFormat('d F') }}, {{ \Carbon\Carbon::parse($item->jammulai)->translatedFormat('H:i') }}</td>
                            <td class="px-4 py-3 font-semibold">{{ \Carbon\Carbon::parse($item->jamakhir)->translatedFormat('H:i') }} WIB</td>
                            <td class="px-6 py-4">
                                <span class="
                                 @if($item->status == 'dilaksanakan')
                                 bg-red-800 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300
                                 @elseif($item->status == 'dibooking')
                                 bg-yellow-500 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300
                                  
                                 @elseif($item->status == 'selesai'|| $item->status == 'tersedia' )
                                 bg-green-700 text-white text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300
                                  @endif">
                                    {{ $item->status }}
                                </span>
                            </td>
                            @endif
                  @endforeach
                            </tbody>
                          </table>
                      </div>
            {{-- end modal --}}
          </div>
         
        

           

          
              
         
      
                  <div class="content-center">
                    <div class="flex items-center justify-end gap-2 sm:justify-start">
                    <!-- Modal ganti  -->
                    @auth
                    <label for="updateProductButton{{$nomorkelas}}"><img src="{{ asset('img/jadwal2.png') }}" alt="jadwal" width="30" height="30"></label>
                    <button type="submit" id="updateProductButton{{$nomorkelas}}" data-modal-target="ganti-{{$nomorkelas}}" data-modal-toggle="ganti-{{ $nomorkelas }}" class="w-full rounded-lg border border-gray-200 bg-yellow-400 px-3 py-2 text-sm font-medium text-white hover:bg-yellow-500 hover:text-white focus:z-10 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-yellow-800 dark:bg-yellow-800 dark:text-white dark:hover:bg-yellow-900 dark:hover:text-white dark:focus:ring-white sm:w-auto">Ganti Jadwal</button>@endauth
                    <div id="ganti-{{ $nomorkelas }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-20 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                          <!-- Modal content -->
                          <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                              <!-- Modal header -->
                              <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                      Ganti Jadwal ke kelas [{{$nomorkelas}}]
                                  </h3>
                                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="ganti-{{ $nomorkelas }}">
                                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                      <span class="sr-only">Close modal</span>
                                  </button>
                              </div>
                              <!-- Modal body -->
                              <form method="POST" action="{{ route('ganti.store') }}">
                                @csrf
              
                                <!-- Input Tanggal -->
                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                    <div class="relative max-w-sm">
                                        <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Tanggal</label>
                                        <div class="absolute start-0 flex items-center ps-3 py-3 pointer-events-none">
                                          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                              <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <input id="datepicker-actions-{{ $nomorkelas }}" name="tanggalganti" datepicker datepicker-buttons datepicker-autoselect-today type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                    </div>
              
                                    <!-- Input matkul -->
                                    <div>
                                        @auth
                                            
                                       
                                        <label for="matkul" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">matakuliah</label>
                                        <select name="matkul" id="matkul" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                                            @foreach($matkuls as $id => $matakuliah)
                                                <option value="{{ $matakuliah }}">{{$matakuliah}}</option>
                                            @endforeach
                                        </select>
                                        @endauth
                                    </div>
                                   {{-- tst --}}


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
              @auth
                  
            
                                    <!-- Input Hidden user_id dan kelas_id -->
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="kelas" value="{{ $nomorkelas }}">
                                    <input type="hidden" name="user_class" value="{{Auth::user()->user_class}}">
                                    <input type="hidden" name="status" value="dibooking">

                                    @endauth
                                </div>
              
                                <!-- Submit Form -->
                                <div class="flex justify-end items-center space-x-4">
                                    <button type="submit" class="w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                      Ganti Jadwal
                                    </button>
                                </div>
              
                              </form>
                          </div>
                      </div>
                    </div>
                       
                 </div>
            </div>
      
                  
       <!-- Modal ganti end -->   
                  <div class="col-span-2 content-center sm:col-span-1 sm:justify-self-end grid grid-cols-2">
                    <!-- Modal pesan -->
                    @auth
                        
                    
                      <button type="submit" id="updateProductButton{{$nomorkelas}}" data-modal-target="pesan-{{$nomorkelas}}" data-modal-toggle="pesan-{{ $nomorkelas }}" class="w-full rounded-lg border border-gray-200 bg-green-800 px-3 py-2 text-sm font-medium text-white hover:bg-green-500 hover:text-white focus:z-10 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-green-800 dark:bg-green-800 dark:text-gray-100 dark:hover:bg-green-900 dark:hover:text-white dark:focus:ring-white sm:w-auto">Pesan</button>@endauth
                      <div id="pesan-{{ $nomorkelas }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-20 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                            <!-- Modal content -->
                            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                <!-- Modal header -->
                                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Pesan [{{$nomorkelas}}]
                                    </h3>
                                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="pesan-{{ $nomorkelas }}">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form method="POST" action="{{ route('pesan.store') }}">
                                  @csrf
                
                                  <!-- Input Tanggal -->
                                  <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                      <div class="relative max-w-sm">
                                          <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Tanggal</span>
                                          <div class="absolute start-0 flex items-center ps-3 py-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                              </svg>
                                          </div>
                                          <input id="datepicker-pesan-{{ $nomorkelas }}" name="tanggalpesan" datepicker datepicker-buttons datepicker-autoselect-today type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                      </div>
                
                                      <!-- Input Kegiatan -->
                                      <div>
                                          <label for="kegiatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kegiatan</label>
                                          <input type="text" name="kegiatan" id="kegiatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tuliskan kegiatan">
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
                @auth
                    
             
                                      <!-- Input Hidden user_id dan kelas_id -->
                                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                      <input type="hidden" name="kelas_id" value="{{ $data->where('nomorkelas',$nomorkelas)->first()->id }}">
                                      <input type="hidden" name="user_class" value="{{Auth::user()->user_class}}">
                                      @endauth
                                  </div>
                
                                  <!-- Submit Form -->
                                  <div class="flex justify-end items-center space-x-4">
                                      <button type="submit" class="w-full text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                                        Pesan
                                      </button>
                                  </div>
                
                                </form>
                            </div>
                        </div>
                        
                      </div>
                       <!-- Modal pesan end -->
                      
                      <a href="{{ route('detail.index', $data->where('nomorkelas', $nomorkelas)->first()->id) }}" 
                        class="ml-3 w-full flex items-center justify-center rounded-lg border border-gray-200 bg-purple-800 px-3 py-2 pr-3 text-sm font-medium text-white hover:bg-purple-400 hover:text-white focus:z-10 focus:outline-none focus:ring-2 focus:ring-purple-700 dark:border-purple-800 dark:bg-gray-800 dark:text-gray-100 dark:hover:bg-purple-600 dark:hover:text-white dark:focus:ring-white sm:w-auto">
                        Detail
                     </a>
                     
                  </div>
                      
                
                     
                </div>
           


                @endforeach
           
 

        
      
                
              </div>
            </div>
          
            <div class="flex justify-center mt-20 mb-5"> 
                @if ($data->hasPages())
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-base h-10">
                {{-- Previous Page Link --}}
                @if ($data->onFirstPage())
                    <li aria-disabled="true">
                        <span class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $data->previousPageUrl() }}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                @endif
    
                {{-- Pagination Elements --}}
                @foreach ($data->links()->elements as $element)  {{-- Perubahan di sini --}}
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li aria-disabled="true">
                            <span class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">...</span>
                        </li>
                    @endif
    
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $data->currentPage())
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
                @if ($data->hasMorePages())
                    <li>
                        <a href="{{ $data->nextPageUrl() }}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
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
          
        </div>
        
      </section>
      <script>
          function closeSuccessModal() {
    document.getElementById('successModal').classList.add('hidden');
}

// Add this logic to show modal on page load if success session exists
document.addEventListener('DOMContentLoaded', function () {
    if ("{{ session('success') }}") {
        document.getElementById('successModal').classList.remove('hidden');
    }
});

      </script>
           </x-layout>
          
          






