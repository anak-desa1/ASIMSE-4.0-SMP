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

                <div class="card-body">
                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="box box-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">GENERATE QRCODE</h3>
                                    </div>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">INPUT NAMA DI SINI</label>
                                            <input type="text" onChang="ready()" id="id" name="nik" class="form-control" placeholder="Masukkan Nama yang terdaftar di Data Guru">
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <button onClick="ready()" onFocus="ready()" type="button" class="btn  btn-primary btn-lg btn3d">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box box-info">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">INFORMASI QRCODE AKAN MUNCUL DISINI</h3>
                                    </div>
                                    <div class="box-body ajax-content" id="showR"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>

        <div class="col-12">
            <div class="card">
                <div class="tampil-modal"></div>
                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                <div class="card-body">
                    <div class="panel-body">
                        <?php if ($cek_akses['role_id'] == 1) : ?>
                            <button type="button" class="btn btn-primary mb-3 btn-action">
                                <span class="bi bi-plus-square"></span> Tambah Data
                            </button>
                        <?php endif ?>
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>QRCode</th>
                                        <th>Nama / Username</th>
                                        <th>Jenis PTK</th>
                                        <th>Status User</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>

<link rel="stylesheet" href="<?= base_url() ?>panel/plugins/jQueryUI/css/jquery-ui.css">
<script src="<?= base_url() ?>panel/plugins/jQueryUI/js/jquery-ui.js"></script>

<script type="text/javascript">
    function pindah() {
        $('#id').focus();
    };

    function ready() {
        var id = $('#id').val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('/akademik_master/master_guru/showw') ?>',
            data: `id=${id}`,
            beforeSend: function(msg) {
                $('#showR').html('<h1><i class="fa fa-spin fa-refresh" /></h1>');
            },
            success: function(msg) {
                $('#showR').html(msg);
                $('#nik').focus();
            }
        });
    }
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#id').autocomplete({
            source: "<?= site_url('akademik_master/master_guru/get_autocomplete'); ?>",
            select: function(event, ui) {
                $('[name="qr"]').val(ui.item.label);
            }
        });
    });
</script>