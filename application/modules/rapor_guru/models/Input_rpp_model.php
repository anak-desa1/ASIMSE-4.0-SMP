<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_rpp_model extends CI_Model

{
    // index
    public function get_tampil()
    {
        $this->db->select('*');
        $this->db->from('m_kelas');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_gururombel()
    {
        $bagidata =
            $this->db->select('k.*,s.nama_lengkap,s.foto,nk.*')
            ->from('t_walikelas k')
            ->join('m_guru nk', 'k.id_guru = nk.nip', 'left')
            ->join('pegawai_data s', 'nk.nip= s.nik', 'left')
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // proses tambah
    public function get_kelas()
    {
        $this->db->select('*');
        $this->db->from('m_kelas');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_tahun()
    {
        $this->db->select('*');
        $this->db->from('t_tahun');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_campus()
    {
        $this->db->select('*');
        $this->db->from('l_campus');
        $query = $this->db->get();
        return $query->result();
    }

    public function getLokasi()
    {
        return $this->db->get('l_sekolah')->result_array();
    }

    public function walikelas_simpan()
    {
        $p = $this->input->post();

        $data = [
            "kd_campus" => $p['kd_campus'],
            "kd_sekolah" => $p['kd_sekolah'],
            "id_guru" => $p['id_guru'],
            "id_kelas" => $p['id_kelas'],
            "th_active" => $p['th_active'],
        ];
        $this->db->insert('t_walikelas', $data);
        return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }
    // end proses tambah
}
