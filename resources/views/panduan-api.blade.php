<x-layout>
    <section class="bg-white p-6 antialiased dark:bg-gray-900 rounded-xl">
        <div class="mx-auto max-w-screen-xl">
            {{-- Header --}}
            <div class="mb-8">
                <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">Panduan Penggunaan API 📖</h2>
                <p class="mt-2 text-gray-500 dark:text-gray-400">
                    Dokumentasi untuk mengambil data arsip secara terprogram.
                </p>
            </div>

            <div class="space-y-8">
                {{-- Bagian 1: Intro --}}
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Pengantar
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        API ini disediakan untuk mengambil data arsip berdasarkan rentang waktu tertentu dari tabel yang spesifik. Data dikembalikan dalam format JSON yang ideal untuk diolah menjadi file CSV atau format lainnya.
                    </p>
                </div>

                <hr class="border-gray-200 dark:border-gray-700">

                {{-- Bagian 2: Endpoint Dinamis --}}
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Endpoint Dinamis
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-3">
                        Gunakan metode <strong class="text-green-500 font-semibold">GET</strong> dengan struktur URL berikut, di mana Anda mengganti `{tableName}` dengan nama tabel yang valid.
                    </p>
                    <pre class="bg-gray-100 dark:bg-gray-800 p-4 rounded-lg text-gray-800 dark:text-gray-200 font-mono text-sm"><code>/api/archive/{tableName}</code></pre>

                    <h4 class="font-semibold text-gray-800 dark:text-gray-200 mt-4 mb-2">Nilai `{tableName}` yang Valid:</h4>
                    <ul class="list-disc list-inside space-y-1 text-gray-600 dark:text-gray-300">
                        <li><code class="bg-gray-200 dark:bg-gray-700 text-sm p-1 rounded">pesan-archived</code></li>
                        <li><code class="bg-gray-200 dark:bg-gray-700 text-sm p-1 rounded">matkulganti-archived</code></li>
                        <li><code class="bg-gray-200 dark:bg-gray-700 text-sm p-1 rounded">users-archived</code></li>
                    </ul>
                </div>

                <hr class="border-gray-200 dark:border-gray-700">

                {{-- Bagian 3: Parameter --}}
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Parameter Wajib
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-3">
                        Anda wajib menyertakan dua parameter pada query URL untuk semua endpoint:
                    </p>
                    <ul class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300">
                        <li><code class="bg-gray-100 dark:bg-gray-700 text-purple-500 font-mono text-sm px-2 py-1 rounded">start_date</code>: Tanggal mulai (format: <strong class="text-gray-800 dark:text-gray-200">YYYY-MM-DD</strong>).</li>
                        <li><code class="bg-gray-100 dark:bg-gray-700 text-purple-500 font-mono text-sm px-2 py-1 rounded">end_date</code>: Tanggal selesai (format: <strong class="text-gray-800 dark:text-gray-200">YYYY-MM-DD</strong>).</li>
                    </ul>
                </div>
                
                <hr class="border-gray-200 dark:border-gray-700">

                {{-- Bagian 4: Contoh Python --}}
                <div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">
                        Script Python untuk Mengunduh Data
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-3">
                        Salin kode di bawah dan simpan sebagai file <code class="bg-gray-200 dark:bg-gray-700 text-sm p-1 rounded">.py</code>. Untuk mengunduh data dari tabel yang berbeda, cukup ubah nilai variabel <strong class="text-purple-400">`NAMA_TABEL`</strong> di bagian atas script.
                    </p>
                    <div class="bg-gray-800 dark:bg-black p-4 rounded-lg text-sm font-mono overflow-x-auto">
                        <pre><code><span class="text-purple-400">import</span> requests
<span class="text-purple-400">import</span> csv
<span class="text-purple-400">import</span> os

<span class="text-gray-400"># --- PENGATURAN ---</span>
<span class="text-gray-400"># Pilih nama tabel yang ingin diunduh:</span>
<span class="text-gray-400"># 'pesan-archived', 'matkulganti-archived', atau 'users-archived'</span>
<span class="text-sky-300">NAMA_TABEL</span> = <span class="text-yellow-300">'pesan-archived'</span> <span class="text-gray-400"># 👈 Cukup ganti nama tabelnya di sini</span>

<span class="text-gray-400"># Tentukan rentang tanggal</span>
<span class="text-sky-300">start</span> = <span class="text-yellow-300">'2025-10-01'</span>
<span class="text-sky-300">end</span> = <span class="text-yellow-300">'2025-10-31'</span>

<span class="text-gray-400"># URL aplikasi Anda</span>
<span class="text-sky-300">base_url</span> = <span class="text-yellow-300">'{{ url('/') }}'</span>
<span class="text-gray-400"># ------------------</span>

<span class="text-sky-300">api_url</span> = <span class="text-green-300">f"</span><span class="text-yellow-300">{base_url}/api/archive/{NAMA_TABEL}?start_date={start}&end_date={end}</span><span class="text-green-300">"</span>

<span class="text-blue-400">print</span>(<span class="text-green-300">f"</span><span class="text-yellow-300">Mengakses URL: {api_url}</span><span class="text-green-300">"</span>)

<span class="text-purple-400">try</span>:
    <span class="text-sky-300">response</span> = requests.<span class="text-blue-400">get</span>(api_url)
    response.<span class="text-blue-400">raise_for_status</span>()
    <span class="text-sky-300">data</span> = response.<span class="text-blue-400">json</span>()

    <span class="text-purple-400">if</span> data:
        <span class="text-sky-300">script_dir</span> = os.path.<span class="text-blue-400">dirname</span>(os.path.<span class="text-blue-400">abspath</span>(__file__))
        <span class="text-sky-300">nama_file_csv</span> = <span class="text-green-300">f"</span><span class="text-yellow-300">{NAMA_TABEL}_{start}_sampai_{end}.csv</span><span class="text-green-300">"</span>
        <span class="text-sky-300">file_path</span> = os.path.<span class="text-blue-400">join</span>(script_dir, nama_file_csv)

        <span class="text-sky-300">headers</span> = data[<span class="text-orange-400">0</span>].<span class="text-blue-400">keys</span>()

        <span class="text-purple-400">with</span> <span class="text-blue-400">open</span>(file_path, <span class="text-yellow-300">'w'</span>, newline=<span class="text-yellow-300">''</span>, encoding=<span class="text-yellow-300">'utf-8'</span>) <span class="text-purple-400">as</span> output_file:
            <span class="text-sky-300">writer</span> = csv.<span class="text-blue-400">DictWriter</span>(output_file, fieldnames=headers)
            writer.<span class="text-blue-400">writeheader</span>()
            writer.<span class="text-blue-400">writerows</span>(data)

        <span class="text-blue-400">print</span>(<span class="text-green-300">f"</span><span class="text-yellow-300">✅ Data berhasil disimpan ke: {file_path}</span><span class="text-green-300">"</span>)
    <span class="text-purple-400">else</span>:
        <span class="text-blue-400">print</span>(<span class="text-green-300">f"</span><span class="text-yellow-300">Tidak ada data di tabel '{NAMA_TABEL}' yang ditemukan.</span><span class="text-green-300">"</span>)

<span class="text-purple-400">except</span> requests.exceptions.RequestException <span class="text-purple-400">as</span> e:
    <span class="text-blue-400">print</span>(<span class="text-green-300">f"</span><span class="text-yellow-300">Terjadi kesalahan: {e}</span><span class="text-green-300">"</span>)
</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>