<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('AdminModel');
        $this->load->model('RequestModel');
        $this->AuthModel->cekLoginProduksi();
    }

    public function index()
    {
        $this->template->load('layout/main', 'produksi/dashboard');
    }

    public function permintaan_barang()
    {
        $this->template->load('layout/main', 'produksi/permintaan_barang');
    }

    public function tambah_request_permintaan_barang()
    {
        $this->template->load('layout/main', 'produksi/request_permintaan_barang_tambah');
    }

    public function simpan()
    {
        // Ambil data POST
        $id_user = $this->input->post('id_user');
        $id_departement = $this->input->post('id_departement');
        $tgl_permintaan = $this->input->post('tgl_permintaan');
        $id_barang = $this->input->post('id_barang');
        $qty_permintaan = $this->input->post('qty_permintaan');
        $ket_permintaan = $this->input->post('ket_permintaan');

        if (!$id_barang || !$qty_permintaan) {
            $this->session->set_flashdata('error', 'Data barang dan jumlah wajib diisi.');
            redirect('Produksi/tambah_request_permintaan_barang');
        }

        // Data header
        $header = [
            'id_departement' => $id_departement,
            'tgl_permintaan' => date('Y-m-d', strtotime($tgl_permintaan)),
            'status_permintaan' => 'Waiting',
            'view_permintaan' => 0
        ];

        // Simpan header
        $id_permintaan = $this->RequestModel->insert_permintaan($header);

        // Simpan detail
        foreach ($id_barang as $key => $id_brg) {
            $detail = [
                'id_permintaan' => $id_permintaan,
                'id_barang' => $id_brg,
                'qty_permintaan' => $qty_permintaan[$key],
                'qty_keluar_permintaan' => 0,
                'ket_permintaan' => $ket_permintaan[$key]
            ];
            $this->RequestModel->insert_permintaan_detail($detail);
        }

        $this->session->set_flashdata('success', 'Data permintaan berhasil disimpan.');
        redirect('Produksi/permintaan_barang');
    }
}
