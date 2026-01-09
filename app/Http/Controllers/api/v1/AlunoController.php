<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Http\Resources\v1\PessoaResource;
use Illuminate\Support\Facades\Validator;

class AlunoController extends Controller
{
    public function index()
    {
        return PessoaResource::collection(Aluno::all());
    }

    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [

            'usuario_id' => 'nullable',
            'NOME' => 'required',
            'CPF' => 'required',
            'TELEFONE' => 'required',
            'FOTO' => 'nullable',
            'PAÍS' => 'required',
            'ESTADO' => 'required',
            'CIDADE' => 'required',
            'BAIRRO' => 'required'
        ]);

        
        if ($validator->fails()){
            return response()->json(401);
        }

        $created = Aluno::create($validator->validated());

        if ($created){
            return response()->json($created, 200);
        }

        return response()->json($validator->errors(), 400);
    }


    public function show(Aluno $aluno)
    {
        return new PessoaResource($aluno);
    }



    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [

            'NOME' => 'required',
            'CPF' => 'required',
            'TELEFONE' => 'required',
            'FOTO' => 'nullable',
            'PAÍS' => 'required',
            'ESTADO' => 'required',
            'CIDADE' => 'required',
            'BAIRRO' => 'required'
        ]);

        
        if ($validator->fails()){
            return response()->json(401);
        }

        $validated = $validator->validated();

        $updated = Aluno::findOrFail($id)->update([
            'NOME' => $validated['NOME'],
            'CPF' => $validated['CPF'],
            'TELEFONE' => $validated['TELEFONE'],
            'FOTO' => $validated['FOTO'],
            'PAÍS' => $validated['PAÍS'],
            'ESTADO' => $validated['ESTADO'],
            'CIDADE' => $validated['CIDADE'],
            'BAIRRO' => $validated['BAIRRO']
        ]);


        if($updated){
            return response()->json('Usuário atualizado', 200);
        }

        return response()->json($validator->errors(), 400);

    }


    public function destroy(Aluno $aluno)
    {
        $deleted = $aluno->delete();

        if($deleted){
            return response()->json("Usuário deletado", 200);
        }

        return response()->json("Usuário não deletado", 400);

    }
}