<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MataPelajaranModel;

class PelajaranSiswaController extends BaseController
{
    public function __construct(){
        $this->mataPelajaranModel = new MataPelajaranModel(); 
    }
    public function index(){
        $data = $this->mataPelajaranModel->get()->getResult();
        return view('admin/pelajaran-siswa', compact('data'));
    }
    public function save(){
        try {
            $data = $this->request->getVar();
            $this->mataPelajaranModel->insert($data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            var_dump($th);
            die();
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function update(){
        try {
            $data = $this->request->getVar();
            $this->mataPelajaranModel->update($data['id_mata_pelajaran'], $data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception  $th) {
            var_dump($th);
            exit();
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function delete(){
        try {
            $data = $this->request->getVar();
            $this->mataPelajaranModel->delete($data['id_mata_pelajaran']);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}
