<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kesiswaan_prestasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_aktif_login();
        cek_akses_user();
        $this->load->library('form_validation');
        $this->load->model('KesiswaanPrestasi_model', 'sch');
    }

    // master_foto
    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Prestasi';
        $data['home'] = 'Kesiswaan';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['foto'] = $this->sch->getFoto();
        // var_dump($data['pegawai']);
        // die;
        $this->load->view('layout/header-top',$data);
        $this->load->view('dashboard/dashboard_css');
        $this->load->view('layout/header-bottom');
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('data_kesiswaan/kesiswaan_prestasi/list_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('dashboard/dashboard_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function simpan_tambah()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_tambah();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Berhasil tambah data !!!</div>');
        redirect('data_kesiswaan/kesiswaan_prestasi');
    }

    public function simpan_edit()
    {
        // cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->sch->simpan_edit();
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert"> Berhasil ubah data !!!</div>');
        redirect('data_kesiswaan/kesiswaan_prestasi');
    }

    public function deldata($id)
    {
        $data = ['prestasi_id' => $id];
        $this->db->delete('profil_prestasi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Berhasil hapus data !!!</div>');
        redirect('data_kesiswaan/kesiswaan_prestasi');
    }
    // end master_foto   
}
