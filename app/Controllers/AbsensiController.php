<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use App\Models\TrAbsensiKelas;
use App\Models\TrAbsensiKelasModel;
use App\Models\TrAbsensiSiswaKelasModel;
use App\Models\TrSiswaKelasModel;

class AbsensiController extends BaseController
{
    public function __construct(){
        $this->kelasModel = new KelasModel();
        $this->mataPelajaranModel = new MataPelajaranModel();
        $this->TrabsensiKelasModel = new TrAbsensiKelasModel();
        $this->TrsiswaKelasModel = new TrSiswaKelasModel();
        $this->TrabsensiSiswaKelasModel = new TrAbsensiSiswaKelasModel();
    }
    public function index()
    {
        $data = $this->mataPelajaranModel->get()->getResult();
        return view('admin/absensi', compact('data'));
    }
    public function detail($id_mata_pelajaran, $id_kelas, $id_semester){
        $data = $this->TrsiswaKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
        return view('admin/detail-absensi', compact('data', 'id_mata_pelajaran', 'id_kelas', 'id_semester'));
    }
    public function guru_index(){
        $data = $this->mataPelajaranModel->get()->getResult();
        return view('guru/absensi', compact('data'));
    }
    public function guru_detail($id_mata_pelajaran, $id_kelas, $id_semester){
        $data = $this->TrsiswaKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
        // $kode_absensi = $this->TrabsensiKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester])->first()['kode_absensi'];
        return view('guru/detail-absensi', compact('data', 'id_kelas', 'id_mata_pelajaran', 'id_semester'));
    }

    public function guru_update(){
        try {
            $kode_absensi_siswa_kelas = random_string('alnum', 20);
            $data = $this->request->getVar();
            for ($i=0; $i < count($data['absensi_kelas_siswa']); $i++) { 
                for ($j=0; $j < (int)$data['jumlah_absensi']; $j++) {
                    $this->TrabsensiSiswaKelasModel->where(['id_siswa' => $data['id_siswa'][$i], 'kode_absensi' => $data['kode_absensi'][$i][$j]])->delete();
                    $this->TrabsensiSiswaKelasModel->replace([
                        'kode_absensi_siswa_kelas' => $kode_absensi_siswa_kelas,
                        'id_siswa' => $data['id_siswa'][$i],
                        'kode_absensi' => $data['kode_absensi'][$i][$j],
                        "status" => $data['absensi_kelas_siswa'][$i][$j],
                    ]);
                }
                $this->TrsiswaKelasModel->set(['hadir' => $data['hadir'][$i], 'izin' => $data['izin'][$i], 'alpha' => $data['alpha'][$i], 'sakit' => $data['sakit'][$i]])->where(['id_siswa' => $data['id_siswa'][$i], 'id_semester' => $data['id_semester'], 'id_kelas' => $data['id_kelas']])->update();
            }
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }

    public function guru_add(){
        try {
            $data = $this->request->getVar();
            for ($i=0; $i < (int)$data['jumlah_kolom_absensi']; $i++) {
                $data['kode_absensi'] = random_string('alnum', 20);
                $this->TrabsensiKelasModel->insert($data);
            }
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}