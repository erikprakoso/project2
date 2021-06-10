<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Register_model', 'register');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'inputName',
            'Name',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'inputUsername',
            'Username',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'inputEmail',
            'Email',
            'required|trim|valid_email|is_unique[users.email]'
        );
        $this->form_validation->set_rules(
            'inputPassword1',
            'Kata Sandi',
            'required|trim|min_length[5]|matches[inputPassword2]'
        );
        $this->form_validation->set_rules(
            'inputPassword2',
            'Ulangi Kata Sandi',
            'required|trim|min_length[5]|matches[inputPassword1]'
        );
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Register';
            $this->load->view('register/index', $data);
        } else {
            $this->_register();
        }
    }

    private function _register()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('inputName', true)),
            'username' => htmlspecialchars($this->input->post('inputUsername', true)),
            'email' => htmlspecialchars($this->input->post('inputEmail', true)),
            'password' => password_hash($this->input->post('inputPassword1'), PASSWORD_DEFAULT)
        ];
        $user = $this->register->create($data);
        if ($user) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Selamat, Pendaftaran berhasil!
              </div>');
            redirect('login');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Maaf, Pendaftaran tidak berhasil!
              </div>');
            redirect('register');
        }
    }
}
