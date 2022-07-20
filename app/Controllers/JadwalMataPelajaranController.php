<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;

class JadwalMataPelajaranController extends BaseController
{
    
    public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }
    public function index()
    {
        $data = $this->kelasModel->get()->getResult();
        return view('admin/jadwal-mata-pelajaran', compact('data'));
    }
}
