<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatakuliahFavoritModel extends Model
{
    use HasFactory;
    protected $table = 'mata_kuliah_favorit';
    protected $guarded = ['id'];


    public function matakuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'kode_mk', 'kode_mk');
    }
}
