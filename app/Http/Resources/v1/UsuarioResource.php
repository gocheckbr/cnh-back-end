<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    private array $tipos = [0 => 'aluno',
        1 => 'instrutor'        
        ];

    public function toArray(Request $request): array
    {

        return[
            'id' => $this->id,
            'email' => $this->EMAIL,
            'senha' => $this->SENHA,
            'criado em' => $this->CREATED_AT,
            'tipo' => $this->tipos[$this->TIPO]
        ];
    }

}


