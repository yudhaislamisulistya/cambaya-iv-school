<?php

use App\Models\GuruModel;
use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use App\Models\SemesterModel;
use App\Models\SiswaModel;
use App\Models\UserModel;

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

?>