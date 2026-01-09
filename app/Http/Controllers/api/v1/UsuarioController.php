<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Resources\v1\UsuarioResource;
use Illuminate\Support\Facades\Validator;


class UsuarioController extends Controller
{

    

    public function index()
    {
        return UsuarioResource::collection(Usuario::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'EMAIL' => 'required',
            'SENHA' => 'required',
            'TIPO' => 'required|boolean',
        ]);

        
        if ($validator->fails()){
            return response()->json(401);
        }

        $created = Usuario::create($validator->validated());

        if ($created){
            return response()->json($created, 200);
        }

        return response()->json($validator->errors(), 400);
    }

    public function show(Usuario $usuario)
    {
        return new UsuarioResource($usuario);
       
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [

            'EMAIL' => 'required',
            'SENHA' => 'required',
            'TIPO' => 'required|boolean',
        ]);

        
        if ($validator->fails()){
            return response()->json(401);
        }

        $validated = $validator->validated();

        $updated = Usuario::findOrFail($id)->update([
            'EMAIL' => $validated['EMAIL'],
            'SENHA' => $validated['SENHA'],
            'TIPO' => $validated['TIPO'],
        ]);


        if($updated){
            return response()->json('Usuário atualizado', 200);
        }

        return response()->json($validator->errors(), 400);

    }


    public function destroy(Usuario $usuario)
    {
        $deleted = $usuario->delete();

        if($deleted){
            return response()->json("Usuário deletado", 200);
        }

        return response()->json("Usuário não deletado", 400);

    }
}
