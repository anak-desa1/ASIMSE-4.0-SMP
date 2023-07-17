<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_rapor_pas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('Ciqrcode');
        $this->load->model('Cetak_rapor_pas_model', 'cetak_rapor_pas');
    }

    public function index()
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Cetak Rapor PAS';
        $data['home'] = 'Walikelas';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['data'] = $this->cetak_rapor_pas->get_siswa();
        
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $ta = substr($data['tasm'], 4);
        $data['tah'] = substr($data['tasm'], 0, 4);
        
        // var_dump($data['data_pegawai']);
        // die;       
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif');
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }
    
    public function QRcode($codenya)
    {
        QRcode::png(
            $codenya,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 6,
            $margin = 2
        );
    }

    public function detail($id, $target, $th)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Cetak Rapor PAS';
        $data['home'] = 'Cetak';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['header'] = $this->cetak_rapor_pas->get_header($id, $target);
        $data['mapel'] = $this->cetak_rapor_pas->get_pasmapel($id, $target);
        $data['kelas'] = $this->db->get_where('t_kelas_siswa', [ 'rombel' => $id])->row_array();
        $data['siswa'] = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah',)->row_array();
        $data['tahun'] = $this->db->get_where('t_tahun', [ 'aktif' => 'Y'])->row_array();
        $data['footer_1'] = $this->cetak_rapor_pas->get_footer_1($id, $target);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $data['tah'] = substr($data['tasm'], 0, 4);

        // sikap
        $data['predikat_sp'] = $this->cetak_rapor_pas->get_sp($id, $target);
        $data['selalu_sp'] = $this->cetak_rapor_pas->get_sp($id, $target);
        $q_list_kd_sp = $this->cetak_rapor_pas->q_list_kd_sp()->result_array();
        $array_kd = array();
        foreach ($q_list_kd_sp as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd_sp'] = $array_kd;
        $data['mulai_meningkat_sp'] = $this->cetak_rapor_pas->get_sp_mm($id, $target);

        $data['predikat_so'] = $this->cetak_rapor_pas->get_so($id, $target);
        $data['selalu_so'] = $this->cetak_rapor_pas->get_so($id, $target);
        $q_list_kd_so = $this->cetak_rapor_pas->q_list_kd_so()->result_array();
        $array_kd = array();
        foreach ($q_list_kd_so as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd_so'] = $array_kd;
        $data['mulai_meningkat_so'] = $this->cetak_rapor_pas->get_so_mm($id, $target);
        // end sikap
        // pengetahuan dan keterampilan
        $data['kkm_in'] = $this->cetak_rapor_pas->get_min($id, $target);
        // var_dump($data['kkm']);
        // die;
        $data['kkm'] = $this->db->get('t_kkm')->result_array();
        $data['nilai_p'] = $this->cetak_rapor_pas->get_nilai_p($id, $target);

        $data['nilai_k'] = $this->cetak_rapor_pas->get_nilai_k($id, $target);
        // end pengetahuan dan keterampilan
        // ekstrakurikuler
        $data['ekskul'] = $this->cetak_rapor_pas->get_ekskul($id, $target);
        // end ekstrakurikuler
        // tinggi_berat
        $data['tinggi_berat_1'] = $this->cetak_rapor_pas->get_tinggi_berat_1($id, $target);
        $data['tinggi_berat_2'] = $this->cetak_rapor_pas->get_tinggi_berat_2($id, $target);
        // end tinggi_berat
        // kesehatan
        $data['kesehatan'] = $this->cetak_rapor_pas->get_kesehatan($id, $target);
        // end kesehatan
        // prestasi
        $data['prestasi'] = $this->cetak_rapor_pas->get_prestasi($id, $target);
        // end prestasi
        // absensi
        $data['absen_siswa'] = $this->cetak_rapor_pas->get_absensi($id, $target, $th);
        // end absensi
        // catatan
        $data['catatan'] = $this->cetak_rapor_pas->get_catatan($id, $target, $th);
        // end catatan
        // catatan
        $data['naik_kelas'] = $this->cetak_rapor_pas->get_naik_kelas($id, $target);
        // end catatan
        // $this->load->view('layout/header-top');
        // $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_css');
        // $this->load->view('layout/header-bottom');
        // $this->load->view('layout/header-notif');
        // $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_detail', $data);
        // $this->load->view('layout/footer-top');
        // $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_js');
        // $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function mpdf($id, $target, $th)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        $data['header'] = $this->cetak_rapor_pas->get_header($id, $target);
        $data['mapel'] = $this->cetak_rapor_pas->get_pasmapel($id, $target);
        $data['kelas'] = $this->db->get_where('t_kelas_siswa', [ 'rombel' => $id])->row_array();
        $data['siswa'] = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['tahun'] = $this->db->get_where('t_tahun', [ 'aktif' => 'Y'])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $data['tah'] = substr($data['tasm'], 0, 4);
        
        // sikap
        $data['predikat_sp'] = $this->cetak_rapor_pas->get_sp($id, $target);
        $data['selalu_sp'] = $this->cetak_rapor_pas->get_sp($id, $target);
        $q_list_kd_sp = $this->cetak_rapor_pas->q_list_kd_sp()->result_array();
        $array_kd = array();
        foreach ($q_list_kd_sp as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd_sp'] = $array_kd;
        $data['mulai_meningkat_sp'] = $this->cetak_rapor_pas->get_sp_mm($id, $target);

        $data['predikat_so'] = $this->cetak_rapor_pas->get_so($id, $target);
        $data['selalu_so'] = $this->cetak_rapor_pas->get_so($id, $target);
        $q_list_kd_so = $this->cetak_rapor_pas->q_list_kd_so()->result_array();
        $array_kd = array();
        foreach ($q_list_kd_so as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd_so'] = $array_kd;
        $data['mulai_meningkat_so'] = $this->cetak_rapor_pas->get_so_mm($id, $target);
        //end sikap
        // pengetahuan dan keterampilan     
        $data['mapel'] = $this->cetak_rapor_pas->get_pasmapel($id, $target);
        $data['kkm_in'] = $this->cetak_rapor_pas->get_min($id, $target);
        $data['kkm'] = $this->db->get('t_kkm')->result_array();
        $data['nilai_p'] = $this->cetak_rapor_pas->get_nilai_p($id, $target);
        $data['nilai_k'] = $this->cetak_rapor_pas->get_nilai_k($id, $target);
        // end pengetahuan dan keterampilan
        // ekstrakurikuler
        $data['ekskul'] = $this->cetak_rapor_pas->get_ekskul($id, $target);
        // end ekstrakurikuler
        // catatan
        $data['catatan'] = $this->cetak_rapor_pas->get_catatan($id, $target, $th);
        // end catatan

        // kesehatan
        $data['kesehatan'] = $this->cetak_rapor_pas->get_kesehatan($id, $target);
        // end kesehatan
        // prestasi
        $data['prestasi'] = $this->cetak_rapor_pas->get_prestasi($id, $target);
        // end prestasi
        // absensi
        $data['absen_siswa'] = $this->cetak_rapor_pas->get_absensi($id, $target, $th);
        // end absensi     
        // catatan
        $data['naik_kelas'] = $this->cetak_rapor_pas->get_naik_kelas($id, $target);
        // end catatan
        $data['kota'] = $this->cetak_rapor_pas->get_kota();
        $data['footer_1'] = $this->cetak_rapor_pas->get_footer_1($id, $target);
        $data['footer_2'] = $this->cetak_rapor_pas->get_footer_2($id, $target);

        $siswa  = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $kelas = $this->db->get_where('t_kelas_siswa', [ 'rombel' => $id])->row_array();
        $sekolah = $this->db->get_where('m_sekolah')->row_array();

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_pdf_1', $data, TRUE);
        $mpdf->WriteHTML($html1);

        // tinggi_berat
        $data['tinggi_berat_1'] = $this->cetak_rapor_pas->get_tinggi_berat_1($id, $target);
        $data['tinggi_berat_2'] = $this->cetak_rapor_pas->get_tinggi_berat_2($id, $target);
        // end tinggi_berat

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html2 = $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_pdf_2', $data, TRUE);
        $mpdf->WriteHTML($html2);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html3 = $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_pdf_3', $data, TRUE);
        $mpdf->WriteHTML($html3);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
             <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
         </table>');
        $html4 = $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_pdf_4', $data, TRUE);
        $mpdf->WriteHTML($html4);

        // $siswa  = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $nama_file_pdf = ($siswa['nis'] . ' _ ' . $siswa['nama'] . ' _ ' . $kelas['rombel']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
        // $mpdf->Output($nama_dokumen . ".pdf", 'I');
        // var_dump($data['nilai_pts']);
        // die;
    }
    
      public function mpdf_qrcode($id, $target, $th)
    {
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

        $data['header'] = $this->cetak_rapor_pas->get_header($id, $target);
        $data['mapel'] = $this->cetak_rapor_pas->get_pasmapel($id, $target);
        $data['kelas'] = $this->db->get_where('t_kelas_siswa', [ 'rombel' => $id])->row_array();
        $data['siswa'] = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $data['sekolah'] = $this->db->get_where('m_sekolah')->row_array();
        $data['tahun'] = $this->db->get_where('t_tahun', [ 'aktif' => 'Y'])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $data['tah'] = substr($data['tasm'], 0, 4);

        // sikap
        $data['predikat_sp'] = $this->cetak_rapor_pas->get_sp($id, $target);
        $data['selalu_sp'] = $this->cetak_rapor_pas->get_sp($id, $target);
        $q_list_kd_sp = $this->cetak_rapor_pas->q_list_kd_sp()->result_array();
        $array_kd = array();
        foreach ($q_list_kd_sp as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd_sp'] = $array_kd;
        $data['mulai_meningkat_sp'] = $this->cetak_rapor_pas->get_sp_mm($id, $target);

        $data['predikat_so'] = $this->cetak_rapor_pas->get_so($id, $target);
        $data['selalu_so'] = $this->cetak_rapor_pas->get_so($id, $target);
        $q_list_kd_so = $this->cetak_rapor_pas->q_list_kd_so()->result_array();
        $array_kd = array();
        foreach ($q_list_kd_so as $v) {
            $idx = $v['kd_id'];
            $val = $v['nama_kd'];
            $array_kd[$idx] = $val;
        }
        $data['list_kd_so'] = $array_kd;
        $data['mulai_meningkat_so'] = $this->cetak_rapor_pas->get_so_mm($id, $target);
        //end sikap
        // pengetahuan dan keterampilan     
        $data['mapel'] = $this->cetak_rapor_pas->get_pasmapel($id, $target);
        $data['kkm_in'] = $this->cetak_rapor_pas->get_min($id, $target);
        $data['kkm'] = $this->db->get('t_kkm')->result_array();
        $data['nilai_p'] = $this->cetak_rapor_pas->get_nilai_p($id, $target);
        $data['nilai_k'] = $this->cetak_rapor_pas->get_nilai_k($id, $target);
        // end pengetahuan dan keterampilan
        // ekstrakurikuler
        $data['ekskul'] = $this->cetak_rapor_pas->get_ekskul($id, $target);
        // end ekstrakurikuler
        // catatan
        $data['catatan'] = $this->cetak_rapor_pas->get_catatan($id, $target, $th);
        // end catatan

        // kesehatan
        $data['kesehatan'] = $this->cetak_rapor_pas->get_kesehatan($id, $target);
        // end kesehatan
        // prestasi
        $data['prestasi'] = $this->cetak_rapor_pas->get_prestasi($id, $target);
        // end prestasi
        // absensi
        $data['absen_siswa'] = $this->cetak_rapor_pas->get_absensi($id, $target, $th);
        // end absensi     
        // catatan
        $data['naik_kelas'] = $this->cetak_rapor_pas->get_naik_kelas($id, $target);
        // end catatan
        $data['kota'] = $this->cetak_rapor_pas->get_kota();
        $data['footer_1'] = $this->cetak_rapor_pas->get_footer_1($id, $target);
        $data['footer_2'] = $this->cetak_rapor_pas->get_footer_2($id, $target);

        $siswa  = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $kelas = $this->db->get_where('t_kelas_siswa', [ 'rombel' => $id])->row_array();
        $sekolah = $this->db->get_where('m_sekolah')->row_array();

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html1 = $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_pdf_1', $data, TRUE);
        $mpdf->WriteHTML($html1);

        // tinggi_berat
        $data['tinggi_berat_1'] = $this->cetak_rapor_pas->get_tinggi_berat_1($id, $target);
        $data['tinggi_berat_2'] = $this->cetak_rapor_pas->get_tinggi_berat_2($id, $target);
        // end tinggi_berat

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html2 = $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_pdf_2', $data, TRUE);
        $mpdf->WriteHTML($html2);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
            <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
        </table>');
        $html3 = $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_pdf_3', $data, TRUE);
        $mpdf->WriteHTML($html3);

        // Set the new Header before you AddPage
        $mpdf->SetHeader();
        $mpdf->AddPage();

        // Set the new Footer after you AddPage
        $mpdf->SetHTMLFooter(' <table width="100%" style="font-size: 8pt;">
             <tr>
                <td width="25%">{PAGENO}/{nbpg} | '.$sekolah['web'].'</td>
                <td width="0%" align="center"></td>
                <td width="75%" style="text-align: right;  "><p>' . 'Rapor - ' . $siswa['nis'] . ' | ' . $siswa['nama'] . ' | ' . $kelas['rombel'] . ' | ' . $sekolah['nama_sekolah'] . ' </p></td>
            </tr>
         </table>');
        $html4 = $this->load->view('akademik_walikelas/cetak_rapor_pas/cetak_rapor_pas_pdf_4 qrcode', $data, TRUE);
        $mpdf->WriteHTML($html4);

        // $siswa  = $this->db->get_where('m_siswa', [ 'nis' => $target])->row_array();
        $nama_file_pdf = ($siswa['nis'] . ' _ ' . $siswa['nama'] . ' _ ' . $kelas['rombel']);
        $mpdf->Output($nama_file_pdf . '.pdf', 'I');
        // $mpdf->Output($nama_dokumen . ".pdf", 'I');
        // var_dump($data['nilai_pts']);
        // die;
    }
}
