<?php

namespace App\Models;

use CodeIgniter\Model;

class TrNilaiPengetahuanSiswaKelasModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tr_nilai_pengetahuan_siswa_kelas';
    protected $primaryKey       = 'id_nilai_pengetahuan_siswa_kelas';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_nilai_pengetahuan_siswa_kelas',
        'id_siswa',
        'kode_absensi',
        'nilai'
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
