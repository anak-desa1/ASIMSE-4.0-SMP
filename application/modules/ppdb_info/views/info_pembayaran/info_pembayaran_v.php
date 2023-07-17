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
                            <h4>INFO PEMBAYARAN</h4>
                        </div>
                        <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_info_pembayaran" role="form" id="form-action" enctype="multipart/form-data">
                            <div class="card-body">
                                <input type="hidden" name="sekolah_id" value="<?= $infobayar['sekolah_id'] ?>">
                                <div class="form-group">
                                    <label>Isi dengan cara pembayaran</label>
                                    <textarea id="ckeditor" class="form-control" name="info" required><?= $infobayar['infobayar'] ?></textarea>
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
    CKEDITOR.replace('ckeditor');
</script>