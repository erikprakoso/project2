<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Syahbandar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Syahbandar_model', 'syahbandar');
    }

    public function index()
    {
        $data['title'] = 'Ship - Syahbandar';
        $data['name'] = $this->session->userdata('name');
        $data['syahbandar'] = $this->syahbandar->get_all();
        $data['main_view'] = 'syahbandar/index';
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $data_syahbandar = [
            'nama' => $this->input->post('name'),
            'alamat' => $this->input->post('address'),
            'kota' => $this->input->post('city'),
            'telp' => $this->input->post('telepon'),
        ];
        $tambah = $this->syahbandar->insert($data_syahbandar);
        $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
        $this->session->set_flashdata('info', $msg);
        redirect('syahbandar');
    }

    public function edit()
    {
        $data_syahbandar = [
            'nama' => $this->input->post('name'),
            'alamat' => $this->input->post('address'),
            'kota' => $this->input->post('city'),
            'telp' => $this->input->post('telepon'),
        ];
        $id = $this->input->post('syahbandar_id');
        $edit = $this->syahbandar->update($data_syahbandar, $id);
        $msg = $edit ? 'Berhasil diperbarui' : 'Gagal diperbarui';
        $this->session->set_flashdata('info', $msg);
        redirect('syahbandar');
    }

    public function delete()
    {
        $id = $this->input->post('syahbandar_id');
        $edit = $this->syahbandar->delete($id);
        $msg = $edit ? 'Berhasil dihapus' : 'Gagal dihapus';
        $this->session->set_flashdata('info', $msg);
        redirect('syahbandar');
    }
}
