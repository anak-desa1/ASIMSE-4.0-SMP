<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_tugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Input_tugas_model', 'input_tugas');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input Tugas';
            $data['home'] = 'Guru Mapel';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();

            $get_tasm = $this->db->query("SELECT tahun FROM t_tahun WHERE aktif = 'Y'")->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['semester'] = substr($data['tasm'], -1, 1);

            $data['tampil'] = $this->input_tugas->get_tampil();
            // var_dump($data['tampil']);
            // die;
            $this->load->view('layout/header-top');
            $this->load->view('akademik_guru/input_tugas/input_tugas_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru/input_tugas/input_tugas_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru/input_tugas/input_tugas_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }
}
