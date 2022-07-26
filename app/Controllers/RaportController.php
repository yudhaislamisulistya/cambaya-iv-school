<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\TrSiswaKelasModel;

class RaportController extends BaseController
{
    public function __construct(){
        $this->kelasModel = new KelasModel();
        $this->TrsiswaKelasModel = new TrSiswaKelasModel();
    }
    public function index(){
        $id_guru = getGuruByIdUser(session()->get('id_user'))['id_guru'];
        $data = $this->kelasModel->where('id_guru', $id_guru)->get()->getResult();
        return view('guru/raport', compact('data'));
    }
    public function daftar_siswa($id_kelas, $id_semester){
        $data = $this->TrsiswaKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
        return view('guru/raport-daftar-siswa', compact('data', 'id_kelas', 'id_semester'));
    }
    public function kompetensi_keahlian($id_siswa_kelas){
        $data = $this->TrsiswaKelasModel->where('id_siswa_kelas', $id_siswa_kelas)->first();
        $id_kelas = $data['id_kelas'];
        $id_semester = $data['id_semester'];
        return view('guru/raport-kompetensi-keahlian', compact('data', 'id_kelas', 'id_semester'));
    }
    public function kompetensi_keahlian_save(){
        try {
            $data = $this->request->getVar();
            $this->TrsiswaKelasModel->update($data['id_siswa_kelas'], [
                'sikap_spiritual' => $data['sikap_spiritual'],
                'sikap_sosial' => $data['sikap_sosial']
            ]);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
}
