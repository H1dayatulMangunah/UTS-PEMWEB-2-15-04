<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman_model extends CI_Model {

    // Menampilkan semua data peminjaman (lengkap dengan jumlah dan nama barang)
    public function get_all()
    {
        $this->db->select('peminjaman.*, barang.nama_barang, detail_peminjaman.jumlah');
        $this->db->from('peminjaman');
        $this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman');
        $this->db->join('barang', 'barang.id_barang = detail_peminjaman.id_barang');
        return $this->db->get()->result();
    }

    // Menyimpan data ke tabel peminjaman
    public function insert($data)
    {
        return $this->db->insert('peminjaman', $data);
    }

    // Mengupdate data peminjaman (digunakan saat pengembalian)
    public function update($id, $data)
    {
        return $this->db->update('peminjaman', $data, ['id_peminjaman' => $id]);
    }

    // Mengambil 1 data peminjaman berdasarkan ID
    public function get_by_id($id)
    {
        return $this->db->get_where('peminjaman', ['id_peminjaman' => $id])->row();
    }

    // Menampilkan laporan yang difilter berdasarkan tanggal
    public function filter_by_date($awal, $akhir)
    {
        $this->db->select('peminjaman.*, barang.nama_barang, detail_peminjaman.jumlah');
        $this->db->from('peminjaman');
        $this->db->join('detail_peminjaman', 'detail_peminjaman.id_peminjaman = peminjaman.id_peminjaman');
        $this->db->join('barang', 'barang.id_barang = detail_peminjaman.id_barang');
        $this->db->where('tanggal_pinjam >=', $awal);
        $this->db->where('tanggal_pinjam <=', $akhir);
        return $this->db->get()->result();
    }
}
