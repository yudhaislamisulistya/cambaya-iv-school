<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\TrSiswaKelasModel;

class JadwalMataPelajaranController extends BaseController
{
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
        $this->guruModel = new GuruModel();
        $this->siswaModel = new SiswaModel();
        $this->trSiswaKelasModel = new TrSiswaKelasModel();
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
    public function detail_siswa($id_kelas, $id_semester){
        return view('guru/detail-jadwal-mata-pelajaran', compact('id_kelas', 'id_semester'));
    }

    // Role Siswa
    public function index_siswa(){
        $id_siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first()['id_siswa'];
        $data = $this->trSiswaKelasModel->where('id_siswa', $id_siswa)->get()->getResult();
        return view('siswa/jadwal-mata-pelajaran', compact('data'));
    }
}
