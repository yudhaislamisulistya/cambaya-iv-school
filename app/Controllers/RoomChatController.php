<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;
use App\Models\TrSiswaKelasModel;

class RoomChatController extends BaseController
{
    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
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
}
