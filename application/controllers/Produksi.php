<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('AdminModel');
        $this->load->model('RequestModel'); // pastikan model ini ada
        $this->AuthModel->cekLoginProduksi();
    }

    public function index()
    {
        $this->template->load('layout/main', 'produksi/dashboard');
    }

    public function Permintaan_Barang()
    {
        $this->template->load('layout/main', 'produksi/permintaan_barang');
    }

    public function Tambah_Request_Permintaan_Barang()
    {
        $this->template->load('layout/main', 'produksi/request_permintaan_barang_tambah');
    }

    public function Detail_Request_Permintaan_Barang($id)
    {
        $data['id'] = $id;
        $this->template->load('layout/main', 'produksi/request_permintaan_barang_detail', $data);
    }

    public function Edit_Request_Permintaan_Barang($id)
    {
        $data['id'] = $id;
        $this->template->load('layout/main', 'produksi/request_permintaan_barang_edit', $data);
    }

    public function Profile()
    {
        $this->template->load('layout/main', 'produksi/profile');
    }

    public function Simpan_Request_Permintaan_Barang()
    {
        // Ambil data POST
        $id_user = $this->input->post('id_user');
        $id_departement = $this->input->post('id_departement');
        $tgl_permintaan = $this->input->post('tgl_permintaan');
        $id_barang = $this->input->post('id_barang');
        $qty_permintaan = $this->input->post('qty_permintaan');
        $ket_permintaan = $this->input->post('ket_permintaan');

        // Validasi sederhana
        if (!$id_barang || !$qty_permintaan) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Data barang dan jumlah wajib diisi.'
            ]);
            return;
        }

        // Data header permintaan
        $header = [
            'id_user' => $id_user,
            'id_departement' => $id_departement,
            'tgl_permintaan' => date('Y-m-d', strtotime($tgl_permintaan)),
            'status' => 'pending'
        ];

        // Simpan header
        $id_permintaan = $this->RequestModel->insert_permintaan($header);

        // Simpan detail barang
        foreach ($id_barang as $key => $id_brg) {
            $detail = [
                'id_permintaan' => $id_permintaan,
                'id_barang' => $id_brg,
                'qty' => $qty_permintaan[$key],
                'keterangan' => $ket_permintaan[$key]
            ];
            $this->RequestModel->insert_permintaan_detail($detail);
        }

        echo json_encode([
            'status' => 'success',
            'message' => 'Data berhasil disimpan.'
        ]);
    }
}
