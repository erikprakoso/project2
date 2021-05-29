<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kapal extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kapal_model', 'kapal');
        $this->load->model('Syahbandar_model', 'syahbandar');
    }

    public function index()
    {
        $data['title'] = 'Ship - Kapal';
        $data['kapal'] = $this->kapal->get_all();
        $data['main_view'] = 'kapal/index';
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Ship - Tambah Kapal';
        $data['main_view'] = 'kapal/tambah';
        $this->form_validation->set_rules('kode_kapal', 'Kode Kapal', 'required|trim|is_unique[kapal.kode]');
        $this->form_validation->set_rules('syahbandar', 'Syahbandar', 'required|trim');
        $this->form_validation->set_rules('psatu', 'L1', 'required|trim');
        $this->form_validation->set_rules('pdua', 'L2', 'required|trim|numeric');
        $this->form_validation->set_rules('lebar_kapal', 'B', 'required|trim');
        $this->form_validation->set_rules('tinggi_kapal', 'H', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $syahbandar = $this->syahbandar->get_all();
            foreach ($syahbandar as $sup) {
                $option_syahbandar[$sup['id']] = $sup['nama'];
            }
            $data['syahbandar'] = $option_syahbandar;
            return $this->load->view('template', $data);
        }
        $config = [
            'upload_path' => FCPATH . '/assets/images/',
            'allowed_types' => 'gif|jpg|png',
            'max_size'  => 2000,
            'file_name' => uniqid(date('Y-m-d-h-i-s_')),
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('info', $error);
            return redirect('kapal/tambah');
        }
        $data_kapal = [
            'kode' => $this->input->post('kode_kapal'),
            'syahbandar_id' => $this->input->post('syahbandar'),
            'nama_kapal' => $this->input->post('nama'),
            'psatu' => $this->input->post('psatu'),
            'pdua' => $this->input->post('pdua'),
            'lebar_kapal' => $this->input->post('lebar_kapal'),
            'tinggi_kapal' => $this->input->post('tinggi_kapal'),
            'foto' => $this->upload->data('file_name'),
        ];
        $tambah = $this->kapal->create($data_kapal);
        $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
        $this->session->set_flashdata('info', $msg);
        redirect('kapal');
    }

    public function hapus($kode = null)
    {
        if (!$kode) return show_404();
        $kapal = $this->kapal->getByKode($kode);
        $path = FCPATH . 'assets/images/' . $kapal->foto;
        if (file_exists($path)) {
            unlink($path);
        }
        $this->db->delete('kapal', ['kode' => $kode]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('kapal');
    }

    public function ubah($kode = null)
    {
        if (!$kode) return show_404();
        // $this->form_validation->set_rules('kode_kapal', 'Kode Kapal', 'required|trim|is_unique[kapal.kode]');
        $this->form_validation->set_rules('syahbandar', 'Syahbandar', 'required|trim');
        $this->form_validation->set_rules('psatu', 'L1', 'required|trim');
        $this->form_validation->set_rules('pdua', 'L2', 'required|trim|numeric');
        $this->form_validation->set_rules('lebar_kapal', 'B', 'required|trim');
        $this->form_validation->set_rules('tinggi_kapal', 'H', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah Kapal';
            $data['main_view'] = 'kapal/ubah';
            $data['kapal'] = $this->kapal->getByKode($kode);
            $syahbandar = $this->syahbandar->get_all();
            foreach ($syahbandar as $sup) {
                $option_syahbandar[$sup['id']] = $sup['nama'];
            }
            $data['syahbandar'] = $option_syahbandar;
            $this->load->view('template', $data);
        } else {
            $data_kapal = [
                // 'kode' => $this->input->post('kode_kapal'),
                'syahbandar_id' => $this->input->post('syahbandar'),
                'nama_kapal' => $this->input->post('nama'),
                'psatu' => $this->input->post('psatu'),
                'pdua' => $this->input->post('pdua'),
                'lebar_kapal' => $this->input->post('lebar_kapal'),
                'tinggi_kapal' => $this->input->post('tinggi_kapal'),
            ];
            if ($_FILES['foto']['error'] !== 4) {
                $config = [
                    'upload_path' => FCPATH . '/assets/images/',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size'  => 2000,
                    'file_name' => uniqid(date('Y-m-d-h-i-s_')),
                ];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('foto')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('info', $error);
                    return redirect("kapal/ubah/{$kode}");
                }
                $data_kapal['foto'] = $this->upload->data('file_name');
                $foto_lama = $this->input->post('foto_lama');
                $path_foto_lama = FCPATH . "/assets/images/{$foto_lama}";
                if (file_exists($path_foto_lama)) unlink($path_foto_lama);
            }
            $ubah = $this->kapal->update($data_kapal, $kode);
            $msg = $ubah ? 'Berhasil diubah' : 'Gagal diubah';
            $this->session->set_flashdata('info', $msg);
            redirect('kapal');
        }
    }

    public function getAjax($kode = null)
    {
        $kapal = $this->db->get_where('kapal', ['kode' => $kode])->row();
        $kapal->foto = base_url('assets/images/') . $kapal->foto;
        $kapal = json_encode($kapal);
        echo $kapal;
    }
}
