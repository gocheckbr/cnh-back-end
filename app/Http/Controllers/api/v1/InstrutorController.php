<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Instrutore;
use Illuminate\Http\Request;
use App\Http\Resources\v1\PessoaResource;
use Illuminate\Support\Facades\Validator;


class InstrutorController extends Controller
{


    public function index()
    {
        return PessoaResource::collection(Instrutore::all());
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

        $created = Instrutore::create($validator->validated());

        if ($created){
            return response()->json($created, 200);
        }

        return response()->json($validator->errors(), 400);
    }


    public function show(Instrutore $instrutor)
    {
        return new PessoaResource($instrutor);
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

        $updated = Instrutore::findOrFail($id)->update([
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
            return response()->json('Instrutor atualizado', 200);
        }

        return response()->json($validator->errors(), 400);

    }


    public function destroy(Instrutore $instrutor)
    {
        $deleted = $instrutor->delete();

        if($deleted){
            return response()->json("Instrutor deletado", 200);
        }

        return response()->json("Instrutor não deletado", 400);

    }
}
