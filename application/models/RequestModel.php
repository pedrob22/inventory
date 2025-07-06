<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RequestModel extends CI_Model
{
    public function insert_permintaan($data)
    {
        $this->db->insert('permintaan_barang', $data);
        return $this->db->insert_id();
    }

    public function insert_permintaan_detail($data)
    {
        $this->db->insert('detail_permintaan', $data);
    }
}
