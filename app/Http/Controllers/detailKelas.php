<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detailKelas extends Controller
{
    public function index($id)
    {
        // Mengambil data kelas berdasarkan ID
        $kelas = Kelas::find($id);

        // Jika data kelas tidak ditemukan, redirect atau tampilkan pesan error
        if (!$kelas) {
            return redirect()->back()->withErrors(['error' => 'Kelas tidak ditemukan.']);
        }

        // Mengambil data tambahan dari tabel users dan pesan
        $pesan_Data = DB::table('pesan')
            ->join('users', 'pesan.user_id', '=', 'users.id')
            ->where('pesan.kelas_id', $id)
            ->select('users.username', 'users.id','users.no_telp','pesan.user_class','pesan.tanggalpesan', 'pesan.jammulai', 'pesan.jamakhir', 'pesan.status')
            ->paginate(7);

             // Ambil data matkul yang terkait dengan kelas
        $matkulData = DB::table('matkul')
        ->leftJoin('kelas', 'matkul.kelas_id', '=', 'kelas.id')
        ->select(
            
            'kelas.nomorkelas',
            'matkul.matakuliah',
            'matkul.status as matkul_status',
            'matkul.hari',
            'matkul.jammulai',
            'matkul.jamakhir',
            'matkul.dosen',
            'matkul.user_id'
        )
        ->where('kelas_id', $id)
        ->paginate(7);

    // Ambil data matkulganti yang terkait dengan matkul
    $matkulgantiData = DB::table('matkulganti')
    ->leftJoin('matkul', 'matkulganti.matkul_id', '=', 'matkul.id')  // Perbaikan di sini
                ->leftJoin('kelas', 'matkulganti.kelas_id', '=', 'kelas.id')    // Join tabel kelas
        ->select(
            'matkul.kelas_id',
            'kelas.nomorkelas',
            'matkul.matakuliah',
            'matkulganti.tanggalganti',
            'matkulganti.status as matkulganti_status',
            'matkulganti.jammulai as matkulganti_jm',
            'matkulganti.jamakhir as matkulganti_ja',
            'matkulganti.id',
            'matkulganti.user_id'
            

        )
        ->where('matkulganti.kelas_id', $id)
        ->paginate(7);

    // // Cek jika tidak ada kelas yang dipesan
    // $noClass = $kelas->isEmpty();

    return view('detail', [
        'kelas'=>$kelas,
        'pesan_Data' => $pesan_Data,
        'matkul_Data' => $matkulData,
        'matkulganti_Data' => $matkulgantiData,
        // 'noClass' => $noClass,
    ]);

        // Kirim data ke view detail
    }
}

