<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_ki3_ki4 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Rekap_ki3_ki4_model', 'rekap_ki3_ki4');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Rekap KI3-KI4';
        $data['home'] = 'Rekap Nilai';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['kelas'] = $this->db->get('m_kelas')->row_array();
        // var_dump($data['data_pegawai']);
        // die;       
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_laporan/rekap_ki3_ki4/rekap_ki3_ki4_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_laporan/rekap_ki3_ki4/rekap_ki3_ki4_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_laporan/rekap_ki3_ki4/rekap_ki3_ki4_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tabel_ki3($id)
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $ta = substr($data['tasm'], 0, 4);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $semester = $get_tasm['semester'];

        $data['kelas'] = $this->db->select('a.*')
            ->from('t_kelas_siswa a')
            ->where(['a.id_kelas' =>  $id])
            ->group_by('a.rombel', 'ASC')
            ->get()->result_array();

        // $data['rombel'] =  $this->db->select('k.*')
        //     ->from('t_kelas_siswa k')
        //     ->where('k.kd_sekolah', $this->session->kd_sekolah)
        //     ->where(['k.ta' =>  $ta])
        //     ->group_by('rombel', 'ASC')
        //     ->get()->result_array();

        $this->load->view('akademik_laporan/rekap_ki3_ki4/rekap_ki3_ki4_table', $data);
    }

    public function mapel($id)
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Rekap KI3-KI4';
            $data['home'] = 'Rekap Nilai';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

            $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
            $data['tasm'] = $get_tasm['tahun'];
            $data['semester'] = substr($data['tasm'], -1, 1);

            $data['tampil'] = $this->rekap_ki3_ki4->get_tampil($id);
            // var_dump($data['tampil']);
            // die;
            $this->load->view('layout/header-top', $data);
            $this->load->view('akademik_laporan/rekap_ki3_ki4/rekap_ki3_ki4_css');
            $this->load->view('layout/header-bottom', $data);
            $this->load->view('layout/header-notif', $data);
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_laporan/rekap_ki3_ki4/rekap_ki3_ki4_mapel', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_laporan/rekap_ki3_ki4/rekap_ki3_ki4_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function rekap_ki3($id)
    {
        $this->benchmark->mark('code_start');
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $ta = substr($data['tasm'], 0, 4);

        $data['data'] = $this->rekap_ki3_ki4->detil_guru_ki3($id);
        $data['siswa'] = $this->rekap_ki3_ki4->get_detailsiswa_ki3($id);
        $data['header'] = $this->rekap_ki3_ki4->get_detailnilai_ki3($id);
        $data['nilai'] = $this->rekap_ki3_ki4->get_detailnilai_ki3($id);
        $data['nilai_pts'] = $this->rekap_ki3_ki4->get_detailnilai_pts_ki3($id);
        $data['nilai_pas'] = $this->rekap_ki3_ki4->get_detailnilai_pas_ki3($id);
        $data['kkm'] = $this->db->get_where('t_kkm', ['ta' => $ta])->result_array();

        // var_dump($data['data_pegawai']);
        // die;    
        $this->load->view('akademik_laporan/rekap_ki3_ki4/rekap_ki3_ki4_detail_ki3', $data);
        $this->benchmark->mark('code_end');
    }

    public function rekap_ki4($id)
    {
        $this->benchmark->mark('code_start');
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $ta = substr($data['tasm'], 0, 4);

        $data['data'] = $this->rekap_ki3_ki4->detil_guru_ki4($id);
        $data['siswa'] = $this->rekap_ki3_ki4->get_detailsiswa_ki4($id);
        $data['header'] = $this->rekap_ki3_ki4->get_detailnilai_ki4($id);
        $data['nilai'] = $this->rekap_ki3_ki4->get_detailnilai_ki4($id);

        $data['kkm'] = $this->db->get_where('t_kkm', ['ta' => $ta])->result_array();
        // var_dump($data['data_pegawai']);
        // die;    
        $this->load->view('akademik_laporan/rekap_ki3_ki4/rekap_ki3_ki4_detail_ki4', $data);
        $this->benchmark->mark('code_end');
    }
}
