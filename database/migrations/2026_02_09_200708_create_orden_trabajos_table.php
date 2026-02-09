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
        Schema::create('orden_trabajos', function (Blueprint $table) {
    $table->id();
    $table->string('cliente');
    $table->string('equipo');
    $table->text('problema');
    $table->string('tecnico');
    $table->string('estado')->default('Pendiente');
    $table->text('observaciones')->nullable();
    $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orden_trabajos');
    }
};