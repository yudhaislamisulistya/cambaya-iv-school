<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KelasModel;
use App\Models\TrSiswaKelasModel;

class KelasController extends BaseController
{
    public function __construct(){
        $this->kelasModel = new KelasModel();
        $this->TrsiswakelasModel = new TrSiswaKelasModel();
    }
    public function index(){
        $data = $this->kelasModel->get()->getResult();
        return view('admin/kelas', compact('data'));
    }
    public function save(){
        try {
            $data = $this->request->getVar();
            $wali_kelas = explode('-', $data['wali_kelas']);
            $data['id_guru'] = $wali_kelas[0];
            $data['wali_kelas'] = $wali_kelas[1];
            $rules = [
                'kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
                'wali_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
            ];
        
            if(!$this->validate($rules)){
                return view('admin/kelas',[
                    'validation' => $this->validator,
                    'data' => $data
                ]);
            }else{
                $this->kelasModel->insert($data);
                return redirect()->back()->with('status', 'success');
            }
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function update(){
        try {
            $data = $this->request->getVar();
            $rules = [
                'kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
                'wali_kelas' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Harus Diisi'
                    ]
                ],
            ];
        
            if(!$this->validate($rules)){
                return view('admin/kelas',[
                    'validation' => $this->validator,
                    'data' => $this->data
                ]);
            }else{
                $this->kelasModel->update($data['id_kelas'], $data);
                return redirect()->back()->with('status', 'success');
            }
        } catch (\Exception  $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function delete(){
        try {
            $data = $this->request->getVar();
            $this->kelasModel->delete($data['id_kelas']);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function kelas_siswa_index($id_kelas, $id_semester){
        $data = $this->TrsiswakelasModel->where(['id_kelas' => $id_kelas, 'id_semester' => $id_semester])->get()->getResult();
        return view('admin/tambah-siswa', compact('data', 'id_kelas', 'id_semester'));
    }
    public function kelas_siswa_save(){
        try {
            $data = $this->request->getVar();
            $this->TrsiswakelasModel->insert($data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function kelas_siswa_delete(){
        try {
            $data = $this->request->getVar();
            $this->TrsiswakelasModel->delete($data['id_siswa_kelas']);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
}
