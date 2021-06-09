<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model', 'login');
    }

    public function index()
    {
        $this->form_validation->set_rules(
            'inputEmail',
            'Email',
            'required|trim'
        );
        $this->form_validation->set_rules(
            'inputPassword',
            'Password',
            'required|trim|min_length[5]'
        );

        if ($this->session->userdata('name')) {
            redirect('dashboard');
        } else {
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login';
                $this->load->view('login/index', $data);
            } else {
                $this->_login();
            }
        }
    }

    private function _login()
    {
        $email = $this->input->post('inputEmail');
        $password = $this->input->post('inputPassword');

        $user = $this->login->get_user_by_email($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'logged_in' => true,
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'user_id' => $user['id'],
                    'role' => $user['role'],
                    'status' => $user['status']
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Masukkan Password yang benar.
          </div>');
                redirect('/');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        	Email belum terdaftar atau Email belum diaktivasi.
          </div>');
            redirect('/');
        }
    }
}
