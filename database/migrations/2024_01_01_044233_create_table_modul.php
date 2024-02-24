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
        Schema::create('modul', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('kode_mk');
            $table->string('judul');
            $table->longText('materi');
            $table->string('path_file')->default('path');
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
        Schema::dropIfExists('modul');
    }
};
