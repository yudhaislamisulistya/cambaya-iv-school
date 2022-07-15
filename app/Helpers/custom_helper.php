<?php

use App\Models\GuruModel;
use App\Models\UserModel;

function getGuru(){
    $guruModel = new GuruModel();
    $data = $guruModel->get()->getResult();
    return $data;
}

function getUserById($id_user){
    $userModel = new UserModel();
    $data = $userModel->where('id_user', $id_user)->first();
    return $data;
}

?>