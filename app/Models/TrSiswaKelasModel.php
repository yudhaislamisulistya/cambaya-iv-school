<?php

namespace App\Models;

use CodeIgniter\Model;

class TrSiswaKelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tr_siswa_kelas';
    protected $primaryKey       = 'id_siswa_kelas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_kelas',
        'id_semester',
        'id_siswa',
        'sikap_spiritual',
        'sikap_sosial',
        'p_nilai',
        'p_predikat',
        'p_deskripsi',
        'k_nilai',
        'k_predikat',
        'k_deskripsi',
        'pramuka',
        'tari',
        'sanggar_mewarnai_dan_menggambar',
        'quran_club',
        'sains_club',
        'english_club',
        'sepak_bola',
        'tenis_meja',
        'pmr_dan_dokcil',
        'saran_saran',
        'hadir',
        'alpha',
        'sakit',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
