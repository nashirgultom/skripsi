<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankSoalModel extends Model
{
    use HasFactory;
    protected $table = 'bank_soal';
    protected $guarded = ['id'];


    // public function satuKelas()
    // {
    //     return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    // }
    public function evaluasi()
    {
        return $this->BelongsTo(EvaluasiModel::class, 'id_evaluasi', 'id');
    }
}
