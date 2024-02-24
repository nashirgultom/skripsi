<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiModel extends Model
{
    use HasFactory;
    protected $table = 'evaluasi';
    protected $guarded = ['id'];

    public function bankSoal()
    {
        return $this->hasMany(BankSoalModel::class, 'id_evaluasi', 'id');
    }

    public function evaluasistudent()
    {
        return $this->hasMany(EvaluasiStudentModel::class, 'id_evaluasi', 'id');
    }

    public function matkul()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }
}
