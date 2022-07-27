<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\SiswaModel;
use App\Models\TrSiswaKelasModel;
use App\Models\UjianModel;

class JadwalUjianController extends BaseController
{
    public function __construct(){
        $this->ujianModel = new UjianModel();
        $this->guruModel = new GuruModel();
        $this->siswaModel = new SiswaModel();
        $this->trSiswaKelasModel = new TrSiswaKelasModel();
    }
    public function index(){
        $data = $this->ujianModel->get()->getResult();
        return view('admin/jadwal-ujian', compact('data'));
    }
    public function save(){
        try {
            $data = $this->request->getVar();
            $this->ujianModel->insert($data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function update(){
        try {
            $data = $this->request->getVar();
            $this->ujianModel->update($data['id_ujian'], $data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception  $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function delete(){
        try {
            $data = $this->request->getVar();
            $this->ujianModel->delete($data['id_ujian']);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }

    public function index_guru(){
        $data = $this->ujianModel->get()->getResult();
        return view('guru/jadwal-ujian', compact('data'));
    }

    // Role Siswa
    public function index_siswa(){
        $id_siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first()['id_siswa'];
        $id_kelas = $this->trSiswaKelasModel->where(['id_siswa' => $id_siswa, 'id_semester' => getSemesterAktif()['id_semester']])->first()['id_kelas'];
        $data = $this->ujianModel->where('id_kelas', $id_kelas)->get()->getResult();
        return view('siswa/jadwal-ujian', compact('data'));
    }
}
