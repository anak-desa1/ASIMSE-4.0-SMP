<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Input_kd_model extends CI_Model

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
            ->join('m_mapel c', 'a.id_mapel = c.id', 'left')         
            ->where(['a.id_guru' => $this->session->userdata('nik')])           
            ->where(['c.tingkat' => 'smp'])
            ->where(['a.th_active' =>  $tahun])           
            ->get()->result_array();
        return $bagidata;
    }
    // end index
    // detail
    public function get_detailkd($id)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $bagidata =
            $this->db->select('k.*,ks.*,pd.nama_lengkap,m.nama')
            ->from('t_guru_mapel k')
            // ->join('l_campus c', 'k.kd_campus = c.kd_campus', 'left')
            // ->join('l_sekolah sh', 'k.kd_sekolah = sh.kd_sekolah', 'left')
            ->join('m_kelas ks', 'k.id_kelas = ks.tingkat', 'left')
            ->join('m_mapel m', 'k.id_mapel = m.id', 'left')
            ->join('pegawai_data pd', 'k.id_guru = pd.nik', 'left')
            // ->join('t_tahun th', 'k.kd_sekolah = th.kd_sekolah', 'left')
            ->where(['k.id_guru' => $this->session->userdata('nik')])
            ->where(['k.mapel_id' => $id])
            ->where(['k.th_active' =>  $tahun])
            // ->where(['th.aktif' => 'Y'])
            // ->group_by('k.id_guru')
            ->get()->row_array();
        return $bagidata;
    }

    public function get_kd($id, $target)
    {
        $get_tasm = $this->db->get_where('t_tahun', ['aktif' => 'Y'])->row_array();
        $data['tasm'] = $get_tasm['tahun'];
        $tahun = substr($data['tasm'], 0, 4);
        $tasm = $get_tasm['tahun'];

        $bagidata =
            $this->db->select('k.*')
            ->from('t_mapel_kd k')
            ->join('t_guru_mapel gm', 'k.id_mapel = gm.mapel_id', 'left')
            // ->join('t_tahun th', 'gm.kd_sekolah = th.kd_sekolah', 'left')
            ->where(['gm.id_guru' => $this->session->userdata('nik')])
            ->where(['gm.mapel_id' => $id])
            ->where(['k.tingkat' => $target])
            ->where(['k.tasm' =>  $tasm])
            ->where(['gm.th_active' =>  $tahun])
            ->group_by('k.kd_id', 'ASC')
            ->get()->result_array();
        return $bagidata;
    }
    // end detail
    // proses tambah
    public function get_tambahkd($id)
    {
        $bagidata =
            $this->db->select('k.*,ks.id_kelas tingkat,pd.nama_lengkap,m.nama')
            ->from('t_guru_mapel k')
            // ->join('l_campus c', 'k.kd_campus = c.kd_campus', 'left')
            // ->join('l_sekolah sh', 'k.kd_sekolah = sh.kd_sekolah', 'left')
            ->join('t_kelas_siswa ks', 'k.id_kelas = ks.rombel', 'left')
            ->join('m_mapel m', 'k.id_mapel = m.id', 'left')
            ->join('pegawai_data pd', 'k.id_guru = pd.nik', 'left')
            ->where(['k.id_guru' => $this->session->userdata('nik')])
            ->where(['k.mapel_id' => $id])
            // ->group_by('k.id_guru')
            ->get()->row_array();
        return $bagidata;
    }

    public function kd_simpan()
    {
        $no_kd = $this->input->post('no_kd', true);
        $nama_kd = $this->input->post('nama_kd', true);
        $p = $this->input->post();

        for ($i = 0; $i < sizeof($no_kd); $i++) {

            $data = [
                "no_kd" =>  $no_kd[$i],
                "jenis" => $p['jenis'],
                "nama_kd" => $nama_kd[$i],
                // "kd_campus" => $p['kd_campus'],
                // "kd_sekolah" => $p['kd_sekolah'],
                "id_guru" => $p['id_guru'],
                "id_mapel" => $p['id_mapel'],
                "semester" => $p['semester'],
                "tingkat" => $p['tingkat'],
                "tasm" => $p['tasm'],
            ];

            $cek =  $this->db->get_where('t_mapel_kd',  ['id_guru' => $p['id_guru'], 'id_mapel' => $p['id_mapel'], 'semester' => $p['semester'], 'tingkat' => $p['tingkat'], 'tasm' => $p['tasm'], "no_kd" =>  $no_kd[$i]])->row_array();
            // var_dump($cek);
            // die;

            if ($cek['no_kd'] == 0) {
                $this->db->insert('t_mapel_kd', $data);
                $this->session->set_flashdata('message', ' 
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>Berhasil tambah kd ! </h5>
                </div>
                ');
            } else {
                $this->session->set_flashdata('message', ' 
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i>KD yang dimasukkan sudah ada ! </h5>
                </div>
                ');
            }
        }

        // $id_mapel = $this->input->post('id_mapel', true);
        // $data1 = [
        //     'mapel_activate' => 1,
        // ];
        // $this->db->where('id_mapel', $id_mapel);
        // $this->db->update('t_guru_mapel', $data1);
    }


    public function kd_ubah()
    {
        // cek user exist
        $kd_id = $this->input->post('kd_id', true);
        // $tema = $this->input->post('tema', true);
        $semester = $this->input->post('semester', true);
        $no_kd = $this->input->post('no_kd', true);
        $nama_kd = $this->input->post('nama_kd', true);

        $data = [
            // 'tema' => $tema,
            'semester' => $semester,
            'no_kd' => $no_kd,
            'nama_kd' => $nama_kd,
        ];

        $this->db->where('kd_id', $kd_id);
        $this->db->update('t_mapel_kd', $data);
        // return json_encode(['status' => 'success', 'pesan' => 'Data berhasil disimpan !']);
    }
    // end proses tambah
}
