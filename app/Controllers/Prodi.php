<?php

namespace App\Controllers;

use App\Models\ProdiModel;


class Prodi extends BaseController
{

  protected $prodiModel;
  public function index()
  {
    $this->prodiModel = new prodiModel();
    $data['prodi'] = $this->prodiModel->getProdi();
    return view('prodi/index', $data);
  }

  public function tambah()
  {
    return view('prodi/tambah',);
  }

  public function simpan()
  {
    $this->prodiModel = new prodiModel();
    $nama = $this->request->getVar('prodi');
    $jenjang = $this->request->getVar('jenjang');
    $isDuplicate = $this->prodiModel->isDuplicate($nama, $jenjang);

    if (!$this->validate(ProdiModel::getRules()) || $isDuplicate) {
      if ($isDuplicate) {
        session()->setFlashData('duplicate', 'Program Studi telah terdaftar.');
      }
      session()->setFlashData('validator', $this->validator->getErrors());
      return redirect()->to(base_url('prodi/tambah'))->withInput();
    } else {
      $this->prodiModel->save([
        'nama' => $this->request->getVar('prodi'),
        'jenjang' => $this->request->getVar('jenjang')
      ]);

      return redirect()->to(base_url('prodi'));
    }
  }

  public function hapus($id)
  {
    $this->prodiModel = new prodiModel();
    $this->prodiModel->deleteProdi($id);

    return redirect()->to(base_url('prodi'));
  }

  public function ubah($id)
  {
    $this->prodiModel = new prodiModel();
    $data['title'] = 'Ubah Data Program Studi';
    $data['prodi'] = $this->prodiModel->getProdi($id);

    return view('prodi/ubah', $data);
  }

  public function update()
  {
    $this->prodiModel = new prodiModel();
    $id = $this->request->getVar('id');

    $prodi = $this->prodiModel->getProdi($id);

    $nama = $this->request->getVar('prodi');
    $jenjang = $this->request->getVar('jenjang');
    $isDuplicate = false;

    if ($nama != $prodi['nama'] || $jenjang != $prodi['jenjang']) {
      $isDuplicate = $this->prodiModel->isDuplicate($nama, $jenjang);
    }

    if (!$this->validate(ProdiModel::getRules()) || $isDuplicate) {
      if ($isDuplicate) {
        session()->setFlashData('duplicate', 'Program Studi telah terdaftar.');
      }
      session()->setFlashData('validator', $this->validator->getErrors());
      return redirect()->to(base_url('prodi/ubah/' . $id))->withInput();
    } else {
      $this->prodiModel->save([
        'id' => $id,
        'nama' => $this->request->getVar('prodi'),
        'jenjang' => $this->request->getVar('jenjang')
      ]);
      return redirect()->to(base_url('prodi'));
    }
  }
}
