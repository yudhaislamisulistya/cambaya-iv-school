<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataPelajaranModel;
use App\Models\TrNilaiPengetahuanKelasModel;
use App\Models\TrNilaiPengetahuanSiswaKelasModel;
use App\Models\TrSiswaKelasModel;

class NilaiPengetahuanController extends BaseController
{
    public function __construct()
    {
        $this->mataPelajaranModel = new MataPelajaranModel();
        $this->TrsiswaKelasModel = new TrSiswaKelasModel();
        $this->TrnilaiPengetahuanKelasModel = new TrNilaiPengetahuanKelasModel();
        $this->TrnilaiPengetahuanSiswaKelasModel = new TrNilaiPengetahuanSiswaKelasModel();
    }
    public function index()
    {
        $data = $this->mataPelajaranModel->get()->getResult();
        return view('guru/nilai-pengetahuan', compact('data'));
    }

    public function detail($id_kelas, $id_semester){
        $data = $this->TrsiswaKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
        // $kode_nilai_pengetahuan = $this->TrnilaiPengetahuanKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester])->first()['kode_nilai_pengetahuan'];
        return view('guru/detail-nilai-pengetahuan', compact('data', 'id_kelas', 'id_semester'));
    }
    
    public function add(){
        try {
            $data = $this->request->getVar();
            $data['kode_nilai_pengetahuan'] = random_string('alnum', 20);
            $this->TrnilaiPengetahuanKelasModel->insert($data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    
    public function update(){
        try {
            $kode_nilai_pengetahuan_siswa_kelas = random_string('alnum', 20);
            $data = $this->request->getVar();
            for ($i=0; $i < count($data['nilai']); $i++) { 
                for ($j=0; $j < (int)$data['jumlah_nilai_pengetahuan']; $j++) {
                    $this->TrnilaiPengetahuanSiswaKelasModel->where(['id_siswa' => $data['id_siswa'][$i], 'kode_nilai_pengetahuan' => $data['kode_nilai_pengetahuan'][$i][$j]])->delete();
                    $this->TrnilaiPengetahuanSiswaKelasModel->replace([
                        'kode_nilai_pengetahuan_siswa_kelas' => $kode_nilai_pengetahuan_siswa_kelas,
                        'id_siswa' => $data['id_siswa'][$i],
                        'kode_nilai_pengetahuan' => $data['kode_nilai_pengetahuan'][$i][$j],
                        "nilai" => $data['nilai'][$i][$j],
                    ]);
                }
            }
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
}
