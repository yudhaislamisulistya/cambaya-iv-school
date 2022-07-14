<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\UserModel;

class GuruController extends BaseController
{
    public function __construct(){
        $this->userModel = new UserModel();
        $this->guruModel = new GuruModel();
    }
    public function index(){
        $data = $this->userModel->where('role', '2')->get()->getResult();
        return view('admin/user/guru', compact('data'));
    }
    public function save(){
        try {
            $data = $this->request->getVar();
            $data['plain_password'] = $data['password'];
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['role'] = 2;
            $rules = [
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
            ];
        
            if(!$this->validate($rules)){
                return view('admin/user/guru',[
                    'validation' => $this->validator,
                    'data' => $data
                ]);
            }else{
                $this->userModel->insert($data);
                $this->guruModel->insert([
                    'id_user' => $this->userModel->insertID(),
                ]);
                return redirect()->back()->with('status', 'success');
            }
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function update(){
        try {
            $data = $this->request->getVar();
            $data['plain_password'] = $data['password'];
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $rules = [
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
                'email' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
            ];
        
            if(!$this->validate($rules)){
                return view('admin/data-alternatif',[
                    'validation' => $this->validator,
                    'data' => $this->data
                ]);
            }else{
                $this->userModel->update($data['id_user'], $data);
                return redirect()->back()->with('status', 'success');
            }
        } catch (\Exception  $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function delete(){
        try {
            $data = $this->request->getVar();
            $this->userModel->delete($data['id_user']);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }

    public function guru_index(){
        $data = $this->userModel->getGuru()->getResult();
        return view('admin/guru', compact('data'));
}
    public function guru_update(){
        try {
            $data = $this->request->getVar();
            $data['tempat_tanggal_lahir'] = $data['tempat_lahir'].', '.$data['tanggal_lahir'];
            $this->userModel->update($data['id_user'], $data);
            $this->guruModel->set($data)->where('id_user', $data['id_user'])->update();
            return redirect()->back()->with('status', 'success');
        } catch (\Exception  $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function guru_delete(){
        try {
            $data = $this->request->getVar();
            $this->userModel->delete($data['id_user']);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}
