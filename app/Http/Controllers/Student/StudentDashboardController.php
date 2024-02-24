<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\EvaluasiStudentModel;
use App\Models\MataKuliah;
use App\Models\MatakuliahFavoritModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!is_null($keyword)) {
            $mks = MataKuliah::where('name', 'like', '%' . $keyword . '%')->get();
        } else {
            $mks = MataKuliah::all();
        }

        $data = [
            'moduls' => MataKuliah::all(),
            'mks' => $mks,
            'favorit' => MatakuliahFavoritModel::all(),
            'evaluasi' => EvaluasiStudentModel::where('id_user', Auth::id())->get()
        ];
        // dd($data['moduls']);

        return view('student.dashboard.index', $data);
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
        // update or create data kelas favorit
        $kodeMk = $request->id; // Atau $request->kode_mk, tergantung pada apa yang Anda kirim dari frontend
        $idUser = Auth::id();

        //  cek apakah sudah ada di daftar favorit user 
        $favorit = MatakuliahFavoritModel::where('kode_mk', $kodeMk)
            ->where('id_user', $idUser)
            ->first();

        //  tindakan jika sudah ada di daftar favorit 
        if ($favorit) {
            // Jika sudah ada, hapus entri tersebut
            MatakuliahFavoritModel::where('kode_mk', $kodeMk)
                ->where('id_user', $idUser)
                ->delete();

            return response()->json(['status' => 'dihapus']);
        } else {
            // Jika belum ada, tambahkan sebagai favorit
            MatakuliahFavoritModel::insert([
                'kode_mk' => $kodeMk,
                'id_user' => $idUser,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return response()->json(['status' => 'ditambahkan']);
        }

        dd($kodeMk, $idUser);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
