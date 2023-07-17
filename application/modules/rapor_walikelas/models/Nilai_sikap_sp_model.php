<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_sikap_sp_model extends CI_Model

{
    // proses pengetahuan
    // index
    public function tampil_data_pts()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.nama')
            ->from('t_nilai_sikap_sp k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            // ->join('t_tahun tt', 'k.tasm = tt.tahun', 'left')
            ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.penilaian' => 'PTS'])
            // ->where(['tt.aktif' => 'Y'])
            ->where(['k.tasm' =>  $tahun])
            // ->where(['w.tasm' =>  $tasm])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function tampil_data_pas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = $get_tasm['tahun'];
        $tasm = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,s.nama')
            ->from('t_nilai_sikap_sp k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            // ->join('t_tahun tt', 'k.tasm = tt.tahun', 'left')
            ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.penilaian' => 'PAS'])
            // ->where(['tt.aktif' => 'Y'])
            ->where(['k.tasm' =>  $tahun])
            // ->where(['w.tasm' =>  $tasm])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_kelas()
    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' =>  $tahun])
            // ->where(['w.tasm' =>  $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function q_list_kd()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSp'])
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // tampil pts
    public function get_kelas_pts()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' =>  $tahun])
            // ->where(['w.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_siswa_pts()

    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $result = $this->db->get_where('t_nilai_sikap_sp', ["penilaian" => 'PTS', 'is_wali' == 'Y', 'tasm' == $tahun])->row_array();
        if ($result['predikat'] == '' || $result['selalu']  ==  0 || $result['mulai_meningkat'] == 0) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_sikap_sp na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' =>  $tahun])
                // ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('k.*,s.nama,s.nis')
                ->from('t_nilai_sikap_sp k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.penilaian' => 'PTS'])
                ->where(['k.tasm' =>  $tahun])
                // ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        }
    }

    public function q_list_kd_pts()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSp'])
            ->get()->result_array();
        return $bagidata;
    }
    // end tampil pts
    // tampil pas
    public function get_kelas_pas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_guru' => $this->session->userdata('nik')])
            ->where(['k.ta' =>  $tahun])
            // ->where(['w.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_siswa_pas()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y', 'kd_sekolah' => $this->session->userdata('kd_sekolah')])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $result = $this->db->get_where('t_nilai_sikap_sp', ["penilaian" => 'PAS', 'is_wali' == 'Y', 'tasm' == $tahun])->row_array();
        if ($result['predikat'] == '' || $result['selalu']  ==  0 || $result['mulai_meningkat'] == 0) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.*')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_sikap_sp na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.ta' =>  $tahun])
                // ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('k.*,s.nama,s.nis')
                ->from('t_nilai_sikap_sp k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.penilaian' => 'PAS'])
                ->where(['w.tasm' =>  $tahun])
                // ->where(['w.tasm' => $tahun])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        }
    }

    public function q_list_kd_pas()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSp'])
            ->get()->result_array();
        return $bagidata;
    }
    // end tampil pas

    // tambah data
    public function simpan_nilai_pts()
    {
        $id_siswa = $this->input->post('id_siswa');
        $predikat = $this->input->post('predikat');
        $selalu1 = $this->input->post('ssp1');
        $selalu2 = $this->input->post('ssp2');
        $mulai_meningkat = $this->input->post('ssp3');
        $p = $this->input->post();

        for ($val = 0; $val < count($id_siswa); $val++) {
            $data = [
                "id_siswa" => $id_siswa[$val],
                "tasm" => $p['tasm'],
                "id_kelas" => $p['id_kelas'],
                "is_wali" => 'Y',
                "predikat" => $predikat[$val],
                "selalu" => $selalu1[$val] . "," . $selalu2[$val],
                "mulai_meningkat" => $mulai_meningkat[$val],
                "penilaian" => 'PTS',
            ];

            $result = $this->db->get_where('t_nilai_sikap_sp', ['id_siswa' => $id_siswa[$val], "tasm" => $p['tasm'], 'id_kelas' => $p['id_kelas'], "penilaian" => 'PTS'])->row_array();
            if ($result == 0) {
                $this->db->insert('t_nilai_sikap_sp', $data);
            } else {
                $this->db->where('id', $result['id']);
                $this->db->update('t_nilai_sikap_sp', $data);
            }
        }
    }

    public function simpan_nilai_pas()
    {
        $id_siswa = $this->input->post('id_siswa');
        $predikat = $this->input->post('predikat');
        $selalu1 = $this->input->post('ssp1');
        $selalu2 = $this->input->post('ssp2');
        $mulai_meningkat = $this->input->post('ssp3');
        $p = $this->input->post();

        for ($val = 0; $val < count($id_siswa); $val++) {
            $data = [
                "id_siswa" => $id_siswa[$val],
                "tasm" => $p['tasm'],
                "id_kelas" => $p['id_kelas'],
                "is_wali" => 'Y',
                "predikat" => $predikat[$val],
                "selalu" => $selalu1[$val] . "," . $selalu2[$val],
                "mulai_meningkat" => $mulai_meningkat[$val],
                "penilaian" => 'PAS',
            ];

            $result = $this->db->get_where('t_nilai_sikap_sp', ['id_siswa' => $id_siswa[$val], "tasm" => $p['tasm'], 'id_kelas' => $p['id_kelas'], "penilaian" => 'PAS'])->row_array();
            if ($result == 0) {
                $this->db->insert('t_nilai_sikap_sp', $data);
            } else {
                $this->db->where('id', $result['id']);
                $this->db->update('t_nilai_sikap_sp', $data);
            }
        }
    }
    // end tambah data 
}
