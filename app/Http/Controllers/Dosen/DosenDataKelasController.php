<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\Hari;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\Facades\Alert;

class DosenDataKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $mkModel;

    public function __construct()
    {
        $this->mkModel = new MataKuliah();
    }

    public function index()
    {
        //

        $data = [
            'kodemk' => Matakuliah::generateKodeMk(),
            'hari' => Hari::all(),
            'mks' => MataKuliah::where('id_users', Auth::id())->get(),
        ];

        // dd($data['kodemk']);


        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dosen.data_kelas.index', $data);
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
            'id_users' => $request->id_dosen,
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
        try {

            $mk = $this->mkModel->findOrFail($id);


            $mk->update(
                [
                    'name' => $request->name,
                ],
            );

            alert()->success('Berhasil !', 'update data kelas berhasil !');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            alert()->error('Error', 'terjadi kesalahan pada server !');
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
            $mk = $this->mkModel->find($id);
            // dd($mk);
            $mk->delete();

            alert()->success('Berhasil !', 'delete data kelas berhasil !');
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            alert()->error('Gagal !', 'Terjadi kesalahan saat menghapus data. !');
            return redirect()->back();
        }
    }
}
