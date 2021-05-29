<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data['main_view'] = 'dashboard/index';
        $data['title'] = 'Ship - Dashboard';
        $this->load->view('template', $data);
    }
}
