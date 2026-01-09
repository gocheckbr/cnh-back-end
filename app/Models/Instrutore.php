<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instrutore extends Model
{

        protected $fillable = [
        'id',
        'usuario_id',
        'NOME',
        'CPF',
        'TELEFONE',
        'FOTO',
        'PAÍS',
        'ESTADO',
        'CIDADE',
        'BAIRRO'
    ];

    public function usuario() {
        return $this->belongsTo(Usuario::class);
    } 
}
