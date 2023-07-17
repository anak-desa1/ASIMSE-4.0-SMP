<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
              <li class="breadcrumb-item active"><?= $subtitle; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
      <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-users"></i>
                    DAFTAR NILAI
                </h3>
                <div class="card-tools">
                    <a class="btn btn-secondary btn-sm" href="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>">Back</a>
                    <a href="<?= base_url('Kursus/export_nilai/') . $id_materi ?>" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export</a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-valign-middle table-striped table-sm" style="font-size: 14px"">
                    <thead>
                        <tr>
                            <th width='10'>No</th>
                            <th>Nama Siswa</th>
                            <th>Periode</th>
                            <th>Salah</th>
                            <th>Benar</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($nilai as $nilai) {
                            $siswa = $this->db->get_where('ppdb_daftar', ['no_daftar' => $nilai['id_siswa']])->row_array();
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $siswa['nama'] ?></td>
                                <td><?= $siswa['periode'] ?></td>
                                <td><?= $nilai['salah'] ?></td>
                                <td><?= $nilai['benar'] ?></td>
                                <td><?= $nilai['nilai'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card -->
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>
<!-- /.content-wrapper -->