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
       
      <div class="col-12">
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>PERSYARATAN PENDAFTARAN/PEMBAYARAN</h4>
                        </div>
                        <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_info_persyaratan" role="form" id="form-action" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="sekolah_id" value="<?= $syarat['sekolah_id'] ?>">
                                <div class="form-group">
                                    <label>Isi dengan Persyaratan Pendaftaran/Pembayaran</label>
                                    <textarea name="info" id="ckeditor_1" class="summernote" required><?= $syarat['syarat'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="col-12">
            <!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?> -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>INFO WA</h4>
                        </div>
                        <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_info_wa" role="form" id="form-action" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="sekolah_id" value="<?= $syarat['sekolah_id'] ?>">
                                <div class="form-group">
                                    <p><label>Isi dengan informasi yang akan dikirimkan kesiswa</label></p>
                                    <textarea name="nolivechat"  class="summernote" rows="4" cols="50" required><?= $syarat['nolivechat'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan Info</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>

<!-- /.content-wrapper -->
<script src="<?= base_url() ?>panel/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor_1');
    CKEDITOR.replace('ckeditor_2');
</script>