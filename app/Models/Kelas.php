<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = [
        'id',
        'gedung_id',
        'nomorkelas',
        'kapasitas',
        'status',
        'ac',
        'kipas',
        'lampu',
        'keterangan', 
        'foto', 
    ];

    public function gedung()
    {
        return $this->belongsTo(Gedung::class);
    }

    public function matkul()
    {
        return $this->hasMany(Matkul::class);
    }

    public function matkulganti()
    {
        return $this->hasMany(Matkulganti::class);
    }

    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }

    public function warnastatus()
    {
        return $this->hasOne(Warnastatus::class);
    }
}