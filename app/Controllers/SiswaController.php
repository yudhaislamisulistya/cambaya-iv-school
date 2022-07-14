<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\UserModel;

class SiswaController extends BaseController
{
    public function __construct(){
        $this->userModel = new UserModel();
        $this->siswaModel = new SiswaModel();
    }
    public function index(){
        $data = $this->userModel->getSiswa()->getResult();
        return view('admin/user/siswa', compact('data'));
    }
    public function save(){
        try {
            $data = $this->request->getVar();
            $data['plain_password'] = $data['password'];
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            $data['role'] = 1;
            $rules = [
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
                'nis' => [
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
                $this->siswaModel->insert([
                    'id_user' => $this->userModel->insertID(),
                    'nis' => $data['nis']
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
                'nis' => [
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
                $this->siswaModel->update($data['id_user'], [
                    'nis' => $data['nis']
                ]);
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
    public function siswa_index(){
        $data = $this->userModel->getSiswa()->getResult();
        return view('admin/siswa', compact('data'));
    }
    public function siswa_update(){
        try {
            $data = $this->request->getVar();
            $data['tempat_tanggal_lahir'] = $data['tempat_lahir'].', '.$data['tanggal_lahir'];
            $this->userModel->update($data['id_user'], $data);
            $this->siswaModel->set($data)->where('id_user', $data['id_user'])->update();
            return redirect()->back()->with('status', 'success');
        } catch (\Exception  $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function siswa_delete(){
        try {
            $data = $this->request->getVar();
            $this->userModel->delete($data['id_user']);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function siswa_detail($id_user){
        try {
            $data = $this->userModel->getSiswaById($id_user)->first();
            return view('admin/detail-siswa', compact('data'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}
