<?php

namespace App\Models;

use CodeIgniter\Model;

class Mahasiswa extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'mahasiswa';
    protected $primaryKey       = 'nim';
    // protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    =
    [
        'nim',
        'nama',
        'jenis_kelamin',
        'semester_masuk',
        'prodi_id',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      =
    [
        'nim'               => 'trim|required|numeric|is_unique[mahasiswa.nim]',
        'nama'              => 'trim|required',
        'jenis_kelamin'     => 'trim|required',
        'semester_masuk'    => 'trim|required',
        'prodi_id'          => 'trim|required|numeric',
    ];
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

    public function getRules($isNew)
    {
        $validationRules = $this->validationRules;
        if ($isNew == 0) $validationRules['nim'] = 'trim|required|numeric';
        return $validationRules;
    }

    public function grid() {
        $builder = $this->db->table('mahasiswa');
        $builder->select("mahasiswa.* , prodi.nama as nama_prodi, prodi.jenjang");
        $builder->join('prodi', 'mahasiswa.prodi_id = prodi.id');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
