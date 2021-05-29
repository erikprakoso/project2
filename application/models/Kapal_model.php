<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kapal_model extends CI_Model
{
    public function get_all()
    {
        $result = $this->db->get('kapal');
        return $result;
    }

    public function create($data)
    {
        $this->db->insert('kapal', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function getByKode($kode)
    {
        return $this->db->get_where('kapal', ['kode' => $kode])->row();
    }

    public function update($data, $kode)
    {
        $this->db->update('kapal', $data, ['kode' => $kode]);
        return $this->db->affected_rows() > 0 ? true : false;
    }
}
