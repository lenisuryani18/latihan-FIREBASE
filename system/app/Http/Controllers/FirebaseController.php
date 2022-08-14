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
        $this->tabel_dosen = 'dosen';
    }


    function dashboard()
    {
        return view('dashboard');
    }

    // Dosen
    function dosen()
    {
        $data['listDosen'] = $this->database->getReference($this->tabel_dosen)->getValue();
        return view('dosen.index', $data);
    }

    function dosenCreate()
    {
        return view('dosen.create');
    }
    function dosenEdit(Request $request)
    {
        $data['key'] = $key = $request->id;
        $data['dosen'] = $this->database->getReference($this->tabel_dosen)->getChild($key)->getValue();
        return view('dosen.edit', $data);
    }

    function dosenStore(Request $request)
    {
        $postData = [
            'nama' => $request->nama,
            'matakuliah' => $request->matakuliah,
            'bimbingan' => $request->bimbingan,
        ];
        $postRef = $this->database->getReference($this->tabel_dosen)->push($postData);

        if ($postRef) {
            return redirect('dosen')->with('status', 'Data Dosen Berhasil di tambahkan');
        } else {
            return redirect('dosen/tambah')->with('status', 'Data Dosen Gagal di tambahkan');
        }
    }
    function dosenUpdate(Request $request, $id)
    {
        $key = $id;
        $updateData = [
            'nama' => $request->nama,
            'matakuliah' => $request->matakuliah,
            'bimbingan' => $request->bimbingan,
        ];
        $res_updated = $this->database->getReference($this->tabel_dosen . '/' . $key)->update($updateData);

        if ($res_updated) {
            return redirect('dosen')->with('status', 'Data Dosen Berhasil di Edit');
        } else {
            return redirect('dosen/edit')->with('status', 'Data Dosen Gagal di edit');
        }
    }

    // akhir Dosen
}
