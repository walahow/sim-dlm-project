<?php
namespace App\Http\Controllers;

use App\Models\Gedung;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class datagedung extends Controller
{
    public function index($id)
    {
        // Ambil input pencarian dari request
        // $id juga bisa menjadi parameter pencarian default
        
        // Fetch data from the database menggunakan query builder
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
        ->where('kelas.nomorkelas', 'like', "%{$id}%")
                            ->orWhere('pesan.status', 'like', "%{$id}%")
                            ->paginate(7);
   

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
