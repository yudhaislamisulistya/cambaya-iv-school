<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataPelajaranModel;
use App\Models\SiswaModel;
use App\Models\TrNilaiKeterampilanKelasModel;
use App\Models\TrNilaiKeterampilanSiswaKelasModel;
use App\Models\TrSiswaKelasModel;

class NilaiKeterampilanController extends BaseController
{
    public function __construct()
    {
        $this->mataPelajaranModel = new MataPelajaranModel();
        $this->siswaModel = new SiswaModel();
        $this->TrsiswaKelasModel = new TrSiswaKelasModel();
        $this->TrnilaiKeterampilanKelasModel = new TrNilaiKeterampilanKelasModel();
        $this->TrnilaiKeterampilanSiswaKelasModel = new TrNilaiKeterampilanSiswaKelasModel();
    }
    public function index()
    {
        $data = $this->mataPelajaranModel->get()->getResult();
        return view('guru/nilai-keterampilan', compact('data'));
    }

    public function detail($id_mata_pelajaran, $id_kelas, $id_semester){
        $data = $this->TrsiswaKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
        return view('guru/detail-nilai-keterampilan', compact('data', 'id_mata_pelajaran','id_kelas', 'id_semester'));
    }
    
    public function add(){
        try {
            $data = $this->request->getVar();
            $data['kode_nilai_keterampilan'] = random_string('alnum', 20);
            $this->TrnilaiKeterampilanKelasModel->insert($data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    
    public function update(){
        try {
            $kode_nilai_keterampilan_siswa_kelas = random_string('alnum', 20);
            $data = $this->request->getVar();
            for ($i=0; $i < count($data['nilai_keterampilan']); $i++) { 
                for ($j=0; $j < (int)$data['jumlah_nilai_keterampilan']; $j++) {
                    $this->TrnilaiKeterampilanSiswaKelasModel->where(['id_siswa' => $data['id_siswa'][$i], 'kode_nilai_keterampilan' => $data['kode_nilai_keterampilan'][$i][$j]])->delete();
                    $this->TrnilaiKeterampilanSiswaKelasModel->replace([
                        'kode_nilai_keterampilan_siswa_kelas' => $kode_nilai_keterampilan_siswa_kelas,
                        'id_siswa' => $data['id_siswa'][$i],
                        'kode_nilai_keterampilan' => $data['kode_nilai_keterampilan'][$i][$j],
                        "nilai_keterampilan" => $data['nilai_keterampilan'][$i][$j],
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

    // Role Siswa
    public function index_siswa(){
        $id_siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first()['id_siswa'];
        $id_kelas = $this->TrsiswaKelasModel->where(['id_siswa' => $id_siswa, 'id_semester' => getSemesterAktif()['id_semester']])->first()['id_kelas'];
        $data = $this->mataPelajaranModel->where('id_kelas', $id_kelas)->get()->getResult();
        return view('siswa/nilai-keterampilan', compact('data'));
    }

    public function detail_siswa($id_mata_pelajaran, $id_kelas, $id_semester){
        $id_siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first()['id_siswa'];
        $data = $this->TrsiswaKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester, 'id_siswa' => $id_siswa])->get()->getResult();
        return view('siswa/detail-nilai-keterampilan', compact('data', 'id_mata_pelajaran','id_kelas', 'id_semester'));
    }
}
