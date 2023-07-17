<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_ki1_ki2_model extends CI_Model

{
    // index
    // ki1
    public function ki1_data_pts($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama')
            ->from('t_nilai_sikap_sp k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
            ->where(['w.id_kelas' => $id])
            ->where(['k.tasm' => $tasm])
            ->where(['k.penilaian' => 'PTS'])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function ki1_data_pas($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama')
            ->from('t_nilai_sikap_sp k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
            ->where(['w.id_kelas' => $id])
            ->where(['k.tasm' => $tasm])
            ->where(['k.penilaian' => 'PAS'])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_kelas($id)
    {
        $bagidata =
            $this->db->select('k.*,pd.nama_lengkap,w.tasm')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('pegawai_data pd', 'w.id_guru = pd.nik', 'left')
            ->where(['w.id_kelas' => $id])
            ->get()->row_array();
        return $bagidata;
    }

    public function q_list_kd_ki1()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSp'])
            ->get()->result_array();
        return $bagidata;
    }
    // end ki1
    // ki2
    public function ki2_data_pts($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama')
            ->from('t_nilai_sikap_so k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
            ->where(['w.id_kelas' => $id])
            ->where(['k.tasm' => $tasm])
            ->where(['k.penilaian' => 'PTS'])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function ki2_data_pas($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $data['ta'] = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama')
            ->from('t_nilai_sikap_so k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
            ->where(['w.id_kelas' => $id])
            ->where(['k.tasm' => $tasm])
            ->where(['k.penilaian' => 'PAS'])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_siswa_pts()
    {
        $result = $this->db->get_where('t_nilai_sikap_so', ["penilaian" => 'PTS'])->row_array();
        if (
            $result == 0
        ) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.*,w.id_guru')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_sikap_so na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('k.*,s.nama,s.nis,w.id_guru')
                ->from('t_nilai_sikap_so k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.penilaian' => 'PTS'])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        }
    }

    public function get_siswa_pas()
    {
        $result = $this->db->get_where('t_nilai_sikap_so', ["penilaian" => 'PAS'])->row_array();
        if (
            $result == 0
        ) {
            $bagidata =
                $this->db->select('s.nama,s.nis,na.*,w.id_guru')
                ->from('t_kelas_siswa k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
                ->join('t_nilai_sikap_so na', 'k.id_siswa = na.id_siswa', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        } else {
            $bagidata =
                $this->db->select('k.*,s.nama,s.nis,w.id_guru')
                ->from('t_nilai_sikap_so k')
                ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
                ->join('t_walikelas w', 'k.id_kelas = w.id_kelas', 'left')
                ->where(['w.id_guru' => $this->session->userdata('nik')])
                ->where(['k.penilaian' => 'PAS'])
                ->group_by('s.nama', 'ASC')
                ->get()->result_array();
            return $bagidata;
        }
    }

    public function q_list_kd_ki2()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSo'])
            ->get();
        return $bagidata;
    }
    // end index

}
