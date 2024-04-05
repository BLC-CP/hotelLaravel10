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
        Schema::create('klientes', function (Blueprint $table) {
            $table->id();
            $table->string('nrn_kliente');
            $table->string('hela_fatin');
            $table->foreignId('id_aldeia');
            $table->foreignId('id_kuartu');
            $table->string('data_checking');
            $table->string('data_checkout');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klientes');
    }
};
