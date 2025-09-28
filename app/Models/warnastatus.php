<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warnastatus extends Model
{
    use HasFactory;
    protected $table = 'warnastatus';
    protected $fillable = [
        'status',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}