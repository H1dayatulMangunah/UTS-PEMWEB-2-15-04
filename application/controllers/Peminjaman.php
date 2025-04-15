<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
        $this->load->model('Barang_model');
    }

    public function index()
    {
        $data['peminjaman'] = $this->Peminjaman_model->get_all();
        $this->load->view('peminjaman/index', $data);
    }

    public function tambah()
    {
        $data['barang'] = $this->Barang_model->get_all();
        $this->load->view('peminjaman/form', $data);
    }

    public function simpan()
    {
    $data_peminjaman = [
        'nama_peminjam' => $this->input->post('nama_peminjam'),
        'tanggal_pinjam' => $this->input->post('tanggal_pinjam'),
        'status' => 'dipinjam'
    ];

    $this->Peminjaman_model->insert($data_peminjaman);
    $id_peminjaman = $this->db->insert_id(); // ambil ID peminjaman terakhir

    $id_barang = $this->input->post('id_barang');
    $jumlah = $this->input->post('jumlah');

    // Cek stok barang
    $barang = $this->Barang_model->get_by_id($id_barang);

    if ($barang->stok >= $jumlah) {
        // Simpan ke detail_peminjaman
        $this->db->insert('detail_peminjaman', [
            'id_peminjaman' => $id_peminjaman,
            'id_barang' => $id_barang,
            'jumlah' => $jumlah
        ]);

        // Kurangi stok
        $this->Barang_model->update($id_barang, [
            'stok' => $barang->stok - $jumlah
        ]);

        $this->session->set_flashdata('success', 'Peminjaman berhasil disimpan.');
    } else {
        $this->session->set_flashdata('error', 'Stok tidak mencukupi.');
    }

    redirect('peminjaman');
    }
    //echo $this->db->last_query(); // <--- tampilkan query SQL di browser
    //exit;

    public function kembali($id)
    {
        $peminjaman = $this->Peminjaman_model->get_by_id($id);
        $this->Barang_model->update($peminjaman->id_barang, [
            'stok' => $this->Barang_model->get_by_id($peminjaman->id_barang)->stok + $peminjaman->jumlah
        ]);
        $this->Peminjaman_model->update($id, [
            'tanggal_kembali' => date('Y-m-d'),
            'status' => 'kembali'
        ]);
        redirect('peminjaman');
    }
}
