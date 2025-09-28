<?php
namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class tambahmatkul extends Controller
{
    public function tambahmatkul(Request $request)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'hari' => 'required|string|max:255',
            'dosen' => 'required|string|max:255',
            'jammulai' => 'required|date_format:H:i',
            'jamakhir' => 'required|date_format:H:i|after:jammulai',
            'status' => 'required|string|max:50',
            'kelas_id' => 'required|string|max:50', // Nama kelas, bukan ID
            'user_class' => 'required|string|max:255',
            'user_id' => 'required|integer',
            'matkul' => 'required|string|max:255', // Nama matkul, bukan ID
        ]);

        // Cari ID kelas berdasarkan nama kelas yang diberikan
        $kelas = Kelas::where('nomorkelas', $validatedData['kelas_id'])->first();
        if (!$kelas) {
            return redirect()->back()->withErrors(['error' => 'Kelas tidak ditemukan.']);
        }

        try {
            // Menyimpan data ke tabel Matkul
            $matkul = Matkul::create([
                'kelas_id' => $kelas->id, // Menggunakan ID kelas yang ditemukan
                'matakuliah' => $validatedData['matkul'],
                'dosen' => $validatedData['dosen'],
                'user_id' => $validatedData['user_id'],
                'hari' => $validatedData['hari'],
                'user_class' => $validatedData['user_class'],
                'jammulai' => $validatedData['jammulai'],
                'jamakhir' => $validatedData['jamakhir'],
                'status' => $validatedData['status'],
            ]);

            // Redirect atau response setelah menyimpan data
            return redirect()->back()->with('success', 'Mata kuliah KRS berhasil ditambahkan.');
        }catch (QueryException $e) {
            if ($e->getCode() == 45000) {
                return redirect()->back()->withErrors(['error' => 'Jadwal matkul bertabrakan dengan jadwal yang ada.']);
            }
          
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }
}
