<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'id',
        'username',
        'email',
        'no_telp',
        'password',
        'foto', 
        'user_class',
    ];

    public function pesan()
    {
        return $this->hasMany(Pesan::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}