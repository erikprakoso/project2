<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Syahbandar_model extends CI_Model
{
    public function get_all()
    {
        $query = "SELECT * FROM `syahbandar`";
        return $this->db->query($query)->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('syahbandar', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('syahbandar');
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('syahbandar');
        return $this->db->affected_rows() > 0 ? true : false;
    }
}
