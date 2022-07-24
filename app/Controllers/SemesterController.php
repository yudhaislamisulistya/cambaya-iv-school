<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SemesterModel;

class SemesterController extends BaseController
{
    public function __construct(){
        $this->semesterModel = new SemesterModel();
    }
    public function index(){
        $data = $this->semesterModel->get()->getResult();
        return view('admin/semester', compact('data'));
    }
    public function save(){
        try {
            $data = $this->request->getVar();
            $this->semesterModel->insert($data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function update(){
        try {
            $data = $this->request->getVar();
            $this->semesterModel->update($data['id_semester'], $data);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception  $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }
    public function delete(){
        try {
            $data = $this->request->getVar();
            $this->semesterModel->delete($data['id_semester']);
            return redirect()->back()->with('status', 'success');
        } catch (\Exception $th) {
            return redirect()->back()->with('status', 'failed');
        }
    }

}
