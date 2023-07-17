<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_rapor_pts extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('cetak_rapor_pts_model', 'cetak_rapor_pts');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Cetak Rapor PTS ';
        $data['home'] = 'Walikelas';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['data'] = $this->cetak_rapor_pts->get_siswa();
        // var_dump($data['data_pegawai']);
        // die;       
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_walikelas/cetak_rapor_pts/cetak_rapor_pts_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_walikelas/cetak_rapor_pts/cetak_rapor_pts_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_walikelas/cetak_rapor_pts/cetak_rapor_pts_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    // public function detail($id, $target)
    // {
    //     $this->benchmark->mark('code_start');
    //     $data['title'] = 'Cetak Rapor PTS ';
    //     $data['home'] = 'Cetak';
    //    $data['subtitle'] = $data['title'];
    //         $data['main_menu'] = main_menu();
    //         $data['sub_menu'] = sub_menu();
    //         $data['cek_akses'] = cek_akses_user();
    //         $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
    //         $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

    //     $data['header'] = $this->cetak_rapor_pts->get_header($id, $target);
    //     $data['mapel'] = $this->cetak_rapor_pts->get_ptsmapel($id, $target);
    //     $data['kelas'] = $this->db->get_where('m_kelas', [ 'tingkat' => $id])->row_array();
    //     $data['siswa'] = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
    //     $data['sekolah'] = $this->db->get_where('m_sekolah', ['kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
    //     $data['tahun'] = $this->db->get_where('t_tahun', [ 'aktif' => 'Y'])->row_array();
    //     $data['footer_1'] = $this->cetak_rapor_pts->get_footer_1($id, $target);
    //     // $data['footer_2'] = $this->cetak_rapor_pts->get_footer_2($id, $target);
    //     // sikap
    //     $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
    //     $data['tasm'] = $get_tasm['tahun'];
    //     $data['ta'] = substr($data['tasm'], 4);
    //     $data['tah'] = substr($data['tasm'], 0, 4);

    //     $data['predikat_sp'] = $this->cetak_rapor_pts->get_sp($id, $target);
    //     $data['selalu_sp'] = $this->cetak_rapor_pts->get_sp($id, $target);

    //     $q_list_kd_sp = $this->cetak_rapor_pts->q_list_kd_sp()->result_array();
    //     $array_kd = array();
    //     foreach ($q_list_kd_sp as $v) {
    //         $idx = $v['kd_id'];
    //         $val = $v['nama_kd'];
    //         $array_kd[$idx] = $val;
    //     }
    //     $data['list_kd_sp'] = $array_kd;
    //     $data['mulai_meningkat_sp'] = $this->cetak_rapor_pts->get_sp_mm($id, $target);

    //     $data['predikat_so'] = $this->cetak_rapor_pts->get_so($id, $target);
    //     $data['selalu_so'] = $this->cetak_rapor_pts->get_so($id, $target);

    //     $q_list_kd_so = $this->cetak_rapor_pts->q_list_kd_so()->result_array();
    //     $array_kd = array();
    //     foreach ($q_list_kd_so as $v) {
    //         $idx = $v['kd_id'];
    //         $val = $v['nama_kd'];
    //         $array_kd[$idx] = $val;
    //     }
    //     $data['list_kd_so'] = $array_kd;
    //     $data['mulai_meningkat_so'] = $this->cetak_rapor_pts->get_so_mm($id, $target);

    //     // end sikap
    //     // pengetahuan dan keterampilan
    //     $data['kkm'] = $this->db->get('t_kkm')->result_array();
    //     $data['nilai_p'] = $this->cetak_rapor_pts->get_nilai_p($id, $target);
    //     $data['nilai_k'] = $this->cetak_rapor_pts->get_nilai_k($id, $target);
    //     $data['nilai_pts'] = $this->cetak_rapor_pts->get_nilai_pts($id, $target);
    //     // end pengetahuan dan keterampilan
    //     // absensi
    //     $data['absen_siswa'] = $this->cetak_rapor_pts->get_absensi($id, $target);
    //     // var_dump($data['absen_siswa']);
    //     // die;
    //     // end absensi
    //     // catatan
    //     $data['catatan'] = $this->cetak_rapor_pts->get_catatan($id, $target);
    //     // end catatan
    //     $this->load->view('layout/header-top', $data);
    //     $this->load->view('akademik_walikelas/cetak_rapor_pts/cetak_rapor_pts_css');
    //     $this->load->view('layout/header-bottom', $data);
    //     $this->load->view('layout/header-notif');
    //     $this->load->view('layout/main-navigation', $data);
    //     $this->load->view('akademik_walikelas/cetak_rapor_pts/cetak_rapor_pts_detail', $data);
    //     $this->load->view('layout/footer-top');
    //     $this->load->view('akademik_walikelas/cetak_rapor_pts/cetak_rapor_pts_js');
    //     $this->load->view('layout/footer-bottom');
    //     $this->benchmark->mark('code_end');
    // }

    public function mpdf($id, $target)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        $data['header'] = $this->cetak_rapor_pts->get_header($id, $target);
        $data['mapel'] = $this->cetak_rapor_pts->get_ptsmapel($id, $target);
        $data['kelas'] = $this->db->get_where('t_kelas_siswa', [ 'rombel' => $id])->row_array();
        $data['siswa'] = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['tahun'] = $this->db->get_where('t_tahun', [ 'aktif' => 'Y'])->row_array();
        // sikap
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $data['tah'] = substr($data['tasm'], 0, 4);

        $data['predikat_sp'] = $this->cetak_rapor_pts->get_sp($id, $target);
        $data['selalu_sp'] = $this->cetak_rapor_pts->get_sp($id, $target);
        $q_list_kd_sp = $this->cetak_rapor_pts->q_list_kd_sp()->result_array();
        $array_kd = array();
        foreach ($q_list_kd_sp as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd_sp'] = $array_kd;
        $data['mulai_meningkat_sp'] = $this->cetak_rapor_pts->get_sp_mm($id, $target);

        $data['predikat_so'] = $this->cetak_rapor_pts->get_so($id, $target);
        $data['selalu_so'] = $this->cetak_rapor_pts->get_so($id, $target);
        $q_list_kd_so = $this->cetak_rapor_pts->q_list_kd_so()->result_array();
        $array_kd = array();
        foreach ($q_list_kd_so as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd_so'] = $array_kd;
        $data['mulai_meningkat_so'] = $this->cetak_rapor_pts->get_so_mm($id, $target);
        //end sikap

        // pengetahuan dan keterampilan
        $data['kkm'] = $this->db->get('t_kkm')->result_array();
        $data['nilai_p'] = $this->cetak_rapor_pts->get_nilai_p($id, $target);
        $data['nilai_k'] = $this->cetak_rapor_pts->get_nilai_k($id, $target);
        $data['nilai_pts'] = $this->cetak_rapor_pts->get_nilai_pts($id, $target);
        // end pengetahuan dan keterampilan    
        $data['kota'] = $this->cetak_rapor_pts->get_kota();
        $siswa  = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $kelas =  $this->db->get_where('t_kelas_siswa', [ 'rombel' => $id])->row_array();
        $sekolah = $this->db->get_where('m_sekolah')->row_array();

        // Set the new Header before you AddPage
        $mpdf->SetHeader('  
        <table width="100%">
        <tr>
            <td align="center">
                <img src="' . base_url() . 'panel/dist/upload/logo/'.$sekolah['logo'].'" style="width:100%;max-width:100px">
            </td>
            <td align="center">
                <h2>LAPORAN HASIL BELAJAR <br>
                    PENILAIAN TENGAH SEMESTER (PTS) <br>
                    '.$sekolah['nama_sekolah'].' <br>
                    <p style="font-size:12px"><i>Website : '.$sekolah['web'].'</i></p>
                    <h2>
            </td>
        </tr>
        </table>');
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right; font-size:10px;"><p>' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('akademik_walikelas/cetak_rapor_pts/cetak_rapor_pts_pdf_1', $data, TRUE);
        $mpdf->WriteHTML($html1);

        // absensi
        $data['absen_siswa'] = $this->cetak_rapor_pts->get_absensi($id, $target);
        // end absensi
        // catatan
        $data['catatan'] = $this->cetak_rapor_pts->get_catatan($id, $target);
        // end catatan
        $data['footer_1'] = $this->cetak_rapor_pts->get_footer_1($id, $target);
        $data['footer_2'] = $this->cetak_rapor_pts->get_footer_2($id, $target);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right; font-size:10px;"><p>' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html2 = $this->load->view('akademik_walikelas/cetak_rapor_pts/cetak_rapor_pts_pdf_2', $data, TRUE);
        $mpdf->WriteHTML($html2);

        $siswa  = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $nama_file_pdf = ($siswa['nama']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
        // $mpdf->Output($nama_dokumen . ".pdf", 'I');
        // var_dump($data['nilai_pts']);
        // die;
    }
}
