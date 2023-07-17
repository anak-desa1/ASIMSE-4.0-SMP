<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leger extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Leger_model', 'leger');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Leger';
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
        $this->load->view('akademik_laporan/leger/leger_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_laporan/leger/leger_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_laporan/leger/leger_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tabel($id)
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

        $this->load->view('akademik_laporan/leger/leger_table', $data);
    }

    public function detail($id)
    {
        $this->benchmark->mark('code_start');
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data'] = $this->leger->get_guru($id);
        $data['siswa'] = $this->leger->get_detailsiswa($id);
        $data['header'] = $this->leger->get_detailnilai_ki3($id);
        $data['nilai'] = $this->leger->get_detailnilai_ki3($id);
        $data['nilai_k'] = $this->leger->get_detailnilai_ki4($id);
        // var_dump($data['nilai_k']);
        // die;
        // $data['mapel'] = $this->db->get_where('m_mapel', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'ASC'])->result_array();
        $data['mapel'] = $this->leger->get_mapel($id);

        // $data['mapel'] = $this->leger->get_mapel($id);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $tasm = $get_tasm['tahun'];

        $data['kelas'] = $this->leger->get_kelas();
        // $data['siswa_kelas'] = $this->leger->get_siswa_add_pas();
        // $data['absen_siswa'] = $this->db->get_where('t_nilai_absensi', ["penilaian" => 'PAS'])->result_array();
        $data['absen_siswa'] = $this->db->get_where('t_nilai_absensi', ["penilaian" => 'PAS', 'tasm' => $tasm])->result_array();

        // var_dump($data['data_pegawai']);
        // die;    
        $this->load->view('akademik_laporan/leger/leger_detail', $data);
        $this->benchmark->mark('code_end');
    }
}
