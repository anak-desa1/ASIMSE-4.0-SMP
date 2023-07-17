<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_rapor_pas_model extends CI_Model

{
    // proses pengetahuan
    // index
    public function get_kota()
    {
        $bagidata =
            $this->db->select('a.*, b.kota')
            ->from('m_sekolah a')
            ->join('m_kota b', 'a.sekolah_kota_id = b.kota_id ', 'left')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_siswa()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru')
            ->from('t_kelas_siswa k')          
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')          
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')         
            ->where(['k.ta' =>  $tahun])
            ->where(['w.tasm' =>  $tahun])
            ->group_by('s.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_nilai_np()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.no_kd,gm.id_mapel,mk.tema,gm.id_kelas')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')       
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')         
            ->where(['k.ta' =>  $tahun])
            ->where(['gm.tasm' =>  $tahun])
            ->group_by('k.jenis,k.id_mapel_kd')
            ->get()->result_array();
        return $bagidata;
    }
    // end index

    // detail
    public function get_header($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nis,s.nisn,s.nama')
            ->from('t_kelas_siswa k')           
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')           
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' =>  $tahun])
            // ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_pasmapel($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mm.kd_singkat,mm.nama,mm.kd_singkat,mm.kelompok,tk.kkm,gm.id_mapel')
            ->from('t_kelas_siswa k')
            ->join('t_mapel_kd ks', 'k.rombel = ks.tingkat', 'left')
            ->join('t_guru_mapel gm', 'k.rombel = gm.id_kelas', 'left')
            ->join('m_mapel mm', 'gm.id_mapel = mm.id', 'left')
            ->join('t_kkm tk', 'gm.id_mapel = tk.id_mapel', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' =>  $tahun])
            ->where(['tk.ta' =>  $tahun])
            ->where(['gm.tasm' =>  $tahun])
            ->group_by('gm.id_mapel,k.id_kelas')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_footer_1($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,pd.nama_guru,pd.nip')
            ->from('t_kelas_siswa k')
            ->join('t_walikelas w', 'k.rombel= w.id_kelas', 'left')
            ->join('m_guru pd', 'pd.nip = w.id_guru', 'left')
            ->where(['k.ta' =>  $tahun])
            ->where(['k.rombel' => $id, 'ASC'])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_footer_2($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*')
            ->from('t_kelas_siswa k')
            ->where(['k.ta' =>  $tahun])
            ->where(['k.rombel' => $id, 'ASC'])
            ->get()->row_array();
        return $bagidata;
    }

    public function get_min($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select_min('tk.kkm')
            ->from('t_kelas_siswa k')
            ->join('t_guru_mapel gm', 'k.rombel = gm.id_kelas', 'left')
            ->join('t_kkm tk', 'gm.id_mapel = tk.id_mapel', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.ta' => $tahun])
            ->where(['gm.tasm' => $tahun])
            ->get()->row_array();
        return $bagidata;
    }
    // end detail

    // isi nilai   
    public function get_nilai_p($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd,mk.no_kd,gm.id_mapel,mk.tema,gm.id_kelas,s.nama')
            ->from('t_nilai_p k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')          
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['k.tasm' =>  $tasm])
            ->where(['gm.tasm' =>  $tahun])           
            ->get()->result_array();
        return $bagidata;
    }

    public function get_nilai_k($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd,mk.no_kd,gm.id_mapel,mk.tema,s.nama')
            ->from('t_nilai_p_ket k')
            ->join('t_mapel_kd mk', 'k.id_mapel_kd = mk.kd_id', 'left')        
            ->join('t_guru_mapel gm', 'k.id_guru_mapel = gm.mapel_id', 'left')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->where(['gm.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.tasm' =>  $tasm])
            ->where(['gm.tasm' =>  $tahun])         
            ->get()->result_array();
        return $bagidata;
    }
    // end isi nilai

    // sikap spiritual
    public function q_list_kd_sp()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSp'])
            ->get();
        return $bagidata;
    }

    public function get_sp($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd, mk.kd_id')
            ->from('t_nilai_sikap_sp k')
            ->join('t_mapel_kd mk', 'k.selalu = mk.kd_id', 'left')        
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['mk.jenis' => 'SSp'])
            ->where(['k.tasm' =>  $tasm])           
            ->where(['k.penilaian' => 'PAS'])
            ->group_by('k.selalu')
            ->get()->result_array();
        return $bagidata;
    }

    public function get_sp_mm($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd')
            ->from('t_nilai_sikap_sp k')
            ->join('t_mapel_kd mk', 'k.mulai_meningkat = mk.kd_id', 'left')          
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['mk.jenis' => 'SSp'])           
            ->where(['k.penilaian' => 'PAS'])
            ->where(['k.tasm' =>  $tasm])
            ->group_by('k.mulai_meningkat')
            ->get()->result_array();
        return $bagidata;
    }
    // end sikap spiritual

    // sikap sosial
    public function q_list_kd_so()
    {
        $bagidata =
            $this->db->select('*')
            ->from('t_mapel_kd')
            ->where(['jenis' => 'SSo'])
            ->get();
        return $bagidata;
    }

    public function get_so($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd')
            ->from('t_nilai_sikap_so k')
            ->join('t_mapel_kd mk', 'k.selalu = mk.kd_id', 'left')            
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['mk.jenis' => 'SSo'])           
            ->where(['k.penilaian' => 'PAS'])
            ->where(['k.tasm' =>  $tasm])
            ->group_by('k.selalu')
            ->get()->result_array();
        return $bagidata;
    }
    public function get_so_mm($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,mk.nama_kd')
            ->from('t_nilai_sikap_so k')
            ->join('t_mapel_kd mk', 'k.mulai_meningkat = mk.kd_id', 'left')            
            ->where(['k.id_kelas' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target])
            ->where(['mk.jenis' => 'SSo'])         
            ->where(['k.penilaian' => 'PAS'])
            ->where(['k.tasm' =>  $tasm])
            ->group_by('k.mulai_meningkat')
            ->get()->result_array();
        return $bagidata;
    }
    // end sikap sosial

    // ekstrakurikuluer
    public function get_ekskul($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,ne.*,me.nama ekskul')
            ->from('t_kelas_siswa k')           
            ->join('t_nilai_ekstra ne', 'k.id_siswa = ne.id_siswa', 'left')
            ->join('m_ekstra me', 'ne.id_ekstra = me.id', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' =>  $tahun])           
            ->group_by('ne.id_ekstra','me.nama', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end ekstrakurikuluer

    // tinggi_berat
    public function get_tinggi_berat_1($id, $target)
    {
        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru,tg.*,s.nis')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('t_tinggi_berat tg', 'k.id_siswa = tg.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['tg.semester' => 1])
            ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }
    public function get_tinggi_berat_2($id, $target)
    {
        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru,tg.*,s.nis')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('t_tinggi_berat tg', 'k.id_siswa = tg.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['tg.semester' => 2])
            ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }
    // end tinggi_berat

    // kesehatan
    public function get_kesehatan($id, $target)
    {
        $bagidata =
            $this->db->select('k.*,ne.*')
            ->from('t_kelas_siswa k')
            ->join('t_kesehatan ne', 'k.id_siswa = ne.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->get()->result_array();
        return $bagidata;
    }
    // end kesehatan

    // prestasi
    public function get_prestasi($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,ne.*')
            ->from('t_kelas_siswa k')          
            ->join('t_prestasi ne', 'k.id_siswa = ne.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' =>  $tahun])
            // ->where(['tt.aktif' => 'Y'])
            ->get()->result_array();
        return $bagidata;
    }
    // end prestasi

    // absensi
    public function get_absensi($id, $target, $th)
    {

        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru,na.*,s.nis')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')         
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('t_nilai_absensi na', 'k.id_siswa = na.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['na.tasm' => $th])
            ->where(['k.ta' =>  $tahun])        
            ->where(['na.penilaian' => 'PAS'])
            ->group_by('s.nama', 'ASC')
            ->get()->row_array();
        return $bagidata;
    }
    // end absensi

    // catatan walikelas
    public function get_catatan($id, $target, $th)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,s.nama,w.id_guru,na.*,s.nis')
            ->from('t_kelas_siswa k')
            ->join('m_siswa s', 'k.id_siswa = s.nis', 'left')          
            ->join('t_walikelas w', 'k.rombel = w.id_kelas', 'left')
            ->join('t_naik_kelas na', 'k.id_siswa = na.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['na.tasm' => $th])          
            ->where(['na.penilaian' => 'PAS'])
            ->where(['k.ta' =>  $tahun])
            ->group_by('s.nama', 'ASC')           
            ->get()->row_array();
        return $bagidata;
    }
    // end catatan walikelas

    // naik_kelas
    public function get_naik_kelas($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*,ne.*')
            ->from('t_kelas_siswa k')         
            ->join('t_naik_kelas ne', 'k.id_siswa = ne.id_siswa', 'left')
            ->where(['k.rombel' => $id, 'ASC'])
            ->where(['k.id_siswa' => $target, 'ASC'])
            ->where(['k.ta' =>  $tahun])          
            ->get()->row_array();
        return $bagidata;
    }
    // end naik_kelas
}
