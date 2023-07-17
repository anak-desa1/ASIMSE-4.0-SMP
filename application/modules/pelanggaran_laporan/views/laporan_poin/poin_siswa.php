<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<?php
$sekolah = $this->db->query("SELECT * FROM m_sekolah WHERE sekolah_id = 1")->row();
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
                        <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <!-- Default box -->
            <div class="container-fluid">
              <!-- /.row -->
              <div class="row">
                <div class=" col-md-12">
                  <div class="card card-info card-outline">
                    <div class="card-header col-md-12">

                      <a><i class="fa fa-file-search text-info"> </i> Cari Data Poin Pelanggaran Berdasarkan</a>
                      <form role="form" action="<?php echo base_url(); ?>pelanggaran_laporan/proses_tampil_poin_siswa" method="post">
                        <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Kelas</label>
                              <select class="form-control select2" type="text" name="id_kelas">
                                <?php echo $combo_kelas; ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label>Tahun Ajaran</label>
                            <div class="form-group">
                              <select class="form-control select2" type="text" name="tahun_ajaran">
                                <?php echo $combo_tahun_ajaran; ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <label>&nbsp;</label>
                            <div class="form-group">
                              <button class="btn btn-info"><i class="fa fa-search "> </i> Tampilkan Data</button>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <label>&nbsp;</label>
                            <div class="form-group ">
                              <button class="btn btn-danger float-right" onclick="printDiv('cetak')"><i class="fa fa-print "> </i> Print Data</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.card-header -->
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card" id="cetak">
                      <div class="card-header border-transparent">
                        <center>
                          <h4 class="m-0 text-dark mt-3" style="text-shadow: 2px 2px 4px #17a2b8;">
                            <img src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah->logo; ?>" alt="Logo" class="brand-image img-rounded " style="width:60px;height:60px;">
                            <br><?php echo $nama_sekolah ?>
                          </h4>
                          <h4>Laporan Poin Pelanggaran Siswa</h4>
                          <p style="margin:0;">Tahun Ajaran : <?php echo str_replace("-", "/", $tahun_ajaran); ?></p>
                        </center>
                        <div class="card-tools">

                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table m-0 table-hover">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th class="text-center">Total Poin</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              $total_poin = 0;
                              $poin_siswa = $this->db->query("SELECT mst_pelanggaran_siswa.id_siswa,mst_pelanggaran_siswa.poin_minus,m_siswa.nis,m_siswa.nama,l_kelas.kelas FROM mst_pelanggaran_siswa 
                                            INNER JOIN m_siswa ON mst_pelanggaran_siswa.id_siswa = m_siswa.siswa_id
                                            INNER JOIN l_kelas ON mst_pelanggaran_siswa.id_kelas = l_kelas.l_kelas_id
                                            WHERE mst_pelanggaran_siswa.tahun_ajaran = '$tahun_ajaran' GROUP BY mst_pelanggaran_siswa.id_siswa");
                              foreach ($poin_siswa->result_array() as $data) {
                                $poin = $this->db->query("SELECT SUM(poin_minus) as hitung FROM mst_pelanggaran_siswa WHERE id_siswa = '$data[id_siswa]'")->row();
                              ?>
                                <tr>
                                  <td class="text-sm"><?php echo $no; ?></td>
                                  <td class="text-sm"><?php echo $data['nis']; ?></td>
                                  <td class="text-sm"><?php echo $data['nama_siswa']; ?></td>
                                  <td class="text-sm"><?php echo $data['nama_kelas']; ?></td>
                                  <td class="text-sm" style="text-align:center;"><?php echo $poin->hitung; ?></td>
                                </tr>
                              <?php $no++;
                              } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                      <!-- /.card-body -->
                      <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                  </div>
                  <!-- /.col -->
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
