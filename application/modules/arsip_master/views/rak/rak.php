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
      <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
        <div class="row">
          <!-- /.row -->
          <div class="animated fadeInLeft col-md-8">
            <div class="card card-info card-outline">
              <div class="card-header">
                <a class="btn btn-info btn-sm" href="<?php echo base_url(); ?>arsip_master/rak_tambah"><i class="bi bi-plus-square"> </i> Tambah Data</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-2">
                <table id="datatb" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr class="text-info">
                      <th>No</th>
                      <th>Rak Penyimpanan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($rak->result_array() as $data) { ?>
                      <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $data['nama_rak']; ?></td>
                        <td style="text-align:center;">
                          <a class="btn btn-warning btn-sm" href="<?php echo base_url() . 'arsip_master/rak_edit/' . $data['id_rak']; ?>"><i class="fa fa-edit"></i> </a>
                          <a href="<?php echo base_url('arsip_master/rak_delete/' . $data['id_rak']) ?>">
                            <button onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini ?')" class="btn btn-flat btn-sm btn-danger" title="Delete"><i class="fa fa-trash-alt"></i></button>
                          </a>
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


          <div class="animated fadeInRight col-md-4">
            <div class="callout callout-info">
              <br>
              <div class="card-body">
                <h4><span class="bi bi-info-circle-fill text-danger"></span> Petunjuk dan Bantuan</h4>
                <ol>
                  <li>
                    Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.
                  </li>
                  <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-xs btn-info"><span class="bi bi-plus-square"></span> Tambah </button>
                    untuk menambahkan <b><?php echo $judul; ?></b>.
                  </li>
                  <li>
                    Gunakan <i>button</i>
                    <button class="btn btn-xs btn-warning"><span class="bi bi-pencil-square"></span> Edit </button>
                    untuk Merubah <b><?php echo $judul; ?></b>.
                  </li>
                </ol>
                <p>
                  Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
                </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php if ($this->session->flashdata('success')) {
  echo '<script>
                    toastr.options.timeOut = 2000;
                    toastr.success("' . $this->session->flashdata('success') . '");
                    </script>';
} ?>

<?php if ($this->session->flashdata('error')) {
  echo '<script>
       toastr.options.timeOut = 2000;
       toastr.error("' . $this->session->flashdata('error') . '");
       </script>';
} ?>