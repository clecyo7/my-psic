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
        Schema::create('convenios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('registro_ans')->nullable();
            $table->string('cidade')->nullable();
            $table->integer('uf')->nullable();
            $table->integer('dias_retorno')->nullable();
            $table->integer('limite_diario')->nullable();
            $table->timestamps();
        });

        Schema::create('convenios_profissionais', function (Blueprint $table) {
            $table->id();
            // $table->integer('id_convenio')->unsigned();
            // $table->foreign('id_convenio')->references('convenios')->on('id');
            // $table->integer('id_profissionais')->unsigned();
            // $table->foreign('id_profissionais')->references('users')->on('id');

            $table->foreignId('convenio_id')->constrained('convenios')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('convenios');
    }
};
