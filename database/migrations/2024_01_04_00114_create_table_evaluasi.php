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
        Schema::create('evaluasi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kode_mk');
            $table->string('deskripsi');
            $table->enum('status', [1, 0])->default(0);
            $table->integer('durasi');
            $table->timestamps();

            // foreign key
            $table->foreign('kode_mk')
                ->references('kode_mk')
                ->on('mata_kuliah')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi');
    }
};
