<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDataDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        $data = [
            'dosen' => User::where('role', 2)->get()
        ];

        // dd($data['dosen']);
        return view('admin.dosen.index', $data);
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
        // Aturan validasi
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];

        // Pesan kustom untuk validasi
        $messages = [
            'email.unique' => 'Email ini sudah terdaftar!',
            'username.unique' => 'Username ini sudah terdaftar!',
        ];

        // Melakukan validasi
        $validatedData = $request->validate($rules, $messages);

        try {
            // Membuat user baru
            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role = 2;
            $user->password = bcrypt($request->password);
            $user->save();


            alert()->success('Berhasil !', 'berhasil menyimpan data dosen baru');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            alert()->error('Gagal !', 'Terjadi kesalahan pada server !');
            return redirect()->back()->withInput();
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
        // Aturan validasi


        try {
            // Membuat user baru
            $user = User::findOrFail($id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role = 2;
            $user->password = bcrypt($request->password);
            $user->save();


            alert()->success('Berhasil !', 'berhasil update data dosen baru');
            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            alert()->error('Gagal !', 'Terjadi kesalahan pada server !');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        try {
            $user = User::find($id);
            // dd($user);
            $user->delete();

            alert()->success('Berhasil !', 'delete data kelas berhasil !');
            return redirect()->back();
        } catch (\Throwable $th) {
            // throw $th;
            alert()->error('Gagal !', 'Terjadi kesalahan saat menghapus data. !');
            return redirect()->back();
        }
    }
}
