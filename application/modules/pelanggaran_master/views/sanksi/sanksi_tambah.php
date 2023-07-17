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
              <div class="row">
                <!-- /.row -->
                <div class="animated fadeInLeft col-md-8">
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title"><i class="fas fa-ballot"></i> Input <?php echo $judul; ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="form-horizontal" role="form" action="<?php echo base_url(); ?>pelanggaran_master/sanksi_save" method="post">

                      <?php if ($this->session->flashdata('error')) { ?>
                        <div class="alert alert-danger">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="fa fa-remove"></i>
                          </button>
                          <span style="text-align: left;"><?php echo $this->session->flashdata('error'); ?></span>
                        </div>
                      <?php } ?>

                      <div class="card-body">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Dari Poin</label>
                          <div class="col-sm-12">
                            <input type="hidden" name="tipe" value="<?php echo $tipe; ?>">
                            <input type="hidden" name="id_sanksi" value="<?php echo $id_sanksi; ?>">
                            <input class="form-control" type="number" class="form-control" name="dari_poin" value="<?php echo $dari_poin; ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Sampai Poin</label>
                          <div class="col-sm-12">
                            <input type="number" class="form-control" name="sampai_poin" value="<?php echo $sampai_poin; ?>" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Keterangan Sanksi</label>
                          <div class="col-sm-12">
                            <input type="text" class="form-control" name="sanksi" value="<?php echo $sanksi; ?>" required>
                          </div>
                        </div>

                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right ml-3"><i class="fa fa-save"> </i> Simpan</button>
                        <a class="btn btn-danger float-right" href="<?php echo base_url(); ?>pelanggaran_master/sanksi_pelanggaran"><i class="fa fa-undo"> </i> Kembali</a>
                      </div>
                      <!-- /.card-footer -->
                    </form>
                  </div>
                </div>
                <div class="animated fadeInRight col-md-4">
                  <div class="callout callout-info">
                    <h4><span class="fa fa-info-circle text-danger"></span> Petunjuk dan Bantuan</h4>
                    <ol>
                      <li>
                        Isi <b><?php echo $judul; ?></b> selengkap dan sebenar mungkin.
                      </li>
                      <li>
                        Gunakan <i>button</i>
                        <button class="btn btn-xs btn-info"><span class="fa fa-save"></span> Simpan </button>
                        untuk menambahkan <b><?php echo $judul; ?></b>.
                      </li>
                    </ol>
                    <p>
                      Untuk <b>Keterangan</b> dan <b>Informasi</b> lebih lanjut silahkan hubungi <b>Bagian IT (Information &amp; Technology)</b>
                    </p>

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
