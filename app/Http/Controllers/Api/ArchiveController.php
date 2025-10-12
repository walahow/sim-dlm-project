<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ArchiveController extends Controller
{
    /**
     * Mengambil data dari tabel arsip yang ditentukan.
     *
     * @param Request $request
     * @param string $tableName Nama tabel dari URL
     * @return \Illuminate\Http\JsonResponse
     */
    public function getArchiveData(Request $request, string $tableName)
    {
        // 1. Keamanan: Buat daftar tabel yang diizinkan untuk diakses
        $allowedTables = [
            'pesan-archived',
            'matkulganti-archived',
            'users-archived'
        ];

        if (!in_array($tableName, $allowedTables)) {
            // Jika nama tabel tidak ada dalam daftar, tolak permintaan
            return response()->json(['error' => 'Akses ke tabel ini tidak diizinkan.'], 403);
        }

        // 2. Validasi input tanggal
        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date_format:Y-m-d',
            'end_date'   => 'required|date_format:Y-m-d|after_or_equal:start_date',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // 3. Ambil data dari database
        $startDate = $request->start_date . " 00:00:00";
        $endDate = $request->end_date . " 23:59:59";

        // Ganti 'created_at' jika nama kolom tanggalmu berbeda
        $data = DB::connection('arsip')
            ->table($tableName)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->get();

        // 4. Kembalikan data dalam format JSON
        return response()->json($data);
    }
}