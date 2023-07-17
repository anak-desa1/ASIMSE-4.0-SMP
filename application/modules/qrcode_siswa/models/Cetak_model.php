<?php
class Cetak_model extends Ci_Model
{
    public function get_siswarombel($ta)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $ta = substr($data['tasm'], 0, 4);

        $bagidata =
            $this->db->select('*')
            ->from('l_kelas')
            ->get()->result_array();
        return $bagidata;
    }

    public function kartu_siswa($id_siswa)
    {
        $this->db->where_in('nis', $id_siswa);
        return $this->db->get('m_siswa');
    }
}
