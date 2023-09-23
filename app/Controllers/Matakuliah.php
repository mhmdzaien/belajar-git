<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MatakuliahModel;

class Matakuliah extends BaseController
{
    public function index()
    {

        $mataKuliah = $this->mataKuliahModel->getMataKuliah();

        $data = [
            'title' => 'Mata Kuliah',
            'matakuliah' => $mataKuliah
        ];

        return view('matakuliah/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Tambah Mata Kuliah'
        ];

        return view('matakuliah/tambah', $data);
    }

    public function simpan()
    {
        if (!$this->validate(MatakuliahModel::getRules())) {
            session()->setFlashdata('validator', $this->validator->getErrors());
            return redirect()->to(base_url('matakuliah/tambah'))->withInput();
        } else {

            $this->mataKuliahModel->save([
                'nama' => $this->request->getPost('nama'),
                'sks' => $this->request->getPost('sks'),
                'semester' => $this->request->getPost('semester')
            ]);

            session()->setFlashdata('alertMessage', 'Data berhasil ditambahkan.');
            session()->setFlashdata('alertMessageColor', 'success');
            return redirect()->to(base_url('matakuliah'));
        }
    }

    public function ubah($id)
    {
        $matakuliah = $this->mataKuliahModel->getMataKuliah($id);

        $data = [
            'id' => $id,
            'matakuliah' => $matakuliah,
            'title' => 'Ubah Mata Kuliah'
        ];

        return view('matakuliah/ubah', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        if (!$this->validate(MatakuliahModel::getRules())) {
            session()->setFlashdata('validator', $this->validator->getErrors());
            return redirect()->to(base_url('matakuliah/ubah/' . $id))->withInput();
        } else {

            $this->mataKuliahModel->update($id, [
                'nama' => $this->request->getPost('nama'),
                'sks' => $this->request->getPost('sks'),
                'semester' => $this->request->getPost('semester')
            ]);

            session()->setFlashdata('alertMessage', 'Data berhasil diubah.');
            session()->setFlashdata('alertMessageColor', 'success');
            return redirect()->to(base_url('matakuliah'));
        }
    }

    public function hapus($id)
    {
        $this->mataKuliahModel->delete($id);
        session()->setFlashdata('alertMessage', 'Data berhasil hapus.');
        session()->setFlashdata('alertMessageColor', 'warning   ');
        return redirect()->to(base_url('matakuliah'));
    }
}
