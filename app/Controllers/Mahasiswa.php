<?php

namespace App\Controllers;

class Mahasiswa extends BaseController
{
    protected $mahasiswaModel;
    protected $prodiModel;

    public function __construct()
    {
        $this->mahasiswaModel = new \App\Models\Mahasiswa();
        $this->prodiModel = new \App\Models\Prodi();
    }

    public function index(): string
    {
        $gridMahasiswa = $this->mahasiswaModel->grid();
        $data = [
            'title' => 'Mahasiswa',
            'mahasiswa' => $gridMahasiswa
        ];

        return view('Mahasiswa/index', $data);
    }

    public function formTambah()
    {
        // Take List Prodi
        $listProdi = $this->prodiModel->findAll();

        // Insert In Data
        $data = [];
        $data['listProdi'] = $listProdi;

        return view('Mahasiswa/form', $data);
    }

    public function formEdit($id)
    {
        $listProdi = $this->prodiModel->findAll();
        $dataMahasiswa = $this->mahasiswaModel->find($id);

        $data = [
            'mahasiswa' => $dataMahasiswa,
            'listProdi' => $listProdi,
        ];

        return view('Mahasiswa/formEdit', $data);
    }

    public function save()
    {
        // Validasi
        $isNew = $this->request->getPost('isNew');
        if ($isNew == 1) {
            if (!$this->validate($this->mahasiswaModel->getValidationRules())) {
                session()->setFlashData('validator', $this->validator->getErrors());
                return redirect()->to(base_url('mahasiswa/formTambah'))->withInput();
            }
        }

        if ($isNew == 0) {
            if (!$this->validate($this->mahasiswaModel->getRules($isNew))) {
                session()->setFlashData('validator', $this->validator->getErrors());
                $nim = $this->request->getVar('nim');
                return redirect()->to(base_url("mahasiswa/formEdit/$nim"))->withInput();
            }
        }

        // Catching Data
        $dataKirim = $this->request->getPost();

        // Send Data
        if ($isNew == 1) $this->mahasiswaModel->insert($dataKirim);
        else {
            $nim = $this->request->getPost('nim');
            $this->mahasiswaModel->update($nim, $dataKirim);
        }

        return redirect()->to(base_url('mahasiswa'));
    }

    public function delete($id)
    {
        $this->mahasiswaModel->delete($id);
        return redirect()->to(base_url('mahasiswa'));
    }
}
