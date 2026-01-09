<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'id',
        'EMAIL',
        'SENHA',
        'TIPO'
    ];


    public function dadosAluno() {
        return $this->hasOne(Aluno::class);
    }
    public function dadosInstrutor() {
        return $this->hasOne(Instrutore::class);
    }
}
