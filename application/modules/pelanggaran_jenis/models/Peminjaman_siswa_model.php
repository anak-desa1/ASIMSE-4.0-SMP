<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Peminjaman_siswa_model extends CI_Model
{


	public function peminjaman($tahun_ajaran)
	{
		$q = $this->db->query("SELECT * FROM mst_peminjaman_siswa  
			INNER JOIN m_siswa ON mst_peminjaman_siswa.id_siswa = m_siswa.siswa_id
			INNER JOIN mst_kelas ON mst_peminjaman_siswa.id_kelas = mst_kelas.id_kelas 
			WHERE mst_peminjaman_siswa.tahun_ajaran = '$tahun_ajaran' ORDER BY id_peminjaman_siswa DESC");
		return $q;
	}
}
