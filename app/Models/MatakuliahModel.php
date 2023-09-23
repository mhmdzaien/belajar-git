<?php

namespace App\Models;

use CodeIgniter\Model;

class MatakuliahModel extends Model
{
    protected $table            = 'matakuliah';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama', 'sks', 'semester', 'created_at', 'updated_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public static function getRules()
    {
        return  [
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Mata Kuliah tidak boleh kosong.',
                ]
            ],
            'sks' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah SKS tidak boleh kosong.',
                    'numeric' => 'Jumlah SKS harus berupa angka.'
                ]
            ],
            'semester' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jenjang tidak boleh kosong.',
                    'numeric' => 'Semester harus berupa angka.'
                ]
            ]
        ];
    }

    public function getMataKuliah($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        } else {
            return $this->find($id);
        }
    }
}
