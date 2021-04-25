<?php

namespace App\Models;

use App\Models\Traits\UserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'empresa_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empresa(){
       // dd($this->hasOne(Empresa::class,  'empresa_id'));
        return $this->hasOne(Empresa::class,  'id', 'empresa_id');
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeEmpresaUsuario(Builder $query)
    {
        return $query->where('empresa_id', auth()->user()->empresa_id);
    }


    /**
     * Get User
     */

    public function roles(){

        return $this->belongsToMany(Role::class, 'user_role');
    }

    /**
     * Role não vinculada a esse role
     */
    public function createRole(){

        $role = Role::whereNotIn('id', function($query){
            $query->select('user_role.role_id');
            $query->from('user_role');
            $query->whereRaw("user_role.user_id={$this->id}");
        })->paginate(10);

        return $role;
    }

}
