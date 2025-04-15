<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_model extends CI_Model {

    public function get_all()
    {
        $this->db->select('barang.*, kategori.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
        return $this->db->get()->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('barang', ['id_barang' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('barang', $data);
    }

    public function update($id, $data)
    {
        return $this->db->update('barang', $data, ['id_barang' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete('barang', ['id_barang' => $id]);
    }
}
