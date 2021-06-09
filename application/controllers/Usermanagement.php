<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usermanagement extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usermanagement_model', 'usermanagement');
    }

    public function index()
    {
        $data['title'] = 'User Management';
        $data['usermanagement'] = $this->usermanagement->get_all();
        $data['main_view'] = 'usermanagement/index';
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $tambah = $this->usermanagement->insert($data);
        $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
        $this->session->set_flashdata('info', $msg);
        redirect('usermanagement');
    }

    public function edit()
    {
        $data = [
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'status' => $this->input->post('status'),
            'role' => $this->input->post('role'),
        ];
        $password = $this->input->post('password');
        if ($password) $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        $id = $this->input->post('user_id');
        $edit = $this->usermanagement->update($data, $id);
        $msg = $edit ? 'Berhasil diperbarui' : 'Gagal diperbarui';
        $this->session->set_flashdata('info', $msg);
        redirect('usermanagement');
    }

    public function delete()
    {
        $id = $this->input->post('user_id');
        $edit = $this->usermanagement->delete($id);
        $msg = $edit ? 'Berhasil dihapus' : 'Gagal dihapus';
        $this->session->set_flashdata('info', $msg);
        redirect('usermanagement');
    }
}
