<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_sikap_sp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();

        $data['url'] = "akademik_walikelas/nilai_sikap_sp";
        $data['idnya'] = "setmapel";
        $data['nama_form'] = "f_nilai_sso";

        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Nilai_sikap_sp_model', 'nilai_sikap_sp');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Nilai Sikap Spiritual';
        $data['home'] = 'Akademik Walikelas';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $data['data_nilai_pts'] = $this->nilai_sikap_sp->tampil_data_pts();
        $data['data_nilai_pas'] = $this->nilai_sikap_sp->tampil_data_pas();
        $data['kelas'] = $this->nilai_sikap_sp->get_kelas();

        // var_dump($data['data_nilai_pts']);
        // die;
        $q_list_kd = $this->nilai_sikap_sp->q_list_kd();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_pts()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Nilai Sikap Spiritual';
        $data['home'] = 'Akademik Walikelas';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $data['kelas'] = $this->nilai_sikap_sp->get_kelas_pts();
        $data['siswa_kelas'] = $this->nilai_sikap_sp->get_siswa_pts();
        $data['list_kd'] = $this->nilai_sikap_sp->q_list_kd_pts();
        // var_dump($data['siswa_kelas']);
        // die;
        $data['p_predikat'] = array('Sangat Baik' => 'Sangat Baik', 'Baik' => 'Baik', 'Cukup' => 'Cukup', 'Kurang' => 'Kurang', 'Perlu Bimbingan' => 'Perlu Bimbingan');
        $data['url'] = "akademik_walikelas/nilai_sikap_sp/";
        $data['nama_form'] = "f_nilai_ssp";
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_tambah_pts', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_pas()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Nilai Sikap Spiritual';
        $data['home'] = 'Akademik Walikelas';
        $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        $data['kelas'] = $this->nilai_sikap_sp->get_kelas_pas();
        $data['siswa_kelas'] = $this->nilai_sikap_sp->get_siswa_pas();
        $data['list_kd'] = $this->nilai_sikap_sp->q_list_kd_pas();
        // var_dump($data['siswa_kelas']);
        // die;
        $data['p_predikat'] = array('Sangat Baik' => 'Sangat Baik', 'Baik' => 'Baik', 'Cukup' => 'Cukup', 'Kurang' => 'Kurang', 'Perlu Bimbingan' => 'Perlu Bimbingan');
        $data['url'] = "akademik_walikelas/nilai_sikap_sp/";
        $data['nama_form'] = "f_nilai_ssp";
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_tambah_pas', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }


    public function simpan_nilai_pts()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_sikap_sp->simpan_nilai_pts();
        // var_dump($this->nilai_sikap_sp->simpan_nilai());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Nilai Sikap ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_sikap_sp/tambah_pts');
    }

    public function simpan_nilai_pas()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_sikap_sp->simpan_nilai_pas();
        // var_dump($this->nilai_sikap_sp->simpan_nilai());
        // die;
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Tambah Nilai Sikap ! </h5>
        </div>
        ');
        redirect('akademik_walikelas/nilai_sikap_sp/tambah_pas');
    }

    public function cetak_pts()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['data_nilai_pts'] = $this->nilai_sikap_sp->tampil_data_pts();
        $data['kelas'] = $this->nilai_sikap_sp->get_kelas();
        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->nilai_sikap_sp->q_list_kd();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_cetak_pts', $data);
        $this->benchmark->mark('code_end');
    }

    public function cetak_pas()
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['data_nilai_pas'] = $this->nilai_sikap_sp->tampil_data_pas();
        $data['kelas'] = $this->nilai_sikap_sp->get_kelas();
        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->nilai_sikap_sp->q_list_kd();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('akademik_walikelas/nilai_sikap_sp/nilai_sikap_sp_cetak_pas', $data);
        $this->benchmark->mark('code_end');
    }
}
