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
        Schema::create('evaluasi_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_evaluasi');
            $table->unsignedBigInteger('id_user');
            $table->integer('nilai');
            $table->integer('jawaban_benar');
            $table->timestamps();

            // relasi
            $table->foreign('id_evaluasi')
                ->references('id')
                ->on('evaluasi')
                ->onDelete('cascade');

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluasi_student');
    }
};
