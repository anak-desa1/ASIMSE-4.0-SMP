<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_nilai_model extends CI_Model

{
    // index
    public function get_tampil()
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('a.*,c.*')
            ->from('t_guru_mapel a')
            // ->join('l_sekolah b', 'a.kd_sekolah = b.kd_sekolah', 'left')
            ->join('m_mapel c', 'a.id_mapel = c.id', 'left')
            // ->join('m_guru d', 'a.id_guru = d.nip', 'left')
            ->where(['a.id_guru' => $this->session->userdata('nik')])
            // ->where(['d.tingkat' => 'smp'])
            ->where(['c.tingkat' => 'smp'])
            ->where(['a.th_active' =>  $tahun])
            // ->group_by('a.id_kelas', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end index 

}
