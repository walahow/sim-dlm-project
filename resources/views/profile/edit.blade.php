<x-layout>
    <section class="py-10 my-auto dark:bg-gray-900">
        <div class="lg:w-[80%] md:w-[90%] xs:w-[96%] mx-auto flex gap-4">
            <div class="lg:w-[88%] md:w-[80%] sm:w-[88%] xs:w-full mx-auto shadow-2xl p-4 rounded-xl h-fit self-center dark:bg-gray-800/40">
                
                <div class="">
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
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                   
                    
                    <form action="{{ route('profile.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Profile Image -->
                        <div class="mx-auto flex justify-center items-center w-[141px] h-[141px] bg-blue-300/20 rounded-full overflow-hidden relative">
                            <img src="{{ asset('storage/profile/' . (Auth::user()->foto ?? 'default_siluet.png')) }}" 
                            alt="Profile Image" class="rounded-full object-cover w-full h-full">  
                        </div>
                        
                        <!-- Icon untuk upload di luar lingkaran -->
                        <div class="flex justify-center mt-2">
                            <input type="file" name="profile" id="upload_profile" hidden>
                            <label for="upload_profile" class="cursor-pointer flex items-center justify-center bg-white rounded-full w-8 h-8 shadow-xl">
                                <!-- SVG Icon -->
                                <svg class=" hover:bg-gray-200 hover:text-white w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="purple" stroke-linejoin="round" stroke-width="2" d="M4 18V8a1 1 0 0 1 1-1h1.5l1.707-1.707A1 1 0 0 1 8.914 5h6.172a1 1 0 0 1 .707.293L17.5 7H19a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Z"/>
                                    <path stroke="purple" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>
                                  
                            </label>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="mt-4 bg-purple-500 hover:bg-purple-600 hover:text-white text-white px-4 py-2 rounded">Upload Foto</button>
                    </form>
                </div>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow lg:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow lg:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                      
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>
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
