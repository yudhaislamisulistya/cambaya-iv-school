<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class AbsensiController extends BaseController
{
    public function __construct(){
        $this->kelasModel = new KelasModel();
    }
    public function index()
    {
        $data = $this->kelasModel->get()->getResult();
        return view('admin/absensi', compact('data'));
    }
    public function detail($id_kelas, $id_semester){
        return view('admin/detail-absensi', compact('id_kelas', 'id_semester'));
    }
}