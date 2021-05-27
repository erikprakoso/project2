<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function get_user_by_username($username)
    {
        $query = "SELECT * FROM `users` WHERE `username` = '$username'";
        return $this->db->query($query)->row_array();
    }
}
