<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instrutores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id')->nullable();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->constrained()->onDelete('cascade');
            $table->string('NOME');
            $table->string('CPF')->unique();
            $table->string('TELEFONE');
            $table->string('FOTO')->nullable();
            $table->string('PAÍS');
            $table->string('ESTADO');
            $table->string('CIDADE');
            $table->string('BAIRRO');
            $table->timestamp('CREATED_AT')->useCurrent();
            $table->timestamp('UPDATED_AT')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instrutores');
        
    }
};
