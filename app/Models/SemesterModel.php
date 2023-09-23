<?php

namespace App\Models;

use CodeIgniter\Model;

class SemesterModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'semester';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'nama', 'jenis', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
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


    public static function rules($isUpdated = false): array
    {

        $validationRules = [
            'id' => [
                'label' => 'Id',
                'rules' => 'required|is_unique[semester.id]',
                'errors' => [
                    'required' => '{field} semester harus diisi.',
                    'is_unique' => '{field} semester sudah ada.'
                ]
            ],
            'nama' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} semester harus diisi.'
                ]
            ],
            'jenis' => [
                'label' => 'Jenis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} semester harus diisi.'
                ]
            ]
        ];

        if ($isUpdated) {
            $validationRules['id']['rules'] = 'required';
        }
    
        return $validationRules;
    }
}
