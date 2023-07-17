<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ketuntasan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Ketuntasan_model', 'ketuntasan');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Ketuntasan Belajar Siswa';
        $data['home'] = 'Rekap Nilai';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        // var_dump($data['ta']);
        // die;
        $data['kelas'] = $this->db->get('m_kelas')->row_array();

        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_laporan/ketuntasan/ketuntasan_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_laporan/ketuntasan/ketuntasan_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_laporan/ketuntasan/ketuntasan_js');
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
     
        $this->load->view('akademik_laporan/ketuntasan/ketuntasan_table', $data);
    }

    public function siswa($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Ketuntasan Belajar Siswa';
        $data['home'] = 'Rekap Nilai';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['data'] = $this->ketuntasan->get_siswa($id);
        // var_dump($data['data_pegawai']);
        // die;       
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_laporan/ketuntasan/ketuntasan_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_laporan/ketuntasan/ketuntasan_siswa', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_laporan/ketuntasan/ketuntasan_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function detail($id, $target)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Ketuntasan Belajar Siswa';
        $data['home'] = 'Rekap Nilai';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['header'] = $this->ketuntasan->get_header($id, $target);
        $data['mapel'] = $this->ketuntasan->get_pasmapel($id, $target);
        $data['kelas'] = $this->db->get_where('t_kelas_siswa', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'rombel' => $id])->row_array();
        $data['siswa'] = $this->db->get_where('m_siswa', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'nis' => $target])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tahun'] = $this->db->get_where('t_tahun', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'aktif' => 'Y'])->row_array();
        $data['footer_1'] = $this->ketuntasan->get_footer_1($id, $target);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['semester'] = $get_tasm['semester'];
        // pengetahuan dan keterampilan
        $data['kkm'] = $this->ketuntasan->get_min($id, $target);
        // var_dump($data['kkm']);
        // die;
        $data['nilai_p'] = $this->ketuntasan->get_nilai_p($id, $target);
        $data['nilai_pts'] = $this->ketuntasan->get_nilai_pts($id, $target);
        $data['nilai_pas'] = $this->ketuntasan->get_nilai_pas($id, $target);
        $data['nilai_k'] = $this->ketuntasan->get_nilai_k($id, $target);
        // end pengetahuan dan keterampilan       
        // $this->load->view('layout/header-top');
        // $this->load->view('akademik_laporan/ketuntasan/ketuntasan_css');
        // $this->load->view('layout/header-bottom');
        // $this->load->view('layout/header-notif');
        // $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_laporan/ketuntasan/ketuntasan_detail', $data);
        // $this->load->view('layout/footer-top');
        // $this->load->view('akademik_laporan/ketuntasan/ketuntasan_js');
        // $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function mpdf($id, $target)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['header'] = $this->ketuntasan->get_header($id, $target);
        $data['mapel'] = $this->ketuntasan->get_pasmapel($id, $target);

        $data['kelas'] = $this->db->get_where('t_kelas_siswa', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'rombel' => $id])->row_array();
        $data['siswa'] = $this->db->get_where('m_siswa', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'nis' => $target])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tahun'] = $this->db->get_where('t_tahun', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'aktif' => 'Y'])->row_array();
        $data['footer_1'] = $this->ketuntasan->get_footer_1($id, $target);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['semester'] = $get_tasm['semester'];
        // pengetahuan dan keterampilan
        $data['kkm'] = $this->ketuntasan->get_min($id, $target);
        // var_dump($data['kkm']);
        // die;
        $data['nilai_p'] = $this->ketuntasan->get_nilai_p($id, $target);
        $data['nilai_pts'] = $this->ketuntasan->get_nilai_pts($id, $target);
        $data['nilai_pas'] = $this->ketuntasan->get_nilai_pas($id, $target);
        $data['nilai_k'] = $this->ketuntasan->get_nilai_k($id, $target);
        // end pengetahuan dan keterampilan  

        $siswa = $this->db->get_where('m_siswa', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'nis' => $target])->row_array();
        $kelas = $this->db->get_where('t_kelas_siswa', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'rombel' => $id])->row_array();
        $sekolah = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        // Set the new Header before you AddPage
        $mpdf->SetHeader('  
        <table width="100%">
        <tr>
            <td align="center">
                <img src="' . base_url() . 'dist/upload/logo/logo.png" style="width:72%;max-width:72px">
            </td>
            <td align="center">
                <h2>LAPORAN PENGOLAHAN NILAI <br>
                    KETUNTASAN UNTUK KENAIKAN KELAS <br>
                    YPK ORA et LABORA <br>
                    <p style="font-size:12px"><i>Website : http://www.oel.sch.id</i></p>
                    <h2>
            </td>
        </tr>
        </table>');
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('akademik_laporan/ketuntasan/ketuntasan_pdf', $data, TRUE);
        $mpdf->WriteHTML($html1);


        // // Set the new Header before you AddPage
        // $mpdf->SetHeader();
        // $mpdf->AddPage();

        // // Set the new Footer after you AddPage
        // $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
        //     <tr>
        //         <td width="25%">{PAGENO}/{nbpg} | {DATE j-m-Y}</td>
        //         <td width="0%" align="center"></td>
        //         <td width="75%" style="text-align: right;  "><p>' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['nama'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
        //     </tr>
        // </table>');
        // $html2 = $this->load->view('akademik_walikelas/cetak_rapor_pts/cetak_rapor_pts_pdf_2', $data, TRUE);
        // $mpdf->WriteHTML($html2);

        $siswa  = $this->db->get_where('m_siswa', ['kd_sekolah' => $this->session->userdata('kd_sekolah'), 'nis' => $target])->row_array();
        $nama_file_pdf = ($siswa['nama']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
        // $mpdf->Output($nama_dokumen . ".pdf", 'I');
        // var_dump($data['nilai_pts']);
        // die;
    }
}
