
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function index()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat, Anda berhasil keluar.
              </div>');
        redirect('/');
    }
}
