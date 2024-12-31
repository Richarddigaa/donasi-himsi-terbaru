<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAdmin extends CI_Model
{
    public function hapus_donatur($id)
    {
        $this->db->where('id_donatur', $id);
        $this->db->delete('donatur');
    }

    public function donaturWhere($where)
    {
        return $this->db->get_where('donatur', $where);
    }


    public function simpanDonasi($data = null)
    {
        $this->db->insert('donasi', $data);
    }

    public function hapus_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }

    public function getrow($where, $tabel)
    {
        $this->db->from($tabel);
        $this->db->where($where);
        return $this->db->get()->row();
    }

    public function hapusDonasi($id)
    {
        $this->db->where('id_donasi', $id);
        $this->db->delete('donasi');
    }

    public function donasiWhere($where)
    {
        return $this->db->get_where('donasi', $where);
    }

    public function updateDonasi($data = null, $where = null)
    {
        $this->db->update('donasi', $data, $where);
    }

    public function berdonasiWhere($where)
    {
        return $this->db->get_where('transaksi', $where);
    }

    public function hapus_metode($id)
    {
        $this->db->where('id_pembayaran', $id);
        $this->db->delete('pembayaran');
    }

    public function uploadBukti($data = null, $where = null)
    {
        $this->db->update('pencairan', $data, $where);
    }

    public function uploadWhere($where)
    {
        return $this->db->get_where('pencairan', $where);
    }


}
