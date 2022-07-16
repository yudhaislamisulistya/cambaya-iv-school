<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataPelajaranModel;

class PelajaranSiswaController extends BaseController
{
    public function __construct(){
        $this->mataPelajaranModel = new MataPelajaranModel(); 
    }
    public function index()
    {
        $data = $this->mataPelajaranModel->get()->getResult();
        return view('admin/pelajaran-siswa', compact('data'));
    }
}