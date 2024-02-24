<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenBankSoalController extends Controller
{
    protected $mkModel;
    public function __construct()
    {
        $this->mkModel = new MataKuliah();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $mks = $this->mkModel->where('id_users', Auth::user()->id)->get();
        // dd($mks);
        $data = [
            'mks' => $mks,
        ];
        return view('dosen.bank_soal.index', $data);
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

        $mk = $this->mkModel->where('kode_mk', $id)->get();

        $data = [
            'mk' => $mk,
        ];
        return view('dosen.bank_soal.show', $data);
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
