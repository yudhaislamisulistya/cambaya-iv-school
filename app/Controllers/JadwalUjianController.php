<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UjianModel;

class JadwalUjianController extends BaseController
{
    public function __construct(){
        $this->ujianModel = new UjianModel();
    }
    public function index(){
        $data = $this->ujianModel->get()->getResult();
        return view('admin/jadwal-ujian', compact('data'));
    }
    public function save(){
        try {
            $data = $this->request->getVar();
            $this->ujianModel->insert($data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function update(){
        try {
            $data = $this->request->getVar();
            $this->ujianModel->update($data['id_ujian'], $data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception  $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function delete(){
        try {
            $data = $this->request->getVar();
            $this->ujianModel->delete($data['id_ujian']);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
}
