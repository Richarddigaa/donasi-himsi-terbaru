<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAdmin extends CI_Model
{
    public function donasiWhere($where)
    {
        return $this->db->get_where('donasi', $where);
    }
}
