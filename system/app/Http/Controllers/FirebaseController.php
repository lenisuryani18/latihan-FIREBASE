<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;


class FirebaseController extends Controller
{


    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->nama_tabel = 'dosen';
    }


    function dashboard()
    {
        return view('dashboard');
    }

    // Dosen
    function dosen()
    {
        $data['listDosen'] = $this->database->getReference($this->nama_tabel)->getValue();
        return view('dosen.index', $data);
    }

    function dosenCreate()
    {
        return view('dosen.create');
    }

    function dosenStore(Request $request)
    {
        $postData = [
            'nama' => $request->nama,
            'matakuliah' => $request->matakuliah,
            'bimbingan' => $request->bimbingan,
        ];
        $postRef = $this->database->getReference($this->nama_tabel)->push($postData);

        if ($postRef) {
            return redirect('dosen')->with('status', 'Data Dosen Berhasil di tambahkan');
        } else {
            return redirect('dosen/tambah')->with('status', 'Data Dosen Gagal di tambahkan');
        }
    }

    // akhir Dosen
}
