<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BarangSita_siswa_model extends CI_Model
{


	public function barangsita($tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM mst_barangsita_siswa  
			INNER JOIN m_siswa ON mst_barangsita_siswa.id_siswa = m_siswa.siswa_id
			INNER JOIN l_kelas ON mst_barangsita_siswa.id_kelas = l_kelas.l_kelas_id 
			WHERE mst_barangsita_siswa.tahun_ajaran = '$tahun_ajaran' ORDER BY id_barangsita_siswa DESC");
		return $q;
	}
}
