<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\MataPelajaranModel;

class JadwalMengajarController extends BaseController
{
    public function __construct(){
        $this->mataPelajaranModel = new MataPelajaranModel();
        $this->guruModel = new GuruModel();
    }
    public function index()
    {
        $data = $this->mataPelajaranModel->get()->getResult();
        return view('admin/jadwal-mengajar', compact('data'));
    }
    public function index_guru(){
        $id_guru = $this->guruModel->where('id_user', session()->get('id_user'))->first()['id_guru'];
        $data = $this->mataPelajaranModel->where('id_guru', $id_guru)->get()->getResult();
        return view('guru/jadwal-mengajar', compact('data'));
    }
}
