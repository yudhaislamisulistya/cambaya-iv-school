<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class RaportController extends BaseController
{
    public function __construct(){
        $this->kelasModel = new KelasModel();
    }
    public function index(){
        $id_guru = getGuruByIdUser(session()->get('id_user'))['id_guru'];
        $data = $this->kelasModel->where('id_guru', $id_guru)->get()->getResult();
        return view('guru/raport', compact('data'));
    }
}
