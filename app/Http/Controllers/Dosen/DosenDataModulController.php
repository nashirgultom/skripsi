<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\ModulModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use DOMDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DosenDataModulController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $modulModel, $mkModel;

    public function __construct()
    {
        $this->modulModel = new ModulModel();
        $this->mkModel = new MataKuliah();
    }

    public function index()
    {
        //


        // Query untuk mendapatkan mata kuliah (mk) bersama dengan banyakKelas dan haveModul
        $mkl = $this->mkModel
            ->where('id_users', Auth::user()->id)->get();


        // $mkl = $this->mkModel
        //     ->where('id_users', 3)
        //     ->with(['banyakKelas'])
        //     ->get();


        // Data untuk view
        $data = [
            'moduls' => $this->modulModel->all(), // Semua modul
            'mkl' => $mkl, // Menggunakan hasil query $mks yang sudah ada
        ];

        // dd($mkl);

        return view('dosen.data_modul.index', $data);
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
        $request->validate([
            'judul' => 'required',
            'materi' => 'required',
        ]);

        $dom = new DOMDocument();
        $dom->loadHTML($request->materi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images  = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/modul/" . time() . $key . '.png';
            file_put_contents(public_path() . $image_name, $data);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        // dd($image_name);
        $deskripsi = $dom->saveHTML();


        try {
            $this->modulModel->create([
                'judul' => $request->judul,
                'materi' => $deskripsi,
                'kode_mk' => $request->kode_mk
            ]);

            alert()->success('Berhasil !', 'berhasil menambahkan data modul baru !');
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            alert()->error('Gagal !', 'terjadi kesalahan pada server !');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $mks = $this->mkModel->where('kode_mk', $id)->first();
        // dd($mks);
        $modul = $this->modulModel->where('kode_mk', $mks->kode_mk)->get();

        // dd($modul);

        $data = [
            'mks' => $mks,
            'moduls' => $modul,
        ];

        // dd($data['moduls']);

        return view('dosen.data_modul.add_modul', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $findModul = $this->modulModel->find($id);
        // dd($findModul);
        $data = [
            'modul' => $findModul
        ];

        return view('dosen.data_modul.edit_modul', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'materi' => 'required',
        ]);

        $dom = new DOMDocument();
        @$dom->loadHTML($request->materi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');

            // Cek apakah gambar sudah di-host (tidak base64)
            if (preg_match('/data:image/', $src)) {
                // Dapatkan base64 data
                $data = base64_decode(explode(',', explode(';', $src)[1])[1]);
                $image_name = "/upload/modul/" . time() . $key . '.png';
                file_put_contents(public_path() . $image_name, $data);

                // Update src attribute
                $img->removeAttribute('src');
                $img->setAttribute('src', $image_name);
            }
        }

        $deskripsi = $dom->saveHTML();

        try {
            $modul = $this->modulModel->find($id);
            $modul->update([
                'judul' => $request->judul,
                'materi' => $deskripsi,
                'kode_mk' => $request->kode_mk
            ]);

            alert()->success('Berhasil !', 'berhasil memperbarui data modul !');
            return redirect()->to(route('dosen.modul.show', $request->kode_mk));
        } catch (\Throwable $th) {
            // handle exception
            alert()->error('Gagal !', 'terjadi kesalahan pada server !');
            return redirect()->to(route('dosen.modul.show', $request->kode_mk));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function upload(Request $request): JsonResponse
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/' . $fileName);

            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }

    public function editModul($id)
    {
    }

    public function preview($kode_mk)
    {

        $modul = $this->modulModel->where('kode_mk', $kode_mk)->get();

        // dd($modul);
        $data = [
            'modul' => $modul,
        ];

        return view('dosen.data_modul.preview', $data);
    }
}
