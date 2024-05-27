<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function simpanBerdonasi($data = null)
    {
        $this->db->insert('user_berdonasi', $data);
    }

    public function laporWhere($where)
    {
        return $this->db->get_where('laporan_pencairan', $where);
    }
}
