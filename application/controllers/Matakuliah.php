<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Matakuliah_model', 'matakuliah');
    }

    public function index()
    {
        $data['title'] = 'Mata Kuliah';
        $data['matakuliah'] = $this->matakuliah->get_all();
        $data['main_view'] = 'matakuliah/index';
        $this->load->view('template', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Mata Kuliah';
        $data['main_view'] = 'matakuliah/index';
        $config = [
            'upload_path' => FCPATH . '/assets/images/',
            'allowed_types' => 'gif|jpg|png',
            'max_size'  => 2000,
            'file_name' => uniqid(date('Y-m-d-h-i-s_')),
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('monitoring')) {
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('info', $error);
            return redirect('matakuliah/index');
        }

        $data = [
            'matkul_id' => $this->input->post('matkul_id'),
            'nama_materi' => $this->input->post('nama_materi'),
            'tanggal_pengajaran' => $this->input->post('tanggal_pengajaran'),
            'hasil_monitoring' => $this->upload->data('file_name')
        ];
        $tambah = $this->matakuliah->create($data);
        $msg = $tambah ? 'Berhasil ditambah' : 'Gagal ditambah';
        $this->session->set_flashdata('info', $msg);
        redirect('matakuliah');
    }

    public function edit($matkul_id = null)
    {
        if (!$matkul_id) return show_404();
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required|trim');
        $this->form_validation->set_rules('tanggal_pengajaran', 'Tanggal Pengajaran', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Ubah Mata Kuliah';
            $data['main_view'] = 'matakuliah/ubah';
            $data['matkul'] = $this->matakuliah->getByKode($matkul_id);
            $this->load->view('template', $data);
        } else {
            $data = [
                'nama_materi' => $this->input->post('nama_materi'),
                'tanggal_pengajaran' => $this->input->post('tanggal_pengajaran'),
            ];
            if ($_FILES['monitoring']['error'] !== 4) {
                $config = [
                    'upload_path' => FCPATH . '/assets/images/',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size'  => 2000,
                    'file_name' => uniqid(date('Y-m-d-h-i-s_')),
                ];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('monitoring')) {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('info', $error);
                    return redirect("matakuliah/ubah/{$matkul_id}");
                }
                $data['hasil_monitoring'] = $this->upload->data('file_name');
                $foto_lama = $this->input->post('foto_lama');
                $path_foto_lama = FCPATH . "/assets/images/{$foto_lama}";
                if (file_exists($path_foto_lama)) unlink($path_foto_lama);
            }
            $ubah = $this->matakuliah->update($data, $matkul_id);
            $msg = $ubah ? 'Berhasil diubah' : 'Gagal diubah';
            $this->session->set_flashdata('info', $msg);
            redirect('matakuliah');
        }
    }

    public function delete($kode = null)
    {
        if (!$kode) return show_404();
        $matakuliah = $this->matakuliah->getByKode($kode);
        $path = FCPATH . 'assets/images/' . $matakuliah->hasil_monitoring;
        if (file_exists($path)) {
            unlink($path);
        }
        $this->db->delete('mata_kuliahs', ['matkul_id' => $kode]);
        $this->session->set_flashdata('info', 'Berhasil dihapus');
        redirect('matakuliah');
    }
}
