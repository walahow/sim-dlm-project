<?php

namespace App\Http\Controllers;

use App\Models\pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class myclass extends Controller
{
    // Fungsi untuk menampilkan kelas yang dipesan
    public function index()
    {
        $class = DB::table('users')->select('user_class')->get();

if (Auth::check()) {
        // Ambil user_class dari pengguna yang sedang login
        $userClass = Auth::user()->user_class;
        $userId = Auth::user()->id;
    } else {
        // Jika pengguna belum login, anggap user sebagai guest, atau bisa dibiarkan kosong
        $userClass = null;
        $userId = null;
    }
        // Ambil data kelas yang dipesan oleh user berdasarkan user_class
        $userClasses = DB::table('kelas')
            ->leftJoin('pesan', 'kelas.id', '=', 'pesan.kelas_id')
            ->select(
                'kelas.nomorkelas',
                'kelas.id',
                'kelas.foto',
                'pesan.jammulai',
                'pesan.jamakhir',
                'pesan.status as pesan_status',
                'pesan.user_id',
                'pesan.tanggalpesan'
            )
            ->where('pesan.user_id', $userId) // Filter berdasarkan user_id
            ->where('pesan.user_class', $userClass) // Filter berdasarkan user_class
            ->get();

        // Ambil data matkul yang terkait dengan kelas berdasarkan user_class
        $matkulData = DB::table('matkul')
            ->leftJoin('kelas', 'matkul.kelas_id', '=', 'kelas.id')
            ->select(
                'kelas.nomorkelas',
                'matkul.matakuliah',
                'matkul.id',
                'matkul.status as matkul_status',
                'matkul.hari',
                'matkul.jammulai',
                'matkul.jamakhir',
                'matkul.dosen',
                'matkul.keterangan',
                'matkul.User_id'
            )
            ->where('matkul.User_id', $userId) // Filter berdasarkan user_id
            ->where('matkul.user_class', $userClass) // Filter berdasarkan user_class
            ->get();

        // Ambil data matkulganti yang terkait dengan matkul berdasarkan user_class
        $matkulgantiData = DB::table('matkulganti')
            ->leftJoin('matkul', 'matkulganti.matkul_id', '=', 'matkul.id')
            ->leftJoin('kelas', 'matkulganti.kelas_id', '=', 'kelas.id')
            ->select(
                'kelas.nomorkelas',
                'matkul.matakuliah',
                'matkulganti.tanggalganti',
                'matkulganti.status as matkulganti_status',
                'matkulganti.jammulai as matkulganti_jm',
                'matkulganti.jamakhir as matkulganti_ja',
                'matkulganti.id',
                'matkulganti.user_id',
                
            )
            ->where('matkulganti.user_id', $userId) // Filter berdasarkan user_id
            ->where('matkulganti.user_class', $userClass) // Filter berdasarkan user_class
            ->get();
$kelas = DB::table('kelas')->select('id','nomorkelas')->get();
        // Cek jika tidak ada kelas yang dipesan
        $noClass = $userClasses->isEmpty();

        return view('myclass', [
            'userClasses' => $userClasses,
            'matkulData' => $matkulData,
            'matkulgantiData' => $matkulgantiData,
            'noClass' => $noClass,
            'kelas'=>$kelas,
            'pilihkelas' =>$class

        ]);
    }

    // Fungsi untuk meninggalkan kelas
    public function destroy($id)
    {
        // Dapatkan data pesan berdasarkan kelas_id dan user_id pengguna yang sedang login
        $classBooking = pesan::where('kelas_id', $id)
            ->where('user_id', Auth::user()->id)
            ->first(); // Mengambil pesan yang sesuai dengan kelas_id dan user_id

        // Jika booking tidak ditemukan
        if (!$classBooking) {
            return redirect()->route('myclass.index')->with('error', 'Kelas tidak ditemukan atau kamu tidak memiliki akses.');
        }

        // Hapus data booking yang sesuai dengan user_id yang sedang login
        $classBooking->delete();

        return redirect()->route('myclass.index')->with('success', 'Kamu telah meninggalkan kelas.');
    }

    public function cancelMatkul(Request $request, $id)
{
    // // Debugging: Melihat input yang diterima
    // dd($request->all()); 

    // Validasi bahwa keterangan tidak boleh kosong
    $request->validate([
        'keterangan' => 'required|string|max:255',
    ]);

    // Cari mata kuliah berdasarkan ID
    $matkul = DB::table('matkul')->where('id', $id)->first();

    // Jika mata kuliah tidak ditemukan
    if (!$matkul) {
        return redirect()->route('myclass.index')->with('error', 'Mata kuliah tidak ditemukan.');
    }

    // Update status mata kuliah menjadi 'dibatalkan' dan simpan keterangan
    DB::table('matkul')
        ->where('id', $id)
        ->update([
            'status' => 'dibatalkan',
            'keterangan' => $request->input('keterangan'),
        ]);

    return redirect()->route('myclass.index')->with('success', 'Mata kuliah berhasil dibatalkan.');
}

    


public function setMatkulSesuai($id)
{
    // Cari mata kuliah berdasarkan ID
    $matkul = DB::table('matkul')->where('id', $id)->first();

    // Jika mata kuliah tidak ditemukan
    if (!$matkul) {
        return redirect()->route('myclass.index')->with('error', 'Mata kuliah tidak ditemukan.');
    }

    // Update status mata kuliah menjadi 'sesuai' dan hapus keterangan
    DB::table('matkul')
        ->where('id', $id)
        ->update([
            'status' => 'sesuai',
            'keterangan' => null // Menghapus keterangan
        ]);

    return redirect()->route('myclass.index')->with('success', 'Status mata kuliah berhasil diperbarui menjadi sesuai.');
}

public function guest($user_class){
    // Ambil data kelas yang dipesan oleh user berdasarkan user_class
    $userClasses = DB::table('kelas')
    ->leftJoin('pesan', 'kelas.id', '=', 'pesan.kelas_id')
    ->leftJoin('users', 'pesan.user_id', '=', 'users.id')
    ->select(
        'kelas.nomorkelas',
        'kelas.id',
        'kelas.foto',
        'pesan.jammulai',
        'pesan.jamakhir',
        'pesan.status as pesan_status',
        'pesan.user_id',
        'pesan.tanggalpesan',
        'users.username'
    )
    ->where('pesan.user_class', $user_class) // Filter berdasarkan user_class
    ->get();

// Ambil data matkul yang terkait dengan kelas berdasarkan user_class
$matkulData = DB::table('matkul')
    ->leftJoin('kelas', 'matkul.kelas_id', '=', 'kelas.id')
    ->select(
        'kelas.nomorkelas',
        'matkul.matakuliah',
        'matkul.id',
        'matkul.status as matkul_status',
        'matkul.hari',
        'matkul.jammulai',
        'matkul.jamakhir',
        'matkul.dosen',
        'matkul.keterangan',
        'matkul.User_id'
    )
    ->where('matkul.user_class', $user_class) // Filter berdasarkan user_class
    ->get();

// Ambil data matkulganti yang terkait dengan matkul berdasarkan user_class
$matkulgantiData = DB::table('matkulganti')
    ->leftJoin('matkul', 'matkulganti.matkul_id', '=', 'matkul.id')
    ->leftJoin('kelas', 'matkulganti.kelas_id', '=', 'kelas.id')
    ->select(
        'kelas.nomorkelas',
        'matkul.matakuliah',
        'matkulganti.tanggalganti',
        'matkulganti.status as matkulganti_status',
        'matkulganti.jammulai as matkulganti_jm',
        'matkulganti.jamakhir as matkulganti_ja',
        'matkulganti.id',
        'matkulganti.user_id',
        
    )
    ->where('matkulganti.user_class', $user_class) // Filter berdasarkan user_class
    ->get();
    $noClass = $userClasses->isEmpty();
    return view('tamu/tamu', [
        'userClasses' => $userClasses,
        'matkulData' => $matkulData,
        'matkulgantiData' => $matkulgantiData,
        'noClass' => $noClass,

        
    
    ]);
}


}
