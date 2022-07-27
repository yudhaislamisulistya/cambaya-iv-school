<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;
use App\Models\SiswaModel;
use App\Models\TrSiswaKelasModel;

class RoomChatController extends BaseController
{
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->guruModel = new GuruModel();
        $this->trSiswaKelasModel = new TrSiswaKelasModel();
    }
    public function index()
    {
        return view('guru/room-chat');
    }
    public function room_chat_siswa(){
        $data = $this->request->getVar();
        $siswa = $this->siswaModel->where('id_siswa', $data['id_siswa'])->first();
        return view('guru/room-chat-siswa', compact('siswa'));
    }
    public function room_chat_group(){
        $data = $this->request->getVar();
        $id_kelas = $data['id_kelas'];
        $siswa_kelas = $this->trSiswaKelasModel->where('id_kelas', $data['id_kelas'])->get()->getResult();
        return view('guru/room-chat-group', compact('data', 'siswa_kelas', 'id_kelas'));

    }

    // Role Siswa
    public function index_siswa()
    {
        $id_siswa = $this->siswaModel->where('id_user', session()->get('id_user'))->first()['id_siswa'];
        $data = $this->trSiswaKelasModel->where(['id_siswa' => $id_siswa, 'id_semester' => getSemesterAktif()['id_semester']])->get()->getResult();
        $id_kelas = $this->trSiswaKelasModel->where(['id_siswa' => $id_siswa, 'id_semester' => getSemesterAktif()['id_semester']])->first()['id_kelas'];
        return view('siswa/room-chat', compact('data', 'id_kelas'));
    }
    public function room_chat_guru_siswa(){
        $data = $this->request->getVar();
        $guru = $this->guruModel->where('id_guru', $data['id_guru'])->first();
        return view('siswa/room-chat-guru', compact('guru'));
    }
    public function room_chat_group_siswa(){
        $data = $this->request->getVar();
        $id_kelas = $data['id_kelas'];
        $siswa_kelas = $this->trSiswaKelasModel->where('id_kelas', $data['id_kelas'])->get()->getResult();
        return view('siswa/room-chat-group', compact('data', 'siswa_kelas', 'id_kelas'));

    }
}
