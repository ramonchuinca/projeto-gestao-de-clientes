<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('email')->unique();
        $table->string('telefone')->nullable();
        $table->string('cpf')->unique();
        $table->boolean('status')->default(true);
        $table->timestamps();
        $table->softDeletes(); // delete lógico
    });
}

};
