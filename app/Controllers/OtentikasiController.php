<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class OtentikasiController extends BaseController
{
    public function login(){
        return view('login');
    }
}
