<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{

    public function cekData($where = null)
    {
        return $this->db->get_where('donatur', $where);
    }

    public function simpanData($data = null)
    {
        $this->db->insert('donatur', $data);
    }

    public function simpanBerdonasi($data = null)
    {
        $this->db->insert('transaksi', $data);
    }

    public function laporWhere($where)
    {
        return $this->db->get_where('pencairan', $where);
    }

    public function transaksiWhere($where)
    {
        return $this->db->get_where('transaksi', $where);
    }

    public function strukWhere($where)
    {
        return $this->db->get_where('transaksi', $where);
    }

    public function updateTransaksi($data = null, $where = null)
    {
        $this->db->update('transaksi', $data, $where);
    }

    public function roleWhere($where)
    {
        return $this->db->get_where('donatur_role', $where);
    }
}
