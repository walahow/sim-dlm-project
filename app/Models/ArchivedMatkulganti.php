<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivedMatkulganti extends Model
{
    use HasFactory;
    
    // *** Koneksi Arsip ***
    protected $connection = 'arsip'; 
    protected $table = 'matkulganti-archived'; 

    // Pastikan semua kolom dapat diisi
    protected $guarded = []; 

    // Tambahkan archived_at ke casts agar otomatis menjadi objek Carbon
    protected $casts = [
        'tanggalganti' => 'date',
        'archived_at' => 'datetime',
    ];

    // Relasi tidak diperlukan di Model Arsip
}