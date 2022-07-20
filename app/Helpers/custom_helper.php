<?php

use App\Models\GuruModel;
use App\Models\KelasModel;
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

?>