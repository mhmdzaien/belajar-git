<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
  protected $table = 'prodi';
  protected $allowedFields = ['nama', 'jenjang'];

  public function isDuplicate($nama, $jenjang)
  {
    $this->where(['nama' => $nama, 'jenjang' => $jenjang]);
    return $this->find();
  }

  public static function getRules()
  {
    return  [
      'prodi' => [
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Nama Program Studi tidak boleh kosong.',
        ]
      ],
      'jenjang' => [
        'rules' => 'trim|required',
        'errors' => [
          'required' => 'Jenjang tidak boleh kosong.'
        ]
      ]
    ];
  }

  public function getProdi($id = false)
  {
    if ($id == false) {
      return $this->findAll();
    }

    return $this->where(['id' => $id])->first();
  }

  public function deleteProdi($id)
  {
    $this->where('id', $id);
    $this->delete();
  }

}
