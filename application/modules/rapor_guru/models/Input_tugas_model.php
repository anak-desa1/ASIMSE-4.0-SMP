<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_tugas_model extends CI_Model

{
    // index
    public function get_tampil()
    {
        $bagidata =
            $this->db->select('k.*,m.*,sh.*')
            ->from('t_guru_mapel k')
            ->join('l_sekolah sh', 'k.kd_sekolah = sh.kd_sekolah', 'left')
            ->join('m_mapel m', 'k.id_mapel = m.id', 'left')
            ->where(['k.id_guru' => $this->session->userdata('nik')])
            // ->group_by('k.id_kelas')
            ->get()->result_array();
        return $bagidata;
    }
    // end index 

}
