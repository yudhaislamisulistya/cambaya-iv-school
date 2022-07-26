<?php

namespace App\Models;

use CodeIgniter\Model;

class TrSiswaPengetahuanKeterampilanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tr_siswa_pengetahuan_keterampilan';
    protected $primaryKey       = 'id_siswa_pengetahuan_keterampilan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_siswa_kelas',
        'id_mata_pelajaran',
        'p_nilai',
        'p_predikat',
        'p_deskripsi',
        'k_nilai',
        'k_predikat',
        'k_deskripsi',
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
