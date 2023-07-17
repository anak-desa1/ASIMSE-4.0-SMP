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

<div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
    <div class='col-md-12'>
        <div class='box box-info'>

            <div class="card">
                <div class="card-body">
                    <br>

                    <div class='box-header with-border'>
                        <h3 class='box-title'>TANDA TANGAN</h3>
                    </div>

                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>

                    <form class='form-horizontal' role='form' method=POST action='<?= base_url() ?>siswa_qrcode/ttd/update' enctype='multipart/form-data'><br>
                        <input type='hidden' name='kd_campus' value='<?= $pegawai['kd_campus'] ?>'>
                        <input type='hidden' name='kd_sekolah' value='<?= $pegawai['kd_sekolah'] ?>'>
                        <input type='hidden' name='id_blangko' value='<?= $balangko['id_blangko'] ?>'>

                        <div class="alert bg-orange alert-dismissible">
                            <h4><i class="icon fa fa-info-circle"></i> Informasi Penting</h4>
                            <div class="box-body">
                                Silahkan upload tanda tangan pimpinan/institusi/universitas, dengan format (.png).</a>
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-sm-3 control-label'>Tanda Tangan Saat Ini:</label>
                            <div class='col-sm-6'>
                                <img class="img-responsive img-thumbnail" alt="Responsive image" src="<?= base_url() ?>panel/assets/img/tandatangan/<?= $balangko['ttd'] ?>" width="430px"><br><?= $balangko['ttd'] ?>
                                <input type="hidden" name="old_image" value="<?= $balangko['ttd'] ?>" />
                            </div>
                        </div>


                        <div class='form-group'>
                            <label class='col-sm-3 control-label'>Ganti Tanda Tangan Baru:</label>
                            <div class='col-sm-6'>
                                <input type='file' class='form-control' name='ttd'>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='col-sm-3 control-label'>Nama Pimpinan:</label>
                            <div class='col-sm-6'>
                                <input type='text' class='form-control' name='kepsek' value="<?= $balangko['kepsek'] ?>">
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='col-sm-3 control-label'>NIP Pimpinan:</label>
                            <div class='col-sm-6'>
                                <input type='text' class='form-control' name='nip' value="<?= $balangko['nip'] ?>">
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='col-sm-3 control-label'>Tanggal TTD:</label>
                            <div class='col-sm-6'>
                                <input type='date' class='form-control' name='ttd_date' value="<?= $balangko['ttd_date'] ?>">
                            </div>
                        </div>
                        <div class='form-group'>
                            <label class='col-sm-3 control-label'>Kota:</label>
                            <div class='col-sm-6'>
                                <input type='text' class='form-control' name='kota' value="<?= $balangko['kota'] ?>">
                            </div>
                        </div>

                        <div class='form-group'>
                            <label class='col-sm-3 control-label'></label>
                            <div class='col-sm-6'>
                                <button style="width: 100px" type="submit" name="simpan" class="btn btn-flat btn-primary">SIMPAN</button>
                                <!-- <a href="home"><button style="width: 100px" type="button" class="btn btn-flat btn-danger">BATAL</button></a> -->
                            </div>
                        </div><br>
                    </form>

                </div>
            </div>

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