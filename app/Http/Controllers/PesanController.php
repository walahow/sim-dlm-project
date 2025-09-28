<?php

namespace App\Http\Controllers;
use Illuminate\Database\QueryException;
use Carbon\Carbon;
use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function store(Request $request)
    {
        try{// Validasi data input
        $validatedData = $request->validate([
            'tanggalpesan' => 'required|date',
            'jammulai'     => 'required',
            'jamakhir'     => 'required',
            'kegiatan'     => 'required|string|max:255',
            'kelas_id'     => 'required|exists:kelas,id', // pastikan kelas_id valid
            'user_id'      => 'required|exists:users,id', // pastikan user_id valid
            'user_class'      => 'required|exists:users,user_class', // pastikan user_id valid
        ]);

        // Menyimpan data ke database
        $tanggalPesan = Carbon::createFromFormat('m/d/Y', $request->tanggalpesan)->format('Y-m-d');


        Pesan::create([
            'kelas_id'     => $validatedData['kelas_id'],
            'user_id'      => $validatedData['user_id'],
            'tanggalpesan' => $tanggalPesan,
            'hari'         => \Carbon\Carbon::parse($validatedData['tanggalpesan'])->translatedFormat('l'), // Hari
            'jammulai'     => $validatedData['jammulai'],
            'jamakhir'     => $validatedData['jamakhir'],
            'kegiatan'     => $validatedData['kegiatan'],
            'user_class'     => $validatedData['user_class'],
            
        ]);

        // Redirect atau response setelah menyimpan data
        return redirect()->back()->with('success', 'kelas berhasil di pesan!');
    }
    catch (QueryException $e) {
        if ($e->getCode() == 45000) {
            return redirect()->back()->withErrors(['error' => 'Jadwal pesanan bertabrakan dengan jadwal yang ada.']);
        }
        else if ($e->getCode() == 46000) {
            return redirect()->back()->withErrors(['error' => 'tidak dapat memesan dengan tanggal yang lampau.']);
        }

        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
    }
    }
}
