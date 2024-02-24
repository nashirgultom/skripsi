<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\MatakuliahFavoritModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'mks' => MatakuliahFavoritModel::where('id_user', Auth::id())->get()
        ];

        return view('student.kelas.index', $data);
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

        $mks = MataKuliah::where('kode_mk', $id)->get()->first();
        // dd($mks->modul->count());
        // dd($mks);
        $data = [
            'mk' => $mks,
        ];

        return view('student.kelas.show', $data);
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
}
