<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalhesPlano extends Model
{
    protected $table = 'detalhes_planos';
    protected $fillable = ['nome',  'plano_id'];

    public function plano(){
        return $this->belongsTo(Plano::class);
    }
}
