<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    use HasFactory;
    protected $table = 'gedung';

    protected $fillable = [
        'nomorgedung',
        'jumlahkelas',
        'lokasi',
        'Pengurusgedung',
        'lantai',
        'foto',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}