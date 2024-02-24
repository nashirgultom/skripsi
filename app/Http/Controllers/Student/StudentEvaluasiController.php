<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\BankSoalModel;
use App\Models\EvaluasiModel;
use App\Models\EvaluasiStudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentEvaluasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id = null)
    {

        $cekNilai = EvaluasiStudentModel::where('id_user', Auth::user()->id)->where('id_evaluasi', $id)->get();
        // dd(empty($cekNilai));
        if ($cekNilai->count()  == 0) {
            // pengecekan apakah ada id yang dikirimkan 
            if ($id != null) {
                $evaluasi = EvaluasiModel::find($id);
                $soal = $evaluasi->bankSoal;
                $soalArray = $soal->all();

                // implementasi algoritma fisher yates start
                for ($i = count($soalArray) - 1; $i > 0; $i--) {
                    $j = rand(0, $i);
                    $temp = $soalArray[$i];
                    $soalArray[$i] = $soalArray[$j];
                    $soalArray[$j] = $temp;
                }
                // implementasi algoritma fisher yates end

                $data = [
                    'eval' => $evaluasi,
                    'soal' => $soalArray,
                ];
                // dd($data['soal']);

                return view('student.evaluasi.index', $data);
            } else {

                // $evaluasi = EvaluasiModel::where()

                $data = [
                    'evals' => ''
                ];

                return "id evaluasi null";
            }
        } else {
            alert()->error('Maaf !', 'Anda sudah mengerjakan evaluasi ini sebelumnya. anda tidak dapat mengerjakan evaluasi lebih dari satu kali');
            return redirect()->back();
        }
    }

    public function koreksiJawaban(Request $request)
    {
        $id_evaluasi = $request->input('id_evaluasi');
        $jawabanUser = $request->input('jawaban'); // Tangkap jawaban dari request

        $skor = 0;
        $totalSoal = BankSoalModel::count(); // Dapatkan jumlah total soal

        // Periksa setiap jawaban terhadap soal yang sesuai
        foreach (BankSoalModel::all() as $soal) {
            // dd($soal->id, $soal->kunci, $jawabanUser[$soal->id]); // debuging isi jawaban  user 
            if (isset($jawabanUser[$soal->id]) && $soal->kunci == $jawabanUser[$soal->id]) {
                $skor++; // Tambahkan skor jika jawaban benar
            }
        }

        // Hitung persentase skor
        $persentaseSkor = ($totalSoal > 0) ? ($skor / $totalSoal) * 100 : 0;

        // return "oke";

        try {
            EvaluasiStudentModel::create([
                'id_evaluasi' => $id_evaluasi,
                'id_user' => Auth::user()->id,
                'nilai' => $persentaseSkor,
                'jawaban_benar' => $skor,
            ]);

            alert()->success('Selamat !', 'anda telah berhasil mengerjakan evaluasi ini !');
            // return "simpan";
            return redirect()->to(route('student.evaluasi.create'));
        } catch (\Throwable $th) {
            //throw $th;
            return "gagal";

            alert()->error('Gagal !', 'Terjadi kesalahan saat menyimpan ke database. !');
            return redirect()->back();
        }

        // Kirim feedback ke view, contoh: tampilkan skor
        // return "nilai : $persentaseSkor, total soal : $totalSoal";
    }


    public function sambutan()
    {

        // return view('student.evaluasi.sambutan');
        return "joss";
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('student.evaluasi.sambutan');
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
