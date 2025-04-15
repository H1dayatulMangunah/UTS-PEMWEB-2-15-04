<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
    }

    public function index()
    {
        $data['barang'] = $this->Barang_model->get_all();
        $this->load->view('barang/index', $data);
    }

    public function tambah()
    {
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('barang/form', $data);
    }

    public function simpan()
    {
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'stok' => $this->input->post('stok'),
            'id_kategori' => $this->input->post('id_kategori')
        ];
        $this->Barang_model->insert($data);
        redirect('barang');
    }

    public function edit($id)
    {
        $data['barang'] = $this->Barang_model->get_by_id($id);
        $data['kategori'] = $this->Kategori_model->get_all();
        $this->load->view('barang/form', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'stok' => $this->input->post('stok'),
            'id_kategori' => $this->input->post('id_kategori')
        ];
        $this->Barang_model->update($id, $data);
        redirect('barang');
    }

    public function hapus($id)
    {
        $this->Barang_model->delete($id);
        redirect('barang');
    }
}
