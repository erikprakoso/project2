<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konstruksi_model extends CI_Model
{
    public function get_all()
    {
        $this->db->select('a.*, b.name AS admin')
            ->from('konstruksi a')
            ->join('users b', 'a.user_id = b.id');
        return $this->db->get();
    }

    public function get_kapal($konstruksi_id)
    {
        $this->db->select('b.kode, b.nama_kapal, a.jumlah')
            ->from('detail_konstruksi a')
            ->join('kapal b', 'a.kode_kapal = b.kode')
            ->where('konstruksi_id', $konstruksi_id);
        return $this->db->get();
    }

    public function create($data)
    {
        $this->db->insert('konstruksi', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function create_detail($data)
    {
        $this->db->insert_batch('detail_konstruksi', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function getByKode($kode)
    {
        return $this->db->get_where('konstruksi', ['kode' => $kode])->row();
    }

    public function update($data, $kode)
    {
        $this->db->update('konstruksi', $data, ['kode' => $kode]);
        return $this->db->affected_rows() > 0 ? true : false;
    }
}
