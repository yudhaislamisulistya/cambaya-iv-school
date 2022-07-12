<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class OtentikasiController extends BaseController
{
    public function __construct(){
        $this->userModel = new UserModel();
        
    }
    public function login(){
        return view('login');
    }
    // Proses Login
    public function login_post(){
        $rules = [
            'email' => 'required|min_length[6]|max_length[50]|valid_email',
            'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
        ];

        $errors = [
            'password' => [
                'validateUser' => "Email atau Password Tidak Sama",
            ],
        ];

        if(!$this->validate($rules, $errors)){
            return view('login', [
                'validation' => $this->validator,
            ]);
        } else {
            $user = $this->userModel->where('email', $this->request->getVar('email'))
                ->first();
            
            // Menyimpan Nilai Session
            $this->setUserSession($user);

            // Disini Kondisi Yah
            if($user['role'] == 1){
                return redirect()->to(base_url('siswa/dashboard'));
            }else if($user['role'] == 2){
                return redirect()->to(base_url('guru/dashboard'));
            }else if($user['role'] == 3){
                return redirect()->to(base_url('admin/dashboard'));
            }
        }
    }

    // Set Session
    public function setUserSession($user){
        $data = [
            'id_user' => $user['id_user'],
            'nama_lengkap' => $user['nama_lengkap'],
            'email' => $user['email'],
            'nohp' => $user['nohp'],
            'alamat' => $user['alamat'],
            'role' => $user['role'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }

    // Proses Logout
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}
