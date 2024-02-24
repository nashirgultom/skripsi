<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\EvaluasiModel;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class CetakController extends Controller
{
    //
    public function cetakNilaiModul(string $id)
    {
        // dd($id);

        $data = [
            'mk' => MataKuliah::where('kode_mk', $id)->first(),
            'evals' => EvaluasiModel::where('kode_mk', $id)->get(),
        ];

        // dd($data);


        return view('dosen.cetak.cetak_nilai_modul', $data);
    }
}
