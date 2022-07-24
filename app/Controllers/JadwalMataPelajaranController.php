<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\KelasModel;

class JadwalMataPelajaranController extends BaseController
{
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->guruModel = new GuruModel();
    }
    public function index()
    {
        $data = $this->kelasModel->get()->getResult();
        return view('admin/jadwal-mata-pelajaran', compact('data'));
    }
    public function index_guru(){
        $id_guru = $this->guruModel->where('id_user', session()->get('id_user'))->first()['id_guru'];
        $data = $this->kelasModel->where('id_guru', $id_guru)->get()->getResult();
        return view('guru/jadwal-mata-pelajaran', compact('data'));
    }
    public function detail($id_kelas, $id_semester){
        return view('admin/detail-jadwal-mata-pelajaran', compact('id_kelas', 'id_semester'));
    }
}
