<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_keterampilan_model extends CI_Model

{
    // proses keterampilan
    public function detil_guru($id)
    {
        $bagidata =
            $this->db->select('gm.mapel_id,gm.id_mapel,pd.nama_lengkap,mm.nama,mm.kd_singkat,mk.rombel,mk.id_kelas')
            ->from('t_guru_mapel gm')
            // ->join('l_campus lc', 'gm.kd_campus = lc.kd_campus', 'left')
            // ->join('l_sekolah ls', 'gm.kd_sekolah = ls.kd_sekolah', 'left')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
            ->join('pegawai_data pd', 'gm.id_guru = pd.nik', 'left')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['gm.mapel_id' => $id, 'ASC'])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_detailsiswa($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('a.id_siswa,a.id_kelas,b.nama,b.nis,c.mapel_id,d.kkm,c.id_mapel')
            ->from('t_kelas_siswa a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_guru_mapel c', 'a.rombel = c.id_kelas', 'left')
            ->join('t_kkm d', 'c.id_mapel = d.id_mapel')
            ->where(['c.mapel_id' => $id], 'ASC')
            ->where(['a.ta' => $ta], 'ASC')
            ->group_by('b.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_kd($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.tema,mk.no_kd,mk.id_mapel')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left', 'ASC')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.tasm' => $tasm])
            ->group_by('mk.tingkat', 'ASC')
            // ->group_by('mk.no_kd', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_detailnilai($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left', 'ASC')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }
    // end proses keterampilan

    // edit nilai
    public function edit_guru($id)
    {
        $bagidata = $this->db->select('gm.*,mm.nama,mk.rombel,pd.nama_lengkap')
            ->from('t_guru_mapel gm')
            // ->join('l_campus lc', 'gm.kd_campus = lc.kd_campus', 'left')
            // ->join('l_sekolah ls', 'gm.kd_sekolah = ls.kd_sekolah', 'left')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
            ->join('pegawai_data pd', 'gm.id_guru = pd.nik', 'left')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['gm.mapel_id' => $id, 'ASC'])
            ->get()->row_array();
        return $bagidata;
    }

    public function edit_siswa($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('a.*,b.nama,b.nis,c.mapel_id,d.kkm,c.mapel_id')
            ->from('t_kelas_siswa a')
            ->join('m_siswa b', 'a.id_siswa = b.nis', 'left')
            ->join('t_guru_mapel c', 'a.rombel = c.id_kelas', 'left')
            ->join('t_kkm d', 'a.id_kelas = d.kelas', 'left')
            ->where(['c.mapel_id' => $id], 'ASC')
            ->where(['a.ta' => $ta], 'ASC')
            ->group_by('a.id_siswa')
            ->get()->result_array();
        return $bagidata;
    }

    public function edit_kd($id)
    {
        $bagidata =
            $this->db->select('k.*,mk.tema,mk.no_kd,mk.id_mapel')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->group_by('mk.tingkat')
            ->get()->result_array();
        return $bagidata;
    }

    public function edit_nilai($id, $kd, $pen, $jenis)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $this->db->distinct();
        $bagidata =
            $this->db->select('s.nis,mk.kd_id')
            ->from('t_kelas_siswa k')
            ->join('t_mapel_kd mk', 'k.rombel = mk.tingkat', 'left')
            ->join('t_guru_mapel gm', 'k.rombel = gm.id_kelas', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['mk.kd_id' => $kd], 'ASC')
            ->where(['k.ta' => $ta], 'ASC')
            ->get()->result_array();
        // return $bagidata;

        foreach ($bagidata as $bd) {
            $siswa = $this->db->get_where('t_nilai_p_ket', ['id_guru_mapel' => $id, 'id_mapel_kd' => $bd['kd_id'], 'jenis' => $jenis, 'penilaian' => $pen, 'tasm' => $tasm, 'id_siswa' => $bd['nis']])->row_array();
            //var_dump($siswa);
            //var_dump($bd['nis']);
            //break;
            if ($siswa == 0) {
                $this->db->insert('t_nilai_p_ket', ['id_guru_mapel' => $id, 'id_mapel_kd' => $bd['kd_id'], 'jenis' => $jenis, 'penilaian' => $pen, 'tasm' => $tasm, 'id_siswa' => $bd['nis']]);
            }
        }
        //die;

        $bagidata =
            $this->db->select('k.*,mk.tema,s.nama,mk.no_kd,mk.kd_id,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['mk.kd_id' => $kd], 'ASC')
            ->where(['k.penilaian' => $pen], 'ASC')
            ->where(['k.jenis' => $jenis], 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end edit nilai
    // export excel 
    public function get_exportnilai_pts($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }

    public function get_exportnilai_pas($id)
    {
        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_tahun tt', 'mk.kd_sekolah = tt.kd_sekolah', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.penilaian' => 'PAS'])
            ->where(['tt.aktif' => 'Y'])
            // ->group_by('mk.tingkat')
            ->get()->result_array();
        return $bagidata;
    }
    // end export excel 
    // proses tambah nilai
    public function get_mapel($id)
    {
        $bagidata =
            $this->db->select('gm.*,mm.nama,mk.tingkat,mg.nama_guru')
            ->from('t_guru_mapel gm')
            // ->join('l_campus lc', 'gm.kd_campus = lc.kd_campus', 'left')
            // ->join('l_sekolah ls', 'gm.kd_sekolah = ls.kd_sekolah', 'left')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('m_kelas mk', 'gm.id_kelas = mk.tingkat', 'left')
            ->join('m_guru mg', 'gm.id_guru = mg.nip', 'left')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['gm.mapel_id' => $id, 'ASC'])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_export_siswa($id)
    {
        $data =  $this->db->select('k.*,mm.nama,mm.nis')
            ->from('t_kelas_siswa k')
            ->join('m_siswa mm', 'k.id_siswa = mm.nis', 'left')
            ->where(['k.id_kelas' => $id])
            ->get()->result_array();
        return $data;
    }

    public function get_tingkat($id)
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_guru_mapel')
            ->where(['mapel_id' => $id])
            ->where(['id_guru' => $this->session->userdata('nik')])
            // ->group_by('id_guru')
            ->get()->result();
        return $bagidata;
    }
    // proses tambah
    public function nilai_simpan()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nilai = $this->input->post('nilai');
        $p = $this->input->post();
        for ($i = 0; $i < count($id_siswa); $i++) {
            $data = [
                "jenis" => $p['jenis'],
                "id_guru_mapel" => $p['id_guru_mapel'],
                "id_mapel_kd" => $p['id_mapel_kd'],
                "id_siswa" => $id_siswa[$i],
                "nilai" => $nilai[$i],
                "tasm" => $p['tasm'],
                "penilaian" => $p['penilaian'],
            ];

            $cek = $this->db->get_where('t_nilai_p_ket', ['id_siswa' => $id_siswa[$i], 'id_guru_mapel' => $p['id_guru_mapel'], 'id_mapel_kd' => $p['id_mapel_kd'], 'jenis' => $p['jenis'], 'tasm' => $p['tasm'], 'penilaian' => $p['penilaian']])->row_array();
            // var_dump($cek);
            // die;

            if ($cek == 0) {
                $this->db->insert('t_nilai_p_ket', $data);
                $this->session->set_flashdata('message', ' 
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>Berhasil input nilai ! </h5>
                </div>
                ');
            } else {
                $this->session->set_flashdata('message', ' 
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>Nialai yang dimasukkan sama ! </h5>
                </div>
                ');
            }

            // $kd_id = $this->input->post('id_mapel_kd');
            // $data1 = [
            //     "kd_activate" => 1,
            // ];
            // $this->db->where('kd_id', $kd_id);
            // $this->db->update('t_mapel_kd', $data1);
        }
    }

    public function update_simpan()
    {
        $id = $this->input->post('id');
        $nilai = $this->input->post('nilai');
        for ($i = 0; $i < count($id); $i++) {

            $data = [
                "nilai" => $nilai[$i],
            ];

            $this->db->where('id', $id[$i]);
            $this->db->update('t_nilai_p_ket', $data);

            // $kd_id = $this->input->post('id_mapel_kd');
            // $data1 = [
            //     "kd_activate" => 1,
            // ];
            // $this->db->where('kd_id', $kd_id);
            // $this->db->update('t_mapel_kd', $data1);
        }
    }
    // end proses tambah nilai   
}
