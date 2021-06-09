<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
    public function index()
    {
        $this->load->model('Dashboard_model');
        $data['main_view'] = 'dashboard/index';
        $data['title'] = 'Dashboard';
        $this->load->view('template', $data);
    }
}
