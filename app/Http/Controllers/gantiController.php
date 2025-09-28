<?php

namespace App\Http\Controllers;

use App\Models\Matkulganti;
use App\Models\Kelas;
use App\Models\Matkul;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GantiController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validasi data input
            $validatedData = $request->validate([
                'tanggalganti' => 'required',
                'jammulai'     => 'required',
                'jamakhir'     => 'required',
                'status'       => 'required|string|in:dibooking,dilaksanakan,selesai',
                'kelas'        => 'required', // Nama kelas, bukan ID
                'user_class'   => 'required|string|max:255', // Nama kelas, bukan ID
                'user_id'   => 'required', // Nama kelas, bukan ID
                'matkul'       => 'required|string|max:255', // Nama matkul, bukan ID
            ]);

            // Cari ID kelas berdasarkan nama kelas yang diberikan
            $kelas = Kelas::where('nomorkelas', $validatedData['kelas'])->first();
            if (!$kelas) {
                return redirect()->back()->withErrors(['error' => 'Kelas tidak ditemukan.']);
            }

            // Cari ID matkul berdasarkan nama matkul yang diberikan
            $matkul = Matkul::where('matakuliah', $validatedData['matkul'])->first();
            if (!$matkul) {
                return redirect()->back()->withErrors(['error' => 'Mata kuliah tidak ditemukan.']);
            }

            // Menyimpan data ke tabel matkulganti
         Matkulganti::create([
                'kelas_id'     => $kelas->id, // Menggunakan ID kelas yang ditemukan
                'matkul_id'    => $matkul->id, // Menggunakan ID matkul yang ditemukan
                'user_id'    => $validatedData['user_id'],
                'tanggalganti' => Carbon::parse($validatedData['tanggalganti'])->format('Y-m-d'),
                'hari'         => Carbon::parse($validatedData['tanggalganti'])->translatedFormat('l'),
                'user_class'     => $validatedData['user_class'],
                'jammulai'     => $validatedData['jammulai'],
                'jamakhir'     => $validatedData['jamakhir'],
                'status'       => $validatedData['status'],
            ]);
           
            // Redirect atau response setelah menyimpan data
            return redirect()->back()->with('success', 'Data mata kuliah ganti berhasil ditambahkan!');
        }  catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->back()->withErrors(['error' => 'Jadwal pesanan bertabrakan dengan jadwal yang ada.']);
            }
            else if ($e->getCode() == 46000) {
                return redirect()->back()->withErrors(['error' => 'tidak dapat ganti kelas dengan tanggal yang lampau.']);
            }
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }
    public function destroy($id)
{
    // Cari matkul ganti berdasarkan ID
    $matkulGanti = MatkulGanti::findOrFail($id);
    
    // Hapus data
    $matkulGanti->delete();

    // Redirect atau beri respon setelah berhasil menghapus
    return redirect()->back()->with('success', 'Matkul ganti berhasil dihapus');
}
public function destroymg($id)
{
    // Cari matkul ganti berdasarkan ID
    $matkulGanti = Matkulganti::findOrFail($id);
    
    // Hapus data
    $matkulGanti->delete();

    // Redirect atau beri respon setelah berhasil menghapus
    return redirect()->back()->with('success', 'Matkul ganti berhasil dihapus');
}

}
