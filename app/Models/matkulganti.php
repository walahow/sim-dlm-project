<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;

class Matkulganti extends Model
{
    use HasFactory;
    protected $table = 'matkulganti';
    protected $fillable = [
        'kelas_id',
                'matkul_id',
                'user_id',
                'tanggalganti',
                'hari',
                'user_class',
                'jammulai',
                'jamakhir',
                'status' ,
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}