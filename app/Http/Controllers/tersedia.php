<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class tersedia extends Controller
{
    public function tersediaFilter()
{
    $matkulDibatalkan = DB::table('matkul')
    ->leftJoin('kelas', 'matkul.kelas_id', '=', 'kelas.id')
    ->select(
        
        'kelas.nomorkelas',
        'kelas.id',
        'matkul.matakuliah',
        'matkul.status as matkul_status',
        'matkul.hari',
        'matkul.jammulai',
        'matkul.jamakhir',
        'matkul.dosen',
        'matkul.user_id'
    )
        ->where('matkul.status', 'dibatalkan')
        ->paginate(8);

    $matkulGantiSelesai = DB::table('matkulganti')
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
        ->where('matkulganti.status', 'selesai')
        ->paginate(8);

    $pesanSelesai = DB::table('pesan')
    ->join('users', 'pesan.user_id', '=', 'users.id')
    ->leftJoin('kelas', 'pesan.kelas_id', '=', 'kelas.id')
    ->select('users.id','kelas.id as kelas_id','kelas.nomorkelas','pesan.tanggalpesan','pesan.hari','pesan.jammulai','pesan.jamakhir','pesan.kegiatan','pesan.status')
        ->where('pesan.status', 'selesai')
        ->paginate(8);

 
    return view('tersedia', [
        'matkul_dibatalkan' => $matkulDibatalkan,
        'matkulganti_selesai' => $matkulGantiSelesai,
        'pesan_selesai' => $pesanSelesai
    ]);
}
    public function dipakaiFilter()
{
    $matkulDibatalkan = DB::table('matkul')
    ->leftJoin('kelas', 'matkul.kelas_id', '=', 'kelas.id')
    ->select(
        
        'kelas.nomorkelas',
        'kelas.id',
        'matkul.matakuliah',
        'matkul.status as matkul_status',
        'matkul.hari',
        'matkul.jammulai',
        'matkul.jamakhir',
        'matkul.dosen',
        'matkul.user_id'
    )
        ->where('matkul.status', 'dilaksanakan')
        ->paginate(8);

    $matkulGantiSelesai = DB::table('matkulganti')
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
        ->where('matkulganti.status', 'dilaksanakan')
        ->paginate(8);

    $pesanSelesai = DB::table('pesan')
    ->join('users', 'pesan.user_id', '=', 'users.id')
    ->leftJoin('kelas', 'pesan.kelas_id', '=', 'kelas.id')
    ->select('users.id','kelas.id as kelas_id','kelas.nomorkelas','pesan.tanggalpesan','pesan.hari','pesan.jammulai','pesan.jamakhir','pesan.kegiatan','pesan.status')
        ->where('pesan.status', 'dilaksanakan')
        ->paginate(8);

 
    return view('tersedia', [
        'matkul_dibatalkan' => $matkulDibatalkan,
        'matkulganti_selesai' => $matkulGantiSelesai,
        'pesan_selesai' => $pesanSelesai
    ]);
}
    public function dipesanFilter()
{
    $matkulDibatalkan = DB::table('matkul')
    ->leftJoin('kelas', 'matkul.kelas_id', '=', 'kelas.id')
    ->select(
        
        'kelas.nomorkelas',
        'kelas.id',
        'matkul.matakuliah',
        'matkul.status as matkul_status',
        'matkul.hari',
        'matkul.jammulai',
        'matkul.jamakhir',
        'matkul.dosen',
        'matkul.user_id'
    )
        ->where('matkul.status', 'sesuai')
        ->paginate(8);

    $matkulGantiSelesai = DB::table('matkulganti')
    ->leftJoin('matkul', 'matkulganti.matkul_id', '=', 'matkul.id')  
                ->leftJoin('kelas', 'matkulganti.kelas_id', '=', 'kelas.id')    
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
        ->where('matkulganti.status', 'dibooking')
        ->paginate(8);

    $pesanSelesai = DB::table('pesan')
    ->join('users', 'pesan.user_id', '=', 'users.id')
    ->leftJoin('kelas', 'pesan.kelas_id', '=', 'kelas.id')
    ->select('users.id','kelas.id as kelas_id','kelas.nomorkelas','pesan.tanggalpesan','pesan.hari','pesan.jammulai','pesan.jamakhir','pesan.kegiatan','pesan.status')
        ->where('pesan.status', 'dibooking')
        ->paginate(8);

 
    return view('tersedia', [
        'matkul_dibatalkan' => $matkulDibatalkan,
        'matkulganti_selesai' => $matkulGantiSelesai,
        'pesan_selesai' => $pesanSelesai
    ]);
}

}


