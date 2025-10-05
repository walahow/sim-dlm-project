<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedPesan extends Model
{
    use HasFactory;
    
    // *** Koneksi Arsip ***
    protected $connection = 'arsip'; 
    protected $table = 'pesan-archived'; 
    
    // Pastikan semua kolom dapat diisi, termasuk created_at, updated_at, dan archived_at
    protected $guarded = [];

    // Tambahkan archived_at ke casts agar otomatis menjadi objek Carbon
    protected $casts = [
        'tanggalpesan' => 'date',
        'archived_at' => 'datetime',
    ];

    // Relasi tidak diperlukan di Model Arsip karena data ini tidak lagi aktif
}