<?php

use Box\Spout\Common\Entity\Row;

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_keterampilan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        cek_aktif_login();
        cek_akses_user();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Nilai_keterampilan_model', 'nilai_keterampilan');
    }

    public function keterampilan($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Input Nilai Keterampilan';
        $data['home'] = 'Guru Mapel';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['data'] = $this->nilai_keterampilan->detil_guru($id);
        $data['siswa'] = $this->nilai_keterampilan->get_detailsiswa($id);
        $data['header'] = $this->nilai_keterampilan->get_detailnilai($id);
        $data['nilai'] = $this->nilai_keterampilan->get_detailnilai($id);

        $data['kkm'] = $this->db->get('t_kkm')->result_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $data['tahun'] = substr($data['tasm'], 0, 4);
        $data['semester'] = substr($data['tasm'], -1, 1);

        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_v', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tambah_ket($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Input Nilai Keterampilan';
        $data['home'] = 'Guru Mapel';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['p_penilaian'] = array('Pilih Penilaian ' => 'Pilih Penilaian', 'PTS' => 'PTS', 'PAS' => 'PAS');
        $data['p_jenis'] = array('Praktik1' => 'Praktik1', 'Praktik2' => 'Praktik2', 'Praktik3' => 'Praktik3', 'Praktik4' => 'Praktik4', 'Produk1' => 'Produk1', 'Produk2' => 'Produk2', 'Produk3' => 'Produk3', 'Produk4' => 'Produk4', 'Projek1' => 'Projek1', 'Projek2' => 'Projek2', 'Projek3' => 'Projek3', 'Projek4' => 'Projek4', 'Portofolio1' => 'Portofolio1', 'Portofolio2' => 'Portofolio2', 'Portofolio3' => 'Portofolio3', 'Portofolio4' => 'Portofolio4');
        $data['mapel'] = $this->nilai_keterampilan->get_mapel($id);
        $data['data'] = $this->nilai_keterampilan->detil_guru($id);
        $data['siswa'] = $this->nilai_keterampilan->get_detailsiswa($id);
        $data['header'] = $this->nilai_keterampilan->get_detailnilai($id);
        $data['nilai'] = $this->nilai_keterampilan->get_detailnilai($id);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);

        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_tambah', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function tabel_pts($id)
    {
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        // $data['p_penilaian'] = array('Pilih Penilaian ' => 'Pilih Penilaian', 'PTS' => 'PTS', 'PAS' => 'PAS');
        $data['p_jenis'] = array('' => '', 'Praktik1' => 'Praktik1', 'Praktik2' => 'Praktik2', 'Praktik3' => 'Praktik3', 'Praktik4' => 'Praktik4', 'Produk1' => 'Produk1', 'Produk2' => 'Produk2', 'Produk3' => 'Produk3', 'Produk4' => 'Produk4', 'Projek1' => 'Projek1', 'Projek2' => 'Projek2', 'Projek3' => 'Projek3', 'Projek4' => 'Projek4', 'Portofolio1' => 'Portofolio1', 'Portofolio2' => 'Portofolio2', 'Portofolio3' => 'Portofolio3', 'Portofolio4' => 'Portofolio4');
        $data['mapel'] = $this->nilai_keterampilan->get_mapel($id);
        $data['data'] = $this->nilai_keterampilan->detil_guru($id);
        $data['siswa'] = $this->nilai_keterampilan->get_detailsiswa($id);
        $data['header'] = $this->nilai_keterampilan->get_detailnilai($id);
        $data['nilai'] = $this->nilai_keterampilan->get_detailnilai($id);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $semester = $get_tasm['semester'];
        $data['kd'] = $this->db->get_where('t_mapel_kd', ['id_mapel' => $id, 'semester' => $semester, 'jenis' => 'K', 'id_guru' => $this->session->userdata('nik')])->result();

        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_table_pts', $data);
    }

    public function tabel_pas($id)
    {
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);

        // $data['p_penilaian'] = array('Pilih Penilaian ' => 'Pilih Penilaian', 'PTS' => 'PTS', 'PAS' => 'PAS');
        $data['p_jenis'] = array('' => '', 'Praktik1' => 'Praktik1', 'Praktik2' => 'Praktik2', 'Praktik3' => 'Praktik3', 'Praktik4' => 'Praktik4', 'Produk1' => 'Produk1', 'Produk2' => 'Produk2', 'Produk3' => 'Produk3', 'Produk4' => 'Produk4', 'Projek1' => 'Projek1', 'Projek2' => 'Projek2', 'Projek3' => 'Projek3', 'Projek4' => 'Projek4', 'Portofolio1' => 'Portofolio1', 'Portofolio2' => 'Portofolio2', 'Portofolio3' => 'Portofolio3', 'Portofolio4' => 'Portofolio4');
        $data['mapel'] = $this->nilai_keterampilan->get_mapel($id);
        $data['data'] = $this->nilai_keterampilan->detil_guru($id);
        $data['siswa'] = $this->nilai_keterampilan->get_detailsiswa($id);
        $data['header'] = $this->nilai_keterampilan->get_detailnilai($id);
        $data['nilai'] = $this->nilai_keterampilan->get_detailnilai($id);

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $semester = $get_tasm['semester'];
        $data['kd'] = $this->db->get_where('t_mapel_kd', ['id_mapel' => $id, 'semester' => $semester, 'jenis' => 'K', 'id_guru' => $this->session->userdata('nik')])->result();

        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_table_pas', $data);
    }

    public function nilai_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_keterampilan->nilai_simpan();
        $mapel_id = $this->input->post('mapel_id');
        redirect('akademik_guru/nilai_keterampilan/tambah_ket/' . $mapel_id);
    }

    public function export_excel_pts($id)
    {
        $kolom_hidden = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW", "AX", "AY", "AZ");
        $kolom_xl = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "AA", "AB", "AC", "AD", "AE", "AF", "AG", "AH", "AI", "AJ", "AK", "AL", "AM", "AN", "AO", "AP", "AQ", "AR", "AS", "AT", "AU", "AV", "AW", "AX", "AY", "AZ");
        $header = $this->nilai_keterampilan->detil_guru($id);

        $sekolah = $this->db->get('m_sekolah')->row_array();
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $tasm = $get_tasm['tahun'];
        $data['ta'] = substr($tasm, 4);

        $data['siswa'] = $this->nilai_keterampilan->get_detailsiswa($id);
        $data['nilai'] = $this->nilai_keterampilan->get_exportnilai_pts($id);

        // require_once(APPPATH . 'libraries/PHPExcel.php');
        // require_once(APPPATH . 'libraries/PHPExcel/Writer/Excel2007.php');
        $this->load->library('excel');

        $object = new PHPExcel();

        $object->getProperties()->setCreator("ORA et LABORA");
        $object->getProperties()->setLastModifiedBy("ORA et LABORA");
        $object->getProperties()->setTitle("Nilai Pengetahuan");

        $object->setActiveSheetIndex(0);

        $object->setActiveSheetIndex(0)->setCellValue('A1', "Nama Sekolah");
        $object->getActiveSheet()->mergeCells('A1:B1');
        $object->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $object->getActiveSheet()->setCellValue('C1', ':' . ' ' . $sekolah['nama_sekolah']);
        $object->getActiveSheet()->getStyle('C1')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C1')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('C1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('A2', "Kelas");
        $object->getActiveSheet()->mergeCells('A2:B2');
        $object->getActiveSheet()->getStyle('A2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('A2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $object->getActiveSheet()->setCellValue('C2', ':' . ' ' . $header['rombel']);
        $object->getActiveSheet()->getStyle('C2')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C2')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('C2')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('A3', "Mata Pelajaran");
        $object->getActiveSheet()->mergeCells('A3:B3');
        $object->getActiveSheet()->getStyle('A3')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A3')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('A3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $object->getActiveSheet()->setCellValue('C3', ':' . ' ' . $header['nama']);
        $object->getActiveSheet()->getStyle('C3')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C3')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('C3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('A4', "Guru MaPel");
        $object->getActiveSheet()->mergeCells('A4:B4');
        $object->getActiveSheet()->getStyle('A4')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A4')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('A4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
        $object->getActiveSheet()->setCellValue('C4', ':' . ' ' . $header['mapel_id'] . ' ' . '|' . ' ' . $header['nama_lengkap']);
        $object->getActiveSheet()->getStyle('C4')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C4')->getFont()->setSize(12); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('C4')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('A5', "No");
        $object->getActiveSheet()->mergeCells('A5:A7');
        $object->getActiveSheet()->getStyle('A5')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A5')->getFont()->getColor()->setARGB('ffffff');
        $object->getActiveSheet()->getStyle('A5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('041170'); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('A5')->getFont()->setSize(14); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('A5:A7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('B5', "NIS");
        $object->getActiveSheet()->mergeCells('B5:B7');
        $object->getActiveSheet()->getStyle('B5')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('B5')->getFont()->getColor()->setARGB('ffffff');
        $object->getActiveSheet()->getStyle('B5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('041170'); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('B5')->getFont()->setSize(14); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('B5:B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $object->setActiveSheetIndex(0)->setCellValue('C5', "Nama Siswa");
        $object->getActiveSheet()->mergeCells('C5:C7');
        $object->getActiveSheet()->getStyle('C5')->getFont()->setBold(TRUE); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C5')->getFont()->getColor()->setARGB('ffffff');
        $object->getActiveSheet()->getStyle('C5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('041170'); // Set bold kolom A1
        $object->getActiveSheet()->getStyle('C5')->getFont()->setSize(14); // Set font size 15 untuk kolom A1
        $object->getActiveSheet()->getStyle('C5:C7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $baris_a = 8;
        $baris_b = 8;
        $no = 1;
        foreach ($data['siswa'] as $s) {

            $object->getActiveSheet()->setCellValue('A' .  $baris_a, $no++);
            $object->getActiveSheet()->setCellValue('B' .  $baris_a, $s['nis']);
            $object->getActiveSheet()->getStyle('B')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $object->getActiveSheet()->setCellValue('C' .  $baris_a, $s['nama']);

            $baris_a++;

            $baris_c = 3;
            $kolom_a1 = 3;
            foreach ($data['nilai'] as $a)
                if ($a['tasm'] == $tasm)
                    if ($a['id_siswa'] == $s['id_siswa']) {
                        $object->getActiveSheet()->setCellValue($kolom_hidden[$kolom_a1] . $baris_c, $a['kd_id']);
                        $object->getActiveSheet()->getStyle($kolom_hidden[$kolom_a1] . $baris_c)->getFont()->getColor()->setARGB('ffffff');
                        $object->getActiveSheet()->getStyle($kolom_hidden[$kolom_a1] . $baris_c)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $kolom_a1++;
                    }

            $baris_d = 4;
            $kolom_b1 = 3;
            foreach ($data['nilai'] as $a)
                if ($a['tasm'] == $tasm)
                    if ($a['id_siswa'] == $s['id_siswa']) {
                        $object->getActiveSheet()->setCellValue($kolom_hidden[$kolom_b1] . $baris_d, $a['penilaian']);
                        $object->getActiveSheet()->getStyle($kolom_hidden[$kolom_b1] . $baris_d)->getFont()->getColor()->setARGB('ffffff');
                        $object->getActiveSheet()->getStyle($kolom_hidden[$kolom_b1] . $baris_d)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $kolom_b1++;
                    }

            $baris_dx = 5;
            $kolom_b1x = 3;
            foreach ($data['nilai'] as $a)
                if ($a['tasm'] == $tasm)
                    if ($a['id_siswa'] == $s['id_siswa']) {
                        $object->getActiveSheet()->setCellValue($kolom_hidden[$kolom_b1x] . $baris_dx, $a['penilaian']);
                        $object->getActiveSheet()->getStyle($kolom_hidden[$kolom_b1x] . $baris_dx)->getFont()->getColor()->setARGB('ffffff');
                        $object->getActiveSheet()->getStyle($kolom_hidden[$kolom_b1x] . $baris_dx)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('041170'); // Set bold kolom A1
                        $object->getActiveSheet()->getStyle($kolom_hidden[$kolom_b1x] . $baris_dx)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $kolom_b1x++;
                    }

            $baris_e = 6;
            $kolom_c1 = 3;
            foreach ($data['nilai'] as $a)
                if ($a['tasm'] == $tasm)
                    if ($a['id_siswa'] == $s['id_siswa']) {
                        $object->getActiveSheet()->setCellValue($kolom_xl[$kolom_c1] . $baris_e, "KD" . ' ' . '-' . ' ' . $a['no_kd']);
                        $object->getActiveSheet()->getStyle($kolom_xl[$kolom_c1] . $baris_e)->getFont()->getColor()->setARGB('ffffff');
                        $object->getActiveSheet()->getStyle($kolom_xl[$kolom_c1] . $baris_e)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('041170'); // Set bold kolom A1
                        $object->getActiveSheet()->getStyle($kolom_xl[$kolom_c1] . $baris_e)->getFont()->setSize(12); // Set font size 15 untuk kolom A1
                        $object->getActiveSheet()->getStyle($kolom_xl[$kolom_c1] . $baris_e)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $kolom_c1++;
                    }

            $baris_f = 7;
            $kolom_d1 = 3;
            foreach ($data['nilai'] as $a)
                if ($a['tasm'] == $tasm)
                    if ($a['id_siswa'] == $s['id_siswa']) {
                        $object->getActiveSheet()->setCellValue($kolom_xl[$kolom_d1] . $baris_f, $a['jenis']);
                        $object->getActiveSheet()->getStyle($kolom_xl[$kolom_d1] . $baris_f)->getFont()->getColor()->setARGB('ffffff');
                        $object->getActiveSheet()->getStyle($kolom_xl[$kolom_d1] . $baris_f)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('041170'); // Set bold kolom A1
                        $object->getActiveSheet()->getStyle($kolom_xl[$kolom_d1] . $baris_f)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $kolom_d1++;
                    }

            $kolom_e1 = 3;
            foreach ($data['nilai'] as $b)
                if ($b['tasm'] == $tasm)
                    if ($b['id_siswa'] == $s['id_siswa']) {
                        $x = $b['nilai'];
                        $object->getActiveSheet()->setCellValue($kolom_xl[$kolom_e1] . $baris_b, $x);
                        $object->getActiveSheet()->getStyle($kolom_xl[$kolom_e1] . $baris_b)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                        $kolom_e1++;
                    }

            $baris_b++;
        }

        $pendidik = $header['nama_lengkap'];
        $mapel = $header['kd_singkat'];
        $nama = $header['rombel'];
        $filemane = "KI-4" . '_' . $pendidik . '_' . 'PTS-PAS' . '_' . $nama . '-' . $mapel . '.xlsx';
        $object->getActiveSheet()->setTitle(" KI-4 | $nama | PTS-PAS ");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition:attachment; filename="' . $filemane . '"');
        header('Cache-Control: max-age=0');
        $writer = PHPExcel_IOFactory::createWriter($object, 'Excel2007');
        $writer->save('php://output');
        exit;
    }

    public function import_excel($id)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Input Nilai keterampilan';
        $data['home'] = 'Guru Mapel';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        // var_dump($data['pegawai']);
        // die;
        $data['data'] = $this->nilai_keterampilan->detil_guru($id);
        $data['mapel'] = $this->nilai_keterampilan->get_mapel($id);
        $data['tingkat'] = $this->nilai_keterampilan->get_tingkat($id);
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_import_excel', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function upload()
    {

        if (isset($_FILES['file']['name'])) {
            $path   = $_FILES['file']['tmp_name'];
            $object = PHPExcel_IOFactory::load($path);

            foreach ($object->getWorksheetIterator() as $worksheet) {
                $highestRow    = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();

                //$n = 3;
                $n = 0;
                for ($n = 0; $n < $n + 10; $n++) {
                    $id_mapel_kd = $worksheet->getCellByColumnAndRow(3 + $n, 3)->getValue();
                    $penilaian = $worksheet->getCellByColumnAndRow(3 + $n, 4)->getValue();
                    $jenis = $worksheet->getCellByColumnAndRow(3 + $n, 7)->getValue();

                    if ($id_mapel_kd == "") {
                        break;
                    }

                    for ($row = 8; $row <= $highestRow; $row++) {
                        $id_siswa = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $nilai = $worksheet->getCellByColumnAndRow(3 + $n, $row)->getValue();

                        // var_dump($nilai);
                        // die;
                        $id_guru_mapel = $this->input->post('id_guru_mapel');
                        $tasm = $this->input->post('tasm');
                        $result_nilai_ket = $this->db->get_where('t_nilai_p_ket', ['id_siswa' => $id_siswa, 'id_guru_mapel' => $id_guru_mapel, 'id_mapel_kd' => (int)$id_mapel_kd, 'jenis' => $jenis, 'tasm' => $tasm, 'penilaian' => $penilaian,])->row_array();

                        $data1 = [
                            'id_guru_mapel' => $id_guru_mapel,
                            'id_mapel_kd' => $id_mapel_kd,
                            'id_siswa' =>  $id_siswa,
                            'jenis' => $jenis,
                            'tasm'  => $tasm,
                            'nilai' => $nilai,
                            'penilaian' => $penilaian,
                        ];

                        $data2 = [
                            'nilai' => $nilai,
                        ];

                        if ($result_nilai_ket == 0) {
                            if ($penilaian == 'PTS' || $penilaian == 'PAS') {
                                // $this->db->insert('t_nilai_p_ket', $data1);
                                $message = array(
                                    'message' => '<div class="alert alert-success">data yang dimasukkan tidak sesuai !!!</div>',
                                );
                            }
                        } else {
                            if ($penilaian == 'PTS' || $penilaian == 'PAS') {
                                $this->db->where('id', $result_nilai_ket['id']);
                                $this->db->update('t_nilai_p_ket', $data2);
                            }
                        }
                    }
                }
            }

            $message = array(
                'message' => '<div class="alert alert-success">Import file excel berhasil disimpan di database</div>',
            );

            $this->session->set_flashdata($message);
            $mapel_id = $this->input->post('mapel_id');
            redirect('akademik_guru/nilai_keterampilan/tambah_ket/' . $mapel_id);
        } else {
            $message = array(
                'message' => '<div class="alert alert-danger">Import file gagal, coba lagi</div>',
            );

            $this->session->set_flashdata($message);
            $mapel_id = $this->input->post('mapel_id');
            redirect('akademik_guru/nilai_keterampilan/tambah_ket/' . $mapel_id);
        }
    }

    public function edit_ket($id, $kd, $pen, $jenis)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Input Nilai Keterampilan';
        $data['home'] = 'Guru Mapel';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['data'] = $this->nilai_keterampilan->detil_guru($id);
        $data['siswa'] = $this->nilai_keterampilan->get_detailsiswa($id);
        $data['header'] = $this->nilai_keterampilan->get_detailnilai($id);
        $data['nilai'] = $this->nilai_keterampilan->edit_nilai($id, $kd, $pen, $jenis);
        // var_dump($data['data_pegawai']);
        // die;       
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_edit', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function update_simpan()
    {
        cek_post();
        if (cek_akses_user()['role_id'] == 0) {
            redirect(base_url('unauthorized'));
        }
        echo $this->nilai_keterampilan->update_simpan();
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Ubah Nilai ! </h5>
        </div>
        ');
        $mapel_id = $this->input->post('mapel_id');
        $kd_id = $this->input->post('kd_id');
        $penilaian = $this->input->post('penilaian');
        $jenis = $this->input->post('jenis');
        redirect('akademik_guru/nilai_keterampilan/edit_ket/' . $mapel_id . '/' . $kd_id . '/' . $penilaian . '/' . $jenis);
    }

    public function delete_data($id, $kd, $pen, $jenis)
    {
        $this->benchmark->mark('code_start');
        $data['title'] = 'Input Nilai Keterampilan';
        $data['home'] = 'Guru Mapel';
        $data['subtitle'] = $data['title'];
        $data['main_menu'] = main_menu();
        $data['sub_menu'] = sub_menu();
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();
        $data['sekolah'] = $this->db->get('m_sekolah')->row_array();

        $data['data'] = $this->nilai_keterampilan->detil_guru($id);
        $data['siswa'] = $this->nilai_keterampilan->get_detailsiswa($id);
        $data['header'] = $this->nilai_keterampilan->get_detailnilai($id);
        $data['nilai'] = $this->nilai_keterampilan->edit_nilai($id, $kd, $pen, $jenis);
        // var_dump($data['data_pegawai']);
        // die;       
        $this->load->view('layout/header-top', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_css');
        $this->load->view('layout/header-bottom', $data);
        $this->load->view('layout/header-notif', $data);
        $this->load->view('layout/main-navigation', $data);
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_delete', $data);
        $this->load->view('layout/footer-top');
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_js');
        $this->load->view('layout/footer-bottom');
        $this->benchmark->mark('code_end');
    }

    public function delete()
    {
        $id = $_POST['id'];
        $this->db->where_in('id', $id);
        $this->db->delete('t_nilai_p_ket');
        $this->session->set_flashdata('message', ' 
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-check"></i>Berhasil Hapus Data ! </h5>
        </div>
        ');
        $mapel_id = $this->input->post('mapel_id');
        redirect('akademik_guru/nilai_keterampilan/tambah_ket/' . $mapel_id);
    }

    public function cetak($id)
    {
        $this->benchmark->mark('code_start');
        $data['cek_akses'] = cek_akses_user();
        $data['pegawai'] = $this->db->get_where('pegawai', ['email_pegawai' => $this->session->userdata('email_pegawai')])->row_array();

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 4);
        $data['tahun'] = substr($data['tasm'], 0, 4);
        $data['semester'] = substr($data['tasm'], -1, 1);

        $data['data'] = $this->nilai_keterampilan->detil_guru($id);
        $data['siswa'] = $this->nilai_keterampilan->get_detailsiswa($id);
        $data['header'] = $this->nilai_keterampilan->get_detailnilai($id);
        $data['nilai'] = $this->nilai_keterampilan->get_detailnilai($id);

        $data['kkm'] = $this->db->get('t_kkm')->result_array();

        // var_dump($data['data_pegawai']);
        // die;    
        $this->load->view('akademik_guru/nilai_keterampilan/nilai_keterampilan_cetak', $data);
        $this->benchmark->mark('code_end');
    }
}
