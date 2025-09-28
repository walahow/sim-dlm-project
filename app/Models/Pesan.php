<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
    use HasFactory;
    protected $table = 'pesan';
    protected $fillable = [
        'tanggalpesan',
        'hari',
        'jammulai',
        'jamakhir',
        'kegiatan',
        'status',
        'user_id',
        'kelas_id',
        'user_class'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function history()
    {
        return $this->hasOne(History::class);
    }
}