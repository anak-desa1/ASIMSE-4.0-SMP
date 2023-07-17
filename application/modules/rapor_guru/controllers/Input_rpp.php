<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_rpp extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Input_rpp_model', 'input_rpp');
    }

    public function index()
    {
        if ($this->form_validation->run() == false) {
            $this->benchmark->mark('code_start');
            $data['title'] = 'Input RPP';
            $data['home'] = 'Rapor Guru';
            $data['subtitle'] = $data['title'];
            $data['main_menu'] = main_menu();
            $data['sub_menu'] = sub_menu();
            $data['cek_akses'] = cek_akses_user();
            $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai'), 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
            $data['sekolah'] = $this->db->get('m_sekolah')->row_array();
            // var_dump($data['data_pegawai']);
            // die;  
            $data['tampil'] = $this->input_rpp->get_tampil();
            $data['guru'] = $this->input_rpp->get_gururombel();

            $this->load->view('layout/header-top',$data);
            $this->load->view('akademik_guru/input_rpp/input_rpp_css');
            $this->load->view('layout/header-bottom');
            $this->load->view('layout/header-notif');
            $this->load->view('layout/main-navigation', $data);
            $this->load->view('akademik_guru/input_rpp/input_rpp_v', $data);
            $this->load->view('layout/footer-top');
            $this->load->view('akademik_guru/input_rpp/input_rpp_js');
            $this->load->view('layout/footer-bottom');
            $this->benchmark->mark('code_end');
        } else {
        }
    }

    public function tambah_ki3()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['tampil'] = $this->input_rpp->get_tampil();
        $data['guru'] = $this->input_rpp->get_gururombel();
        $this->load->view('akademik_guru/input_rpp/input_rpp_css');
        $this->load->view('akademik_guru/input_rpp/input_rpp_ki3', $data);
        $this->load->view('akademik_guru/input_rpp/input_rpp_js');
    }

    public function tambah_ki4()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        $data['tampil'] = $this->input_rpp->get_tampil();
        $data['guru'] = $this->input_rpp->get_gururombel();
        $this->load->view('akademik_guru/input_rpp/input_rpp_css');
        $this->load->view('akademik_guru/input_rpp/input_rpp_ki4', $data);
        $this->load->view('akademik_guru/input_rpp/input_rpp_js');
    }

    function add_ajax_sekolah($id_cam)
    {
        $query = $this->db->get_where('l_sekolah', array('kd_campus' => $id_cam));
        $data = "<option value=''>- Select sekolah -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->kd_sekolah . "'>" . $value->nama_sekolah . "</option>";
        }
        echo $data;
    }

    function add_ajax_guru($id_gur)
    {
        $query = $this->db->get_where('pegawai', array('kd_sekolah' => $id_gur));
        $data = "<option value=''>- Select Guru -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->nik  . "'>" . $value->nama_pegawai . "</option>";
        }
        echo $data;
    }

    public function walikelas_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->atur_walikelas->walikelas_simpan();
    }

    public function del($id)
    {
        $data = ['wali_id' => $id];
        $this->db->delete('t_walikelas', $data);
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        redirect('akademik_aturrombel/atur_walikelas');
    }
}
