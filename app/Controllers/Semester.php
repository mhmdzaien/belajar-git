<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\SemesterModel;


class Semester extends BaseController
{
    protected $helpers = ['form'];

    protected $semester;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->semester = new SemesterModel();
    }

    public function index()
    {
        $semester = $this->semester->findAll();
        return view('semester/index', ['semesters' => $semester]);
    }

    public function create()
    {
        if ($this->request->getMethod() == 'post') {
            $validation =  \Config\Services::validation();
            $validation->setRules(\App\Models\SemesterModel::rules());
            $isDataValid = $validation->withRequest($this->request)->run();

            $errors = $validation->getErrors();
            if ($errors) {
                session()->setFlashdata('errors', $errors);
            }

            if ($isDataValid) {
                $this->semester->insert([
                    'id' => $this->request->getPost('id'),
                    'nama' => $this->request->getPost('nama'),
                    'jenis' => $this->request->getPost('jenis'),
                ]);

                $session = session();
                $session->setFlashdata('message', 'Data berhasil ditambahkan.');
                return redirect()->to(base_url('semester/index'));
            }
        }

        return view('semester/create');
    }

    public function edit($id)
    {
        if ($this->request->getMethod() == 'post') {
            $validation =  \Config\Services::validation();

            if ($this->request->getPost('id') != $id) {
                $validation->setRules(SemesterModel::rules());
            } else {
                $validation->setRules(SemesterModel::rules(true));
            }

            $isDataValid = $validation->withRequest($this->request)->run();

            $errors = $validation->getErrors();
            if ($errors) {
                session()->setFlashdata('errors', $errors);
            }

            if ($isDataValid) {
                $this->semester->update($id, [
                    'id' => $this->request->getPost('id'),
                    'nama' => $this->request->getPost('nama'),
                    'jenis' => $this->request->getPost('jenis'),
                ]);

                $session = session();
                $session->setFlashdata('message', 'Data berhasil diubah.');
                return redirect()->to(base_url('semester/index'));
            }
        }

        $semester = $this->semester->find($id);
        return view('semester/edit', ['semester' => $semester]);
    }

    public function delete($id)
    {
        $this->semester->delete($id);
        $session = session();
        $session->setFlashdata('message', 'Data berhasil dihapus.');
        return redirect()->to(base_url('semester'));
    }
}
