<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mata_kuliah';

    protected $guarded = ['id'];


    public static function generateKodeMk()
    {
        $latestKodeMk = DB::table('mata_kuliah')->max('kode_mk');

        if (!$latestKodeMk) {
            return 'TI-001';
        }

        $lastNumber = (int)substr($latestKodeMk, 3);
        $newNumber = $lastNumber + 1;
        $newKodeMk = 'TI-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return $newKodeMk;
    }

    // public function banyakKelas()
    // {
    //     return $this->hasMany(ModulModel::class, 'kode_mk', 'kode_mk');
    // }
    // public function banyakSoal()
    // {
    //     return $this->hasMany(BankSoalModel::class, 'kode_mk', 'kode_mk');
    // }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'id_users', 'id');
    }

    public function modul()
    {
        return $this->hasMany(ModulModel::class, 'kode_mk', 'kode_mk');
    }

    public function evaluasi()
    {
        return $this->hasMany(EvaluasiModel::class, 'kode_mk', 'kode_mk');
    }
    public function favorit()
    {
        return $this->hasMany(MatakuliahFavoritModel::class, 'kode_mk', 'kode_mk');
    }
}
