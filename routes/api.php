<?php

use App\Http\Controllers\Api\V1\UsuarioController;
use App\Http\Controllers\Api\V1\InstrutorController;
use App\Http\Controllers\Api\V1\AlunoController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function(){ 

    Route::get('/usuarios', [UsuarioController::class, 'index']);
    Route::get('/usuarios/{usuario}',[UsuarioController::class,'show']);
    Route::post('/usuarios',[UsuarioController::class,'store']);
    Route::put('/usuarios/{usuario}',[UsuarioController::class,'update']);
    Route::delete('/usuarios/{usuario}',[UsuarioController::class,'destroy']);

    Route::get('/instrutores', [InstrutorController::class, 'index']);
    Route::get('/instrutores/{instrutor}',[InstrutorController::class,'show']);    
    Route::post('/instrutores',[InstrutorController::class,'store']);
    Route::put('/instrutores/{instrutor}',[InstrutorController::class,'update']);
    Route::delete('/instrutores/{instrutor}',[InstrutorController::class,'destroy']);

    Route::get('/alunos', [AlunoController::class, 'index']);
    Route::get('/alunos/{aluno}',[AlunoController::class,'show']);    
    Route::post('/alunos',[AlunoController::class,'store']);
    Route::put('/alunos/{aluno}',[AlunoController::class,'update']);
    Route::delete('/alunos/{aluno}',[AlunoController::class,'destroy']);

    

});