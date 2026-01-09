<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PessoaResource extends JsonResource //Como os dados inseridos em aluno e instrutor são os mesmos, ambos usam desse recurso.
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'Nome' => $this->NOME,
            'CPF' => $this->CPF,
            'Telefone' => $this->TELEFONE,
            'País' => $this->PAÍS,
            'Estado' => $this->ESTADO,
            'Cidade' => $this->CIDADE,
            'Bairro' => $this->BAIRRO,
            'Criado em' => $this->CREATED_AT,
        ];
    }
}
