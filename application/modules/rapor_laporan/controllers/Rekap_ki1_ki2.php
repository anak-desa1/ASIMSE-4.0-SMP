<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_ki1_ki2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Rekap_ki1_ki2_model', 'rekap_ki1_ki2');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Rekap KI1-KI2';
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
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tabel_ki1($id)
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
            // ->join('t_kelas_siswa b', 'a.kd_sekolah = b.kd_sekolah', 'left')          
            ->where(['a.id_kelas' =>  $id])
            ->group_by('a.rombel', 'ASC')
            ->get()->result_array();

        // $data['rombel'] =  $this->db->select('k.*')
        //     ->from('t_kelas_siswa k')            
        //     ->where(['k.ta' =>  $ta])
        //     ->group_by('rombel', 'ASC')
        //     ->get()->result_array();

        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_table_ki1', $data);
    }

    public function tabel_ki2($id)
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
            // ->join('t_kelas_siswa b', 'a.kd_sekolah = b.kd_sekolah', 'left')          
            ->where(['a.id_kelas' =>  $id])
            ->group_by('a.rombel', 'ASC')
            ->get()->result_array();

        // $data['rombel'] =  $this->db->select('k.*')
        //     ->from('t_kelas_siswa k')
        //     // ->where('k.kd_sekolah', $this->session->kd_sekolah)
        //     ->where(['k.ta' =>  $ta])
        //     ->group_by('rombel', 'ASC')
        //     ->get()->result_array();

        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_table_ki2', $data);
    }

    public function detail_ki1($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Rekap KI1-KI2';
        $data['home'] = 'Rekap Nilai';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['data_nilai_pts'] = $this->rekap_ki1_ki2->ki1_data_pts($id);
        $data['data_nilai_pas'] = $this->rekap_ki1_ki2->ki1_data_pas($id);
        $data['kelas'] = $this->rekap_ki1_ki2->get_kelas($id);
        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->rekap_ki1_ki2->q_list_kd_ki1();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_detail_ki1', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function detail_ki2($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Rekap KI1-KI2';
        $data['home'] = 'Rekap Nilai';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
        
        $data['kelas'] = $this->rekap_ki1_ki2->get_kelas($id);
        $data['data_nilai_pts'] = $this->rekap_ki1_ki2->ki2_data_pts($id);
        $data['data_nilai_pas'] = $this->rekap_ki1_ki2->ki2_data_pas($id);
        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->rekap_ki1_ki2->q_list_kd_ki2()->result_array();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_detail_ki2', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_ki2_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function ki1_cetak_pts($id)
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data_nilai_pts'] = $this->rekap_ki1_ki2->ki1_data_pts($id);
        $data['kelas'] = $this->rekap_ki1_ki2->get_kelas($id);
        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->rekap_ki1_ki2->q_list_kd_ki1();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_cetak_pts', $data);
        $this->benchmark->mark('code_end');
    }

    public function ki1_cetak_pas($id)
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['data_nilai_pas'] = $this->rekap_ki1_ki2->ki1_data_pas($id);
        $data['kelas'] = $this->rekap_ki1_ki2->get_kelas($id);
        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->rekap_ki1_ki2->q_list_kd_ki1();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki1_cetak_pas', $data);
        $this->benchmark->mark('code_end');
    }

    public function ki2_cetak_pts($id)
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->rekap_ki1_ki2->get_kelas($id);
        $data['data_nilai_pts'] = $this->rekap_ki1_ki2->ki2_data_pts($id);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->rekap_ki1_ki2->q_list_kd_ki2()->result_array();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki2_cetak_pts', $data);
        $this->benchmark->mark('code_end');
    }

    public function ki2_cetak_pas($id)
    {
        $this->benchmark->mark('code_start');
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['kelas'] = $this->rekap_ki1_ki2->get_kelas($id);
        $data['data_nilai_pas'] = $this->rekap_ki1_ki2->ki2_data_pas($id);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        // var_dump($data['list_kd']);
        // die;
        $q_list_kd = $this->rekap_ki1_ki2->q_list_kd_ki2()->result_array();
        $array_kd = array();
        foreach ($q_list_kd as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd'] = $array_kd;
        $this->load->view('akademik_laporan/rekap_ki1_ki2/rekap_ki2_cetak_pas', $data);
        $this->benchmark->mark('code_end');
    }
}
