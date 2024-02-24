<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\EvaluasiModel;
use App\Models\EvaluasiStudentModel;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenDataNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $data = [
            'mks' => MataKuliah::where('id_users', Auth::id())->get()
        ];


        // dd($data['nilais']);

        return view('dosen.data_nilai.index', $data);

        // return "JOSS";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //


        $data = [
            'mk' => MataKuliah::where('kode_mk', $id)->first(),
            'evals' => EvaluasiModel::where('kode_mk', $id)->get(),
        ];

        // dd($data['mk']);
        return view('dosen.data_nilai.show', $data);
    }




    public function showNilai(string $id)
    {
        $data = [
            'nilais' => EvaluasiStudentModel::where('id_evaluasi', $id)->get()
        ];

        return view('dosen.data_nilai.show_nilai', $data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function cetak()
    {
        dd("data");
    }
}
