<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'name', 'email', 'password'
    ];

    public function avaliacao()
    {
        return $this->hasMany(Avaliacao::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

}
