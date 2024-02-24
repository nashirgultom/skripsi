<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hari;
use App\Models\MataKuliah;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMasterKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'kodemk' => MataKuliah::generateKodeMk(),
            'dosen' => User::where('role', 2)->get(),
            'hari' => Hari::all(),
            'mks' => MataKuliah::all()
        ];

        return view('admin.kelas.index', $data);
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
        $data = [
            'kode_mk' => $request->kode,
            'name' => ucwords($request->name),
            'id_users' => $request->dosen,
        ];

        try {
            MataKuliah::create($data);

            alert()->success('Berhasil !', 'berhasil menambahkan data kelas !');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            alert()->error('Error', 'gagal menambahkan data kelas !');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $data = [
            'kode_mk' => $request->kode,
            'name' => ucwords($request->name),
            'id_users' => $request->dosen,
        ];

        try {
            $mk = MataKuliah::findOrFail($id);
            $mk->update($data);

            alert()->success('Berhasil !', 'berhasil menambahkan data kelas !');
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            alert()->error('Error', 'gagal menambahkan data kelas !');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $mk = MataKuliah::findOrFail($id);
            $mk->delete($id);

            alert()->success('Berhasil !', 'berhasil menghapus data kelas !');
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            alert()->error('Error', 'gagal menambahkan data kelas !');
            return redirect()->back();
        }
    }
}
