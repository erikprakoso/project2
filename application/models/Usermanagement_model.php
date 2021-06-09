<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermanagement_model extends CI_Model
{
    public function get_all()
    {
        $query = "SELECT * FROM `users`";
        return $this->db->query($query)->result_array();
    }

    public function insert($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function update($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('users');
        return $this->db->affected_rows() > 0 ? true : false;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
        return $this->db->affected_rows() > 0 ? true : false;
    }
}
