<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Peminjaman_model');
    }

    public function index()
    {
        $tanggal_awal = $this->input->get('tanggal_awal');
        $tanggal_akhir = $this->input->get('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $data['laporan'] = $this->Peminjaman_model->filter_by_date($tanggal_awal, $tanggal_akhir);
        } else {
            $data['laporan'] = $this->Peminjaman_model->get_all();
        }

        $data['tanggal_awal'] = $tanggal_awal;
        $data['tanggal_akhir'] = $tanggal_akhir;
        $this->load->view('laporan/index', $data);
    }
}
