<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class BerandaController extends BaseController
{
    public function index(){
        return view('index');
    }
    public function admin_dashboard(){
        return view('admin/dashboard');
    }
    public function guru_dashboard(){
        return view('guru/dashboard');
    }
    public function siswa_dashboard(){
        return view('siswa/dashboard');
    }
    public function landing_page(){
        return view('landing-page');
    }
}
