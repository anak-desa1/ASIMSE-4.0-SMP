<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_pengetahuan_model extends CI_Model

{
    // proses pengetahuan
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
            ->join('t_kkm d', 'a.id_kelas = d.kelas', 'left')
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
            $this->db->select('k.*,mk.no_kd,mk.id_mapel')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['k.tasm' => $tasm])
            ->group_by('mk.tingkat')
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
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }

    public function get_detailnilai_pts($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.jenis' => 'PTS'])
            ->where(['k.penilaian' => 'PTS'])
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }

    public function get_detailnilai_pas($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,mk.tingkat,mk.kd_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.jenis' => 'PAS'])
            ->where(['k.penilaian' => 'PAS'])
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['k.tasm' => $tasm])
            ->get()->result_array();
        return $bagidata;
    }
    // end proses pengetahuan

    // export excel 
    public function get_exportnilai_pts($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*, s.nama, mk.tema, mk.no_kd, mk.nama_kd, mk.id_mapel, mk.tingkat, mk.kd_id')
            ->from('t_nilai_p k')
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
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.penilaian' => 'PAS'])
            ->get()->result_array();
        return $bagidata;
    }
    // end export excel 

    // ubah nilai
    public function edit_guru($id)
    {
        $bagidata =
            $this->db->select('gm.*,mm.nama,mk.rombel,pd.nama_lengkap')
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
            ->join('t_kkm d', 'c.id_mapel = d.id_mapel', 'left')
            ->where(['c.mapel_id' => $id], 'ASC')
            ->where(['a.ta' => $ta], 'ASC')
            ->group_by('b.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    // edit nilai
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
            $siswa = $this->db->get_where('t_nilai_p', ['id_guru_mapel' => $id, 'id_mapel_kd' => $bd['kd_id'], 'jenis' => $jenis, 'penilaian' => $pen, 'tasm' => $tasm, 'id_siswa' => $bd['nis']])->row_array();
            //var_dump($siswa);
            //var_dump($bd['nis']);
            //break;
            if ($siswa == 0) {
                $this->db->insert('t_nilai_p', ['id_guru_mapel' => $id, 'id_mapel_kd' => $bd['kd_id'], 'jenis' => $jenis, 'penilaian' => $pen, 'tasm' => $tasm, 'id_siswa' => $bd['nis']]);
            }
        }
        //die;

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.kd_id,mk.nama_kd,mk.id_mapel,gm.id_kelas,gm.mapel_id')
            ->from('t_nilai_p k')
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

    // hapus nilai 
    public function hapus_nilai($id, $kd, $pen, $jenis)

    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        // $ta = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,gm.id_kelas,gm.mapel_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['mk.kd_id' => $kd], 'ASC')
            ->where(['k.penilaian' => $pen], 'ASC')
            ->where(['k.jenis' => $jenis], 'ASC')
            ->where(['k.tasm' => $tasm], 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end hapus nilai

    public function edit_nilai_pts_pas($id, $pen, $jenis, $tasm)
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
            ->where(['k.ta' => $ta], 'ASC')
            ->get()->result_array();
        // return $bagidata;

        foreach ($bagidata as $bd) {
            $siswa = $this->db->get_where('t_nilai_p', ['id_guru_mapel' => $id, 'jenis' => $jenis, 'penilaian' => $pen, 'tasm' => $tasm, 'id_siswa' => $bd['nis']])->row_array();
            //var_dump($siswa);
            //var_dump($bd['nis']);
            //break;
            if ($siswa == 0) {
                $this->db->insert('t_nilai_p', ['id_guru_mapel' => $id, 'jenis' => $jenis, 'penilaian' => $pen, 'tasm' => $tasm, 'id_siswa' => $bd['nis']]);
            }
        }
        //die;

        $bagidata =
            $this->db->select('k.*,s.nama,mk.tema,mk.no_kd,mk.nama_kd,mk.id_mapel,gm.id_kelas,gm.mapel_id')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.mapel_id' => $id], 'ASC')
            ->where(['k.penilaian' => $pen], 'ASC')
            ->where(['k.jenis' => $jenis], 'ASC')
            ->where(['k.tasm' => $tasm], 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end ubah nilai

    // proses tambah nilai
    public function get_mapel($id)
    {
        $bagidata =
            $this->db->select('gm.*,mm.nama,mk.rombel,mg.nama_guru')
            ->from('t_guru_mapel gm')
            // ->join('l_campus lc', 'gm.kd_campus = lc.kd_campus', 'left')
            // ->join('l_sekolah ls', 'gm.kd_sekolah = ls.kd_sekolah', 'left')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kelas_siswa mk', 'gm.id_kelas = mk.rombel', 'left')
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
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->get()->result_array();
        return $data;
    }

    public function get_tingkat($id)
    {
        $bagidata =
            $this->db->select('a.*,b.semester')
            ->from('t_guru_mapel a')
            ->join('t_tahun b', 'a.kd_sekolah = b.kd_sekolah', 'left')
            ->where(['a.mapel_id' => $id, 'ASC'])
            ->where(['a.id_guru' => $this->session->userdata('nik')])
            ->where(['b.aktif' => 'Y'])
            ->get()->result();
        return $bagidata;
    }

    public function nilai_simpan()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nilai = $this->input->post('nilai');
        $p = $this->input->post();
        for ($i = 0; $i < count($id_siswa); $i++) {
            $data = [
                "id_guru_mapel" => $p['id_guru_mapel'],
                "id_mapel_kd" => $p['id_mapel_kd'],
                "id_siswa" => $id_siswa[$i],
                "jenis" => $p['jenis'],
                "nilai" => $nilai[$i],
                "tasm" => $p['tasm'],
                "penilaian" => $p['penilaian'],
            ];

            // var_dump($data);
            // die;

            $cek = $this->db->get_where('t_nilai_p', ['id_siswa' => $id_siswa[$i], 'id_guru_mapel' => $p['id_guru_mapel'], 'id_mapel_kd' => $p['id_mapel_kd'], 'jenis' => $p['jenis'], 'penilaian' => $p['penilaian'], 'tasm' => $p['tasm']])->row_array();
            // var_dump($cek);
            // die;

            if ($cek == 0) {
                $this->db->insert('t_nilai_p', $data);
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
                <h5><i class="icon fas fa-check"></i>Nialai yang dimasukkan sudah ada ! </h5>
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

    public function nilai_simpan_x()
    {
        $id_siswa = $this->input->post('id_siswa');
        $nilai = $this->input->post('nilai');
        $p = $this->input->post();
        for ($i = 0; $i < count($id_siswa); $i++) {
            $data = [
                "id_guru_mapel" => $p['id_guru_mapel'],
                "id_mapel_kd" => $p['id_mapel_kd'],
                "id_siswa" => $id_siswa[$i],
                "jenis" => $p['jenis'],
                "nilai" => $nilai[$i],
                "tasm" => $p['tasm'],
                "penilaian" => $p['penilaian'],
            ];

            // var_dump($data);
            // die;

            $cek = $this->db->get_where('t_nilai_p', ['id_siswa' => $id_siswa[$i], 'id_guru_mapel' => $p['id_guru_mapel'], 'id_mapel_kd' => $p['id_mapel_kd'], 'jenis' => $p['jenis'], 'penilaian' => $p['penilaian'], 'tasm' => $p['tasm']])->row_array();
            // var_dump($cek);
            // die;

            if ($cek == 0) {
                $this->db->insert('t_nilai_p', $data);
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
                <h5><i class="icon fas fa-check"></i>Nialai yang dimasukkan sudah ada ! </h5>
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
            $this->db->update('t_nilai_p', $data);

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
