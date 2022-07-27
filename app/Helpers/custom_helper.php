<?php

use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use App\Models\SemesterModel;
use App\Models\SiswaModel;
use App\Models\UserModel;
use App\Models\TrAbsensiKelasModel;
use App\Models\TrAbsensiSiswaKelasModel;
use App\Models\TrNilaiKeterampilanKelasModel;
use App\Models\TrNilaiKeterampilanSiswaKelasModel;
use App\Models\TrNilaiPengetahuanKelasModel;
use App\Models\TrNilaiPengetahuanSiswaKelasModel;
use App\Models\TrSiswaPengetahuanKeterampilanModel;
use App\Models\TrSiswaPrestasiModel;
use App\Models\UjianModel;

function getGuru(){
    $guruModel = new GuruModel();
    $data = $guruModel->get()->getResult();
    return $data;
}

function getGuruById($id_guru){
    $guruModel = new GuruModel();
    $data = $guruModel->where('id_guru', $id_guru)->first();
    return $data;
}

function getUserById($id_user){
    $userModel = new UserModel();
    $data = $userModel->where('id_user', $id_user)->first();
    return $data;
}

function getKelas(){
    $kelasModel = new KelasModel();
    $data = $kelasModel->get()->getResult();
    return $data;
}

function getKelasById($id_kelas){
    $kelasModel = new KelasModel();
    $data = $kelasModel->where('id_kelas', $id_kelas)->first();
    return $data;
}

function getKelasByIdGuru($id_guru){
    $kelasModel = new KelasModel();
    $data = $kelasModel->where('id_guru', $id_guru)->get()->getResult();
    return $data;
}

function getMataPelajranById($id_mata_pelajaran){
    $mataPelajaranModel = new MataPelajaranModel();
    $data = $mataPelajaranModel->where('id_mata_pelajaran', $id_mata_pelajaran)->first();
    return $data;
}

function getSiswaById($id_user){
    $siswaModel = new SiswaModel();
    $data = $siswaModel->where('id_user', $id_user)->first();
    return $data;
}

function getSiswaByIdSiswa($id_siswa){
    $siswaModel = new SiswaModel();
    $data = $siswaModel->where('id_siswa', $id_siswa)->first();
    return $data;
}

function getSemesterAktif(){
    $semesterModel = new SemesterModel();
    $data = $semesterModel->where('status', '1')->first();
    return $data;
}

function getMataPelajaranByKelas($id_kelas, $id_semester, $hari){
    $mataPelajaranModel = new MataPelajaranModel();
    $data = $mataPelajaranModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester, 'hari' => $hari])->get()->getResult();
    return $data;
}

function getSiswa(){
    $siswaModel = new SiswaModel();
    $data = $siswaModel->get()->getResult();
    return $data;
}

function getTrAbsensiKelas($id_mata_pelajaran, $id_kelas, $id_semester){
    $trAbsensiKelasModel = new TrAbsensiKelasModel();
    $data = $trAbsensiKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester, 'id_mata_pelajaran' => $id_mata_pelajaran])->get()->getResult();
    return $data;
}

function getTrAbsensiKelasOne($id_mata_pelajaran, $id_kelas, $id_semester){
    $trAbsensiKelasModel = new TrAbsensiKelasModel();
    $data = $trAbsensiKelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester, 'id_mata_pelajaran' => $id_mata_pelajaran])->first();
    return $data;
}

function getTrAbsensiSiswaKelasByIdSiswaDanKodeAbsensi($id_siswa, $kode_absensi){
    $trAbsensiSiswaKelasModel = new TrAbsensiSiswaKelasModel();
    $data = $trAbsensiSiswaKelasModel->where(['id_siswa' => $id_siswa, 'kode_absensi' => $kode_absensi])->first();
    return $data;
}

function getTrAbsensiSiswaKelasByStatus($status, $id_siswa, $kode_absensi_siswa_kelas){
    $trAbsensiSiswaKelasModel = new TrAbsensiSiswaKelasModel();
    $data = $trAbsensiSiswaKelasModel->where(['status' => $status, 'id_siswa' => $id_siswa, 'kode_absensi_siswa_kelas' => $kode_absensi_siswa_kelas])->get()->getResult();
    return $data;
}

function getTrAbsensiSiswaKelasIdSiswa($id_siswa){
    $trAbsensiSiswaKelasModel = new TrAbsensiSiswaKelasModel();
    $data = $trAbsensiSiswaKelasModel->where('id_siswa', $id_siswa)->first();
    return $data;
}

// Fungsi Untuk manajemen Nilai Pengetahuan

function getTrNilaiPengetahuanKelas($id_mata_pelajaran, $id_kelas, $id_semester){
    $trNilaiPengetahuanKelasModel = new TrNilaiPengetahuanKelasModel();
    $data = $trNilaiPengetahuanKelasModel->where(['id_mata_pelajaran' => $id_mata_pelajaran, 'id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
    return $data;
}

function getTrNilaiPengetahuanSiswaKelasByStatus($kode_nilai_pengetahuan_siswa_kelas, $id_siswa, $kode_nilai_pengetahuan){
    $trNilaiPengetahuanSiswaKelasModel = new TrNilaiPengetahuanSiswaKelasModel();
    $data = $trNilaiPengetahuanSiswaKelasModel->where(['kode_nilai_pengetahuan_siswa_kelas' => $kode_nilai_pengetahuan_siswa_kelas, 'id_siswa' => $id_siswa, 'kode_nilai_pengetahuan' => $kode_nilai_pengetahuan])->first();
    return $data;
}

function getTrNilaiPengetahuanSiswaKelasByNilai($kode_nilai_pengetahuan_siswa_kelas, $id_siswa){
    $trNilaiPengetahuanSiswaKelasModel = new TrNilaiPengetahuanSiswaKelasModel();
    $data = $trNilaiPengetahuanSiswaKelasModel->where(['kode_nilai_pengetahuan_siswa_kelas' => $kode_nilai_pengetahuan_siswa_kelas, 'id_siswa' => $id_siswa])->get()->getResult();
    return $data;
}

function getTrNilaiPengetahuanSiswaKelasByKodeNilaiPengetahuan($kode_nilai_pengetahuan){
    $trNilaiPengetahuanSiswaKelasModel = new TrNilaiPengetahuanSiswaKelasModel();
    $data = $trNilaiPengetahuanSiswaKelasModel->where('kode_nilai_pengetahuan', $kode_nilai_pengetahuan)->first();
    return $data;
}

// Fungsi Untuk Manajemen Nilai Keterampilan

function getTrNilaiKeterampilanKelas($id_mata_pelajaran, $id_kelas, $id_semester){
    $trNilaiKeterampilanKelasModel = new TrNilaiKeterampilanKelasModel();
    $data = $trNilaiKeterampilanKelasModel->where(['id_mata_pelajaran' => $id_mata_pelajaran, 'id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
    return $data;
}

function getTrNilaiKeterampilanSiswaKelasByStatus($kode_nilai_keterampilan_siswa_kelas, $id_siswa, $kode_nilai_keterampilan){
    $trNilaiKeterampilanSiswaKelasModel = new TrNilaiKeterampilanSiswaKelasModel();
    $data = $trNilaiKeterampilanSiswaKelasModel->where(['kode_nilai_keterampilan_siswa_kelas' => $kode_nilai_keterampilan_siswa_kelas, 'id_siswa' => $id_siswa, 'kode_nilai_keterampilan' => $kode_nilai_keterampilan])->first();
    return $data;
}

function getTrNilaiKeterampilanSiswaKelasByNilai($kode_nilai_keterampilan_siswa_kelas, $id_siswa){
    $trNilaiKeterampilanSiswaKelasModel = new TrNilaiKeterampilanSiswaKelasModel();
    $data = $trNilaiKeterampilanSiswaKelasModel->where(['kode_nilai_keterampilan_siswa_kelas' => $kode_nilai_keterampilan_siswa_kelas, 'id_siswa' => $id_siswa])->get()->getResult();
    return $data;
}

function getTrNilaiKeterampilanSiswaKelasByKodeNilaiKeterampilan($kode_nilai_keterampilan){
    $trNilaiKeterampilanSiswaKelasModel = new TrNilaiKeterampilanSiswaKelasModel();
    $data = $trNilaiKeterampilanSiswaKelasModel->where('kode_nilai_keterampilan', $kode_nilai_keterampilan)->first();
    return $data;
}

function getPredikatByNilai($nilai){
    $status = '';
    if($nilai >= 86 && $nilai <= 100){
        $status = 'A';
    }else if($nilai > 80 && $nilai <= 86){
        $status = 'A-';
    }else if($nilai > 76 && $nilai <= 80){
        $status = 'B+';
    }else if($nilai > 71 && $nilai <= 76){
        $status = 'B';
    }else if($nilai > 66 && $nilai <= 71){
        $status = 'B-';
    }else if($nilai > 61 && $nilai <= 66){
        $status = 'C+';
    }else if($nilai > 51 && $nilai <= 61){
        $status = 'C';
    }else if($nilai > 45 && $nilai <= 51){
        $status = 'D';
    }else if($nilai <= 44){
        $status = 'E';
    }
    return $status;
}

function getMataPelajaranById($id_mata_pelajaran){
    $mataPelajaranModel = new MataPelajaranModel();
    $data = $mataPelajaranModel->where('id_mata_pelajaran', $id_mata_pelajaran)->first();
    return $data;
}

function getGuruByIdUser($id_user){
    $guruModel = new GuruModel();
    $data = $guruModel->where('id_user', $id_user)->first();
    return $data;
}

function getMataPelajaranByIdKelasDanIdSemester($id_kelas, $id_semester){
    $mataPelajaranModel = new MataPelajaranModel();
    $data = $mataPelajaranModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
    return $data;
}

function getTrNilaiPengetahuanKelasByIdMataPelajaranKelasSemester($id_mata_pelajaran, $id_kelas, $id_semester){
    $trNilaiPengetahuanKelasModel = new TrNilaiPengetahuanKelasModel();
    $data = $trNilaiPengetahuanKelasModel->where(['id_mata_pelajaran' => $id_mata_pelajaran, 'id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
    return $data;
}

function getTrNilaiPengetahuanSiswaKelasByIdSiswaKodeNilaiPengetahuan($id_siswa, $kode_nilai_pengetahuan){
    $trNilaiPengetahuanSiswaKelasModel = new TrNilaiPengetahuanSiswaKelasModel();
    $data = $trNilaiPengetahuanSiswaKelasModel->where(['id_siswa' => $id_siswa, 'kode_nilai_pengetahuan' => $kode_nilai_pengetahuan])->first();
    return $data;
}

function getTrNilaiKeterampilanKelasByIdMataPelajaranKelasSemester($id_mata_pelajaran, $id_kelas, $id_semester){
    $trNilaiKeterampilanKelasModel = new TrNilaiKeterampilanKelasModel();
    $data = $trNilaiKeterampilanKelasModel->where(['id_mata_pelajaran' => $id_mata_pelajaran, 'id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
    return $data;
}

function getTrNilaiKeterampilanSiswaKelasByIdSiswaKodeNilaiKeterampilan($id_siswa, $kode_nilai_keterampilan){
    $trNilaiKeterampilanSiswaKelasModel = new TrNilaiKeterampilanSiswaKelasModel();
    $data = $trNilaiKeterampilanSiswaKelasModel->where(['id_siswa' => $id_siswa, 'kode_nilai_keterampilan' => $kode_nilai_keterampilan])->first();
    return $data;
}

function getTrSiswaPengetahuanKeterampilanByIdSiswaKelasMataPelajaran($id_siswa_kelas, $id_mata_pelajaran){
    $trSiswaPengetahuanKeterampilanModel = new TrSiswaPengetahuanKeterampilanModel();
    $data = $trSiswaPengetahuanKeterampilanModel->where(['id_siswa_kelas' => $id_siswa_kelas, 'id_mata_pelajaran' => $id_mata_pelajaran])->first();
    return $data;
}

function getTrSiswaPrestasi(){
    $trSiswaPrestasiModel = new TrSiswaPrestasiModel();
    $data = $trSiswaPrestasiModel->get()->getResult();
    return $data;
}

function getMataPelajaranByIdKelas($id_kelas){
    $mataPelajaranModel = new MataPelajaranModel();
    $data = $mataPelajaranModel->where('id_kelas', $id_kelas)->get()->getResult();
    return $data;
}

function getTrAbsensiSiswaKelasByKodeAbsensiOne($kode_absensi){
    $trAbsensiSiswaKelasModel = new TrAbsensiSiswaKelasModel();
    $data = $trAbsensiSiswaKelasModel->where('kode_absensi', $kode_absensi)->first();
    return $data;
}

function getMataPelajaran(){
    $mataPelajaranModel = new MataPelajaranModel();
    $data = $mataPelajaranModel->get()->getResult();
    return $data;
}

function getUjian(){
    $ujianModel = new UjianModel();
    $data = $ujianModel->get()->getResult();
    return $data;
}

?>