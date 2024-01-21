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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utusan_id')->constrained('utusans')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->enum('status', ['Hadir', 'Tidak Hadir'])->default('Tidak Hadir');
            $table->enum('info', ['Masuk', 'Keluar'])->default('Keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
