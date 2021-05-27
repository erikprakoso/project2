<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = 'Ship - Admin';
        $data['name'] = $this->session->userdata('name');
        $data['admin'] = $this->admin->get_all();
        $data['main_view'] = 'admin/index';
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $data = [
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $tambah = $this->admin->insert($data);
        $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
        $this->session->set_flashdata('info', $msg);
        redirect('admin');
    }

    public function edit()
    {
        $data = [
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
        ];
        $password = $this->input->post('password');
        if ($password) $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        $id = $this->input->post('user_id');
        $edit = $this->admin->update($data, $id);
        $msg = $edit ? 'Berhasil diperbarui' : 'Gagal diperbarui';
        $this->session->set_flashdata('info', $msg);
        redirect('admin');
    }

    public function delete()
    {
        $id = $this->input->post('user_id');
        $edit = $this->admin->delete($id);
        $msg = $edit ? 'Berhasil dihapus' : 'Gagal dihapus';
        $this->session->set_flashdata('info', $msg);
        redirect('admin');
    }
}
