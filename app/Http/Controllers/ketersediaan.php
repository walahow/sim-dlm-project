<?php
namespace App\Http\Controllers;

use App\Models\gedung;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class Ketersediaan extends Controller
{
   
    public function index(Request $request)
    {
           // Ambil input pencarian dari request
    $search = $request->input('search');
    
    // Jika ada input pencarian, filter data berdasarkan keyword
    if ($search) {
        $data = DB::table('kelas')
        ->leftJoin('pesan', 'kelas.id', '=', 'pesan.kelas_id')
        ->select(
            'kelas.nomorkelas', 
            'kelas.id',
            'pesan.jammulai',
            'pesan.jamakhir',
            'pesan.status',
            'kelas.status',
            'pesan.tanggalpesan'
        )
        ->where('kelas.nomorkelas', 'like', "%{$search}%")
                            ->paginate(10);
                            
    } else {
        // Jika tidak ada pencarian, tampilkan semua data
        // Fetch availability data
        $data = DB::table('kelas')
            ->leftJoin('pesan', 'kelas.id', '=', 'pesan.kelas_id')
            ->select(
                'kelas.nomorkelas',
                'kelas.id',
                DB::raw('COALESCE(pesan.tanggalpesan, CURDATE()) as tanggalpesan'), // Default 'tersedia' if null
                DB::raw('COALESCE(pesan.jammulai, "00:00") as jammulai'), // Default 'tersedia' if null
                DB::raw('COALESCE(pesan.jamakhir, "00:00") as jamakhir'), // Default 'tersedia' if null
                DB::raw('COALESCE(pesan.kegiatan, "tersedia") as kegiatan'), // Default 'tersedia' if null
                DB::raw('COALESCE(pesan.status, "tersedia") as status') // Default 'tersedia' if null
            )
            ->paginate(7);
    }

    // Mengecek apakah pengguna sudah login
if (Auth::check()) {
    // Ambil user_class dari pengguna yang login
    $userClass = Auth::user()->user_class;

    // Ambil mata kuliah berdasarkan user_class dari pengguna yang login
    $matkuls = DB::table('matkul')->where('user_class', $userClass)->pluck('matakuliah', 'id');
} else {
    // Jika pengguna belum login, anggap user sebagai guest, atau bisa dibiarkan kosong
    $userClass = null;
    $matkuls = null;
}

    // $userClass = Auth::user()->user_class;

 $noClass = $data->isEmpty();
//  $matkuls = DB::table('matkul')->where('user_class', $userClass)->pluck('matakuliah', 'id');

    // Jika tidak ada data (noClass = true), redirect dengan pesan
    if ($noClass) {
        return redirect()->route('dashboard')->with('noClass', 'Data tidak ditemukan. Silakan coba pencarian lain.');
    }
    // Kirim data ke view
return view('dashboard', compact('data','noClass','matkuls'));
    }
  
   
}
