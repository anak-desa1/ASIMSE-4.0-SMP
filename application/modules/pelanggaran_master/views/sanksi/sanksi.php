<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
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
        <div class="animated fadeInUp col-12">
          <div class="card card-info card-outline">
            <div class="card-header">
              <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>pelanggaran_master/sanksi_tambah"><i class="fa fa-plus"> </i> Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-2">
              <table id="datatb" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr class="text-info">
                    <th>No</th>
                    <th>Range</th>
                    <th>Sanksi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($sanksi->result_array() as $data) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $data['dari_poin'] . ' - ' . $data['sampai_poin']; ?></td>
                      <td><?php echo $data['sanksi']; ?></td>
                      <td style="text-align:center;width:80px;">
                        <a class="btn btn-warning btn-xs" href="<?php echo base_url() . 'pelanggaran_master/sanksi_edit/' . $data['id_sanksi']; ?>"><i class="fa fa-edit"> </i> </a> |
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url() . 'pelanggaran_master/sanksi_hapus/' . $data['id_sanksi']; ?>" onclick="return confirm('Yakin ingin hapus data ? ');"><i class="fa fa-trash"> </i> </a>
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
