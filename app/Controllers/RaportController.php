<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\TrSiswaKelasModel;
use App\Models\TrSiswaPengetahuanKeterampilanModel;
use App\Models\TrSiswaPrestasiModel;

class RaportController extends BaseController
{
    public function __construct(){
        $this->kelasModel = new KelasModel();
        $this->TrsiswaKelasModel = new TrSiswaKelasModel();
        $this->TrsiswaPengetahuanKeterampilanModel = new TrSiswaPengetahuanKeterampilanModel();
        $this->TrsiswaPrestasiModel = new TrSiswaPrestasiModel();
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
    public function ekstrakurikuler($id_siswa_kelas){
        $data = $this->TrsiswaKelasModel->where('id_siswa_kelas', $id_siswa_kelas)->first();
        $id_kelas = $data['id_kelas'];
        $id_semester = $data['id_semester'];
        return view('guru/raport-ekstrakurikuler', compact('data', 'id_kelas', 'id_semester'));
    }
    public function ekstrakurikuler_save(){
        try {
            $data = $this->request->getVar();
            $this->TrsiswaKelasModel->update($data['id_siswa_kelas'], [
                'pramuka' => $data['pramuka'],
                'tari' => $data['tari'],
                'sanggar_mewarnai_dan_menggambar' => $data['sanggar_mewarnai_dan_menggambar'],
                'quran_club' => $data['quran_club'],
                'sains_club' => $data['sains_club'],
                'english_club' => $data['english_club'],
                'sepak_bola' => $data['sepak_bola'],
                'tenis_meja' => $data['tenis_meja'],
                'pmr_dan_dokcil' => $data['pmr_dan_dokcil'],
            ]);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function saran($id_siswa_kelas){
        $data = $this->TrsiswaKelasModel->where('id_siswa_kelas', $id_siswa_kelas)->first();
        $id_kelas = $data['id_kelas'];
        $id_semester = $data['id_semester'];
        return view('guru/raport-saran', compact('data', 'id_kelas', 'id_semester'));
    }
    public function saran_save(){
        try {
            $data = $this->request->getVar();
            $this->TrsiswaKelasModel->update($data['id_siswa_kelas'], [
                'saran' => $data['saran'],
            ]);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function pengetahuan_keterampilan($id_siswa_kelas){
        $data = $this->TrsiswaKelasModel->where('id_siswa_kelas', $id_siswa_kelas)->first();
        $id_kelas = $data['id_kelas'];
        $id_semester = $data['id_semester'];
        return view('guru/raport-pengetahuan-keterampilan', compact('data', 'id_kelas', 'id_semester'));
    }
    public function pengetahuan_keterampilan_save(){
        try {
            $data = $this->request->getVar();
            for ($i=0; $i < (int)$data['jumlah_pengetahuan_keterampilan']; $i++) { 
                $this->TrsiswaPengetahuanKeterampilanModel->where(['id_siswa_kelas' => $data['id_siswa_kelas'], 'id_mata_pelajaran' => $data['id_mata_pelajaran'][$i]])->delete();
                $this->TrsiswaPengetahuanKeterampilanModel->replace([
                    'id_siswa_kelas' => $data['id_siswa_kelas'],
                    'id_mata_pelajaran' => $data['id_mata_pelajaran'][$i],
                    'p_nilai' => $data['p_nilai'][$i],
                    'p_predikat' => $data['p_predikat'][$i],
                    'p_deskripsi' => $data['p_deskripsi'][$i],
                    'k_nilai' => $data['k_nilai'][$i],
                    'k_predikat' => $data['k_predikat'][$i],
                    'k_deskripsi' => $data['k_deskripsi'][$i],
                ]);
            }
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function prestasi($id_siswa_kelas){
        $data = $this->TrsiswaKelasModel->where('id_siswa_kelas', $id_siswa_kelas)->first();
        $id_kelas = $data['id_kelas'];
        $id_semester = $data['id_semester'];
        return view('guru/raport-prestasi', compact('data', 'id_kelas', 'id_semester'));
    }
    public function prestasi_add(){
        try {
            $data = $this->request->getVar();
            $this->TrsiswaPrestasiModel->insert($data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function prestasi_save(){
        try {
            $data = $this->request->getVar();
            for ($i=0; $i < count($data['id_siswa_prestasi']); $i++) { 
                $this->TrsiswaPrestasiModel->update($data['id_siswa_prestasi'][$i], [
                    'keterangan' => $data['keterangan'][$i],
                ]);
            }
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function ketidakhadiran($id_siswa_kelas){
        $data = $this->TrsiswaKelasModel->where('id_siswa_kelas', $id_siswa_kelas)->first();
        $id_kelas = $data['id_kelas'];
        $id_semester = $data['id_semester'];
        return view('guru/raport-ketidakhadiran', compact('data', 'id_kelas', 'id_semester'));
    }
    public function ketidakhadiran_save(){
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
    public function diagram_pengetahuan_keterampilan($id_siswa_kelas){
        $data = $this->TrsiswaKelasModel->where('id_siswa_kelas', $id_siswa_kelas)->first();
        $id_kelas = $data['id_kelas'];
        $id_semester = $data['id_semester'];
        return view('guru/raport-diagram-pengetahuan-keterampilan', compact('data', 'id_kelas', 'id_semester'));
    }
}
