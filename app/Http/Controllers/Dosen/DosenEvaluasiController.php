<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\BankSoalModel;
use App\Models\EvaluasiModel;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DosenEvaluasiController extends Controller
{
    protected $mkModel, $evalModel, $soalModel;
    public function __construct()
    {
        $this->mkModel = new MataKuliah();
        $this->evalModel = new EvaluasiModel();
        $this->soalModel = new BankSoalModel();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mks = $this->mkModel->where('id_users', Auth::user()->id)->get();
        // dd($mks);
        $data = [
            'mks' => $mks,
        ];
        return view('dosen.evaluasi.index', $data);
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
        // dd($request->all());

        $mks = $this->mkModel->where('kode_mk', $request->kode_mk)->first();

        try {
            $this->evalModel->create([
                'name' => $request->name,
                'kode_mk' => $request->kode_mk,
                'deskripsi' => $request->deskripsi,
                'durasi' => $request->durasi,
            ]);


            alert()->success('Berhasil !', "Evaluasi baru pada mata kuliah $mks->name berhasil di tambahkan");
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            alert()->error('Gagal !', "Terjadi kesalahan pada server !");
            return redirect()->back();
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $kode_mk)
    {
        //

        $mk = $this->mkModel->where('kode_mk', $kode_mk)->first();
        $eval = $this->evalModel->where('kode_mk', $kode_mk)->get();
        // dd($eval);
        $data = [
            'mk' => $mk,
            'eval' => $eval,
        ];
        return view('dosen.evaluasi.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $eval = $this->evalModel->findOrFail($id);

        // dd($eval);

        return view('dosen.evaluasi.edit', ['eval' => $eval]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        // dd($request->all());

        try {
            $evaluasi = $this->evalModel->find($id);
            $evaluasi->update(
                [
                    'name' => $request->name,
                    'durasi' => $request->durasi,
                    'deskripsi' => $request->deskripsi
                ]
            );

            alert()->success('Berhasil !', 'update data evaluasi berhasil !');
            return redirect()->to(route('dosen.evaluasi.show', $request->kode_mk));
        } catch (\Throwable $th) {
            //throw $th;
            alert()->error('Gagal !', "Terjadi kesalahan pada server !");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $evaluasi = $this->evalModel->find($id);
        if ($evaluasi) {
            $evaluasi->delete();
            alert()->success('Berhasil!', 'berhasil hapus data evaluasi!');
        } else {
            alert()->error('Gagal!', 'Data evaluasi tidak ditemukan.');
        }
        return redirect()->back();
    }


    // =================================== MODUL AREA ===================================



    public function createModul($id)
    {
        $data = [
            'id' => $id,
            'soals' => $this->soalModel->where('id_evaluasi', $id)->get(),
        ];
        return view('dosen.evaluasi.add_soal', $data);
    }

    public function storeModul(Request $request)
    {
        $cek = $request->opsi_c === $request->kunci;
        // dd($cek);
        // dd($request->all());

        try {
            $this->soalModel->create([
                'id_evaluasi' => $request->id_evaluasi,
                'soal' => $request->soal,
                'opsi_a' => $request->opsi_a,
                'opsi_b' => $request->opsi_b,
                'opsi_c' => $request->opsi_c,
                'opsi_d' => $request->opsi_d,
                'opsi_e' => $request->opsi_e,
                'kunci' => $request->kunci,
            ]);


            alert()->success('Berhasil !', 'berhasil menambahkan soal baru !');
            return redirect()->back();
        } catch (\Throwable $th) {
            throw $th;
            alert()->error('Gagal !', 'terjadi kesalahan pada server !');
            return redirect()->back();
        }
    }

    public function editModul(string $id)
    {
        $soal = $this->soalModel->find($id);

        return view('dosen.evaluasi.edit_soal', ['s' => $soal]);
    }

    public function updateModul(Request $request, string $id)
    {
        // dd($request->all());

        $soal = $this->soalModel->find($id);

        $id_evaluasi = $soal->id_evaluasi;


        try {
            $soal->update(
                [
                    'soal' => $request->soal,
                    'opsi_a' => $request->opsi_a,
                    'opsi_b' => $request->opsi_b,
                    'opsi_c' => $request->opsi_c,
                    'opsi_d' => $request->opsi_d,
                    'opsi_e' => $request->opsi_e,
                    'kunci' => $request->kunci,
                ]
            );

            alert()->success('Berhasil !', 'berhasil update data soal !');
            return redirect()->to(route('dosen.evaluasi.create-modul', $id_evaluasi));
        } catch (\Throwable $th) {
            // throw $th;
            alert()->error('Gagal !', 'terjadi kesalahan pada server !');
            return redirect()->to(route('dosen.evaluasi.create-modul', $id_evaluasi));
        }
    }

    public function destroyModul(Request $request, string $id)
    {
        $soal = $this->soalModel->find($id);
        if ($soal) {
            $soal->delete();
            alert()->success('Berhasil!', 'berhasil hapus data soal!');
        } else {
            alert()->error('Gagal!', 'Data soal tidak ditemukan.');
        }
        return redirect()->back();
    }


    // micro service ajax :
    public function publish(Request $request, $id)
    {
        try {
            $evaluasi = $this->evalModel->find($id);
            $evaluasi->status = $request->status;
            $evaluasi->save();

            if ($request->status == 1) {
                return response()->json('berhasil mempublikasi evaluasi', 200);
            }
            return response()->json('berhasil menarik evaluasi ke draft', 200);
        } catch (\Throwable $th) {
            //throw $th;
            alert()->error('Gagal !', "Terjadi kesalahan pada server !");
            return redirect()->back();
        }
    }
}
