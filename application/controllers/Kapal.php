<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kapal extends CI_Controller
{
    public function index()
    {
        $data['name'] = $this->session->userdata('name');
        $data['main_view'] = 'kapal/index';
        $this->load->view('template', $data);
    }
}
