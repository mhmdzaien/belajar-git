<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Models\KurikulumModel;

class Kurikulum extends BaseController
{

    protected $listKurikulum;
    protected $helpers = ['form'];

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request,$response,$logger); 
        $this->listKurikulum = new KurikulumModel();
    }

    public function index()
    {
        $listKurikulum = $this->listKurikulum->findAll();
        return view('Kurikulum/index', array(
            'listKurikulum' => $listKurikulum,
        ));
    }

    public function add()
    {
        if (!$this->request->is('post')) {
            return view('Kurikulum/addForm');
        }

        if (!$this->validate($this->listKurikulum->rules())) {
            return view('kurikulum/addForm');
        } else {
            $this->listKurikulum->insert($this->request->getPost());
            return redirect()->to(base_url('kurikulum'));
        }
    }

    
    public function edit($id){
        $kurikulum = $this->listKurikulum->find($id);
        if (!$this->request->is('post')) {
            return view('Kurikulum/editForm', array(
                'kurikulum' => $kurikulum,
            ));
        }

        $rules = [];
        if ($this->request->getPost('nama') == $kurikulum['nama']) {
            $rules = $this->listKurikulum->rules(true);
        } else {
            $rules = $this->listKurikulum->rules();
        }

        if(!$this->validate($rules)){
            return view('kurikulum/editForm', array(
                'kurikulum' => $kurikulum,
            ));
        } else {
            $this->listKurikulum->update($id, $this->request->getPost());
            return redirect()->to('kurikulum');
        }
    }

    public function delete($id){
        $this->listKurikulum->delete($id);
        return redirect()->to(base_url('kurikulum'));
    }
}
