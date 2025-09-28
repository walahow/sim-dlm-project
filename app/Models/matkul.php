<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    protected $table = 'matkul';
    protected $fillable = [
        'matakuliah',
        'hari',
        'jammulai',
        'jamakhir',
        'dosen',
        'status',
        'user_class',
        'user_id',
        'kelas_id',
        'keterangan',
    ];

    public function kelas()
{
    return $this->belongsTo(Kelas::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
    public function matkulganti()
    {
        return $this->hasMany(Matkulganti::class);
    }
}