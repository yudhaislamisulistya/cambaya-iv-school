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
}
