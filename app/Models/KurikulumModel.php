<?php

namespace app\Models;

use CodeIgniter\Model;


class KurikulumModel extends Model
{

    protected $table = "kurikulum";
    protected $allowedFields = ['nim', 'nama', 'prodi_id', 'is_aktif'];

    public function rules($isUpdate = false)
    {
        if ($isUpdate) {
            return [
                'nama' => ['label' => 'Nama Kurikulum', 'rules' => 'required'],
                'prodi_id' => ['label' => 'Prodi', 'rules' => 'required|integer'],
                'is_aktif' => ['label' => 'Status', 'rules' => 'required|integer'],
            ];
        } else {
            return [
                'nama' => ['label' => 'Nama Kurikulum', 'rules' => 'required|is_unique[kurikulum.nama]'],
                'prodi_id' => ['label' => 'Prodi', 'rules' => 'required|integer'],
                'is_aktif' => ['label' => 'Status', 'rules' => 'required|integer'],
            ];
        }
    }
}
