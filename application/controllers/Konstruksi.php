<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konstruksi extends CI_Controller
{

    private $array_kapal = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Konstruksi_model', 'konstruksi');
    }

    public function index()
    {
        $data['title'] = 'Data konstruksi';
        $konstruksi = $this->konstruksi->get_all()->result();
        foreach ($konstruksi as $key => $value) {
            $konstruksi[$key]->kapal = $this->konstruksi->get_kapal($value->id)->result();
        }
        $data['konstruksi'] = $konstruksi;
        $data['main_view'] = 'konstruksi/index';
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah konstruksi';
        $data['main_view'] = 'konstruksi/tambah';
        $this->load->model('Kapal_model');
        $data['kapal'] = $this->Kapal_model->get_all();
        $this->load->view('template', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('owner', 'Owner', 'required|trim|alpha_numeric_spaces');
        $this->form_validation->set_rules('data_kapal', 'Kapal', 'callback__data_kapal_check');
        if ($this->form_validation->run() == FALSE) {
            $response = [
                'status' => false,
                'message' => 'form error',
                'error' => validation_errors('<div class="alert alert-danger">', '</div>'),
            ];
            echo json_encode($response);
            return;
        }
        $data_konstruksi = [
            'tgl' => date('Y-m-d h:i:s'),
            'owner' => $this->input->post('owner'),
            'user_id' => $this->session->userdata('user_id'),
        ];
        $tambah = $this->konstruksi->create($data_konstruksi);
        $konstruksi_id = $this->db->insert_id();

        $detail_konstruksi = [];
        foreach ($this->array_kapal as $key => $ob) {
            $detail_konstruksi[$key] = [
                'konstruksi_id' => $konstruksi_id,
                'kode_kapal' => $ob->kode,
                'jumlah' => $ob->jumlah,
            ];
        }
        $this->konstruksi->create_detail($detail_konstruksi);
        $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
        $response = [
            'status' => true,
            'message' => $msg,
        ];
        echo json_encode($response);
        return;
    }

    public function _data_kapal_check($value)
    {
        $this->array_kapal = json_decode($value);
        if (empty($this->array_kapal)) {
            $this->form_validation->set_message('_data_kapal_check', 'The {field} can not be empty');
            return false;
        }
        foreach ($this->array_kapal as $ob) {
            $kapal = $this->db->get_where('kapal', ['kode' => $ob->kode])->row();
            if (!$kapal) {
                $this->form_validation->set_message('_data_kapal_check', 'Data {field} tidak ditemukan');
                return false;
            }
            if ((int)$kapal->pdua < $ob->jumlah) {
                $this->form_validation->set_message('_data_kapal_check', "Gagal!, Pdua {$kapal->nama_kapal} tersisa {$kapal->pdua} anda menginput {$ob->jumlah}");
                return false;
            }
        }
        return true;
    }

    public function hapus($id = null)
    {
        if (!$id) return show_404();
        $this->db->delete('konstruksi', ['id' => $id]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('konstruksi');
    }
}
