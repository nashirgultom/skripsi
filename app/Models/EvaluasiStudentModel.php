<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiStudentModel extends Model
{
    use HasFactory;
    protected $table = 'evaluasi_student';
    protected $guarded = ['id'];

    public function evaluasi()
    {
        return $this->BelongsTo(EvaluasiModel::class, 'id_evaluasi', 'id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
