<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OprecController extends Controller
{
    // HALAMAN FORM
    public function index()
    {
        return view('user.oprec');
    }

    // PROSES SUBMIT
    public function submit(Request $request)
    {
        $request->validate([
            'nama'   => 'required',
            'npm'    => 'required',
            'kelas'  => 'required',
            'jurusan'=> 'required',
            'region' => 'required',
            'posisi' => 'required',
            'email'  => 'required|email',
            'sosmed' => 'required|url',
            'berkas' => 'required|mimes:zip,rar|max:5120'
        ]);

        return back()->with('success', 'Pendaftaran berhasil dikirim!');
    }
}
