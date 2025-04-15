<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('kategori/index', $data);
    }

    public function tambah()
    {
        $this->load->view('kategori/form');
    }

    public function simpan()
    {
        $data = ['nama_kategori' => $this->input->post('nama_kategori')];
        $this->Kategori_model->insert($data);
        redirect('kategori');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->Kategori_model->get_by_id($id);
        $this->load->view('kategori/form', $data);
    }

    public function update($id)
    {
        $data = ['nama_kategori' => $this->input->post('nama_kategori')];
        $this->Kategori_model->update($id, $data);
        redirect('kategori');
    }

    public function hapus($id)
    {
        $this->Kategori_model->delete($id);
        redirect('kategori');
    }
}
