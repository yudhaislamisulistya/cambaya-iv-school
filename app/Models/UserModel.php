<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_lengkap',
        'email',
        'password',
        'plain_password',
        'role'
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

    public function getSiswa(){
        $query = $this->table('siswa')
            ->join('siswa', 'users.id_user = siswa.id_user')
            ->where('users.role', '1')
            ->get();
        return $query;
    }

    public function getSiswaById($id_user){
        $query = $this->table('siswa')
            ->join('siswa', 'users.id_user = siswa.id_user')
            ->where('users.role', '1')
            ->where('siswa.id_user', $id_user);
        return $query;
    }

    public function getGuru(){
        $query = $this->table('guru')
        ->join('guru', 'users.id_user = guru.id_user')
        ->where('users.role', '2')
        ->get();
    return $query;
    }
}
