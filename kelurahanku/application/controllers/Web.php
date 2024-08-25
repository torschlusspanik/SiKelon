<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('tglindo');
        $this->load->model('Web_model', 'web');
    }

    public function index()
    {
        $data['title'] = 'Sistem Informasi pelayanan desa jombatan';
        $data['profile'] = $this->db->get('profile_desa')->row_array();
        

        $this->load->view('web/index', $data);
    }

    public function input_pesan()
    {
        $data = [
            'tgl_pesan' => date('Y/m/d'),
            'nama_pesan' => $this->input->post('nama_pesan', true),
            'email_pesan' => $this->input->post('email_pesan', true),
            'subyek_pesan' => $this->input->post('subyek_pesan', true),
            'pesan' => $this->input->post('pesan', true)
        ];
        $this->db->insert('tb_pesan', $data);
        $this->session->set_flashdata('message', 'Kirim Pesan');
        redirect('web/index');
    }
}
