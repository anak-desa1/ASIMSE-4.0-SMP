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
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/simpan_lulus_data" role="form" id="form-action" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="modal-body">
                            <input type="hidden" name="id_data" value="<?=$publis['id_data']?>" >
                                
                            <div class="col-md-12">
                                <label>Header Surat</label>
                                <div class="mb-3 text-center">
                                    <img src="<?= base_url(); ?>panel/dist/upload/logo/<?= $publis['logo'] ?>" alt="..." style="width:100%;max-width:750px">
                                    <input type="hidden" name="old_image" value="<?= $publis['logo'] ?>" />
                                </div>                                   
                            </div>
                            <div class="col-4">
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="logo" name="logo" placeholder="">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Kata Pembuka</label>                                    
                                <textarea class="form-control" id="ckeditor_1" name="kata_pembuka" rows="2" data-form-field="Pembuka" placeholder="" autofocus="" style="display: none;"><?= $publis['kata_pembuka'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Kata Isi</label>                                    
                                <textarea class="form-control" id="ckeditor_2" name="kata_isi" rows="2" data-form-field="Isi" placeholder="" autofocus="" style="display: none;"><?= $publis['kata_isi'] ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label>Kata Penutup</label>                                    
                                <textarea class="form-control" id="ckeditor_3" name="kata_penutup" rows="2" data-form-field="Penutup" placeholder="" autofocus="" style="display: none;"><?= $publis['kata_penutup'] ?></textarea>
                            </div>
                                                                
                            <div class="row">   
                                <div class="col-4">
                                    <div class="col-md-12">
                                        <label>Ttd Surat</label>
                                        <div class="mb-3 text-center">
                                            <img src="<?= base_url(); ?>panel/dist/upload/logo/<?= $publis['ttd_kepsek'] ?>" alt="..." style="width:100%;max-width:750px">
                                            <input type="hidden" name="old_image" value="<?= $publis['ttd_kepsek'] ?>" />
                                        </div>                                   
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input type="file" class="form-control" id="ttd_kepsek" name="ttd_kepsek" placeholder="">
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-4">
                                    <label>Kota</label>
                                    <input type="text" name="kota" value="<?=$publis['kota']?>" class="form-control" placeholder="Kota" required>
                                    <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-4">
                                    <label>Tanggal Publish</label>
                                    <?php
                                        $date = date("Y-m-d\TH:i:s", strtotime($publis['tanggal_publis']));
                                    ?>
                                    <input type="datetime-local" name="tanggal_publis" value="<?= $date?>" class="form-control" placeholder="Tanggal Publish" required>
                                    <?= form_error('tanggal_publis', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>                                                              
                            </div>                              
                               
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </form>
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.content-wrapper -->
<script src="<?= base_url() ?>panel/plugins/ckeditor/ckeditor.js"></script>
<script>
     CKEDITOR.replace('ckeditor_1');
     var ck_ed = CKEDITOR.instances.ckeditor.getData();
 </script>
 <script>
     CKEDITOR.replace('ckeditor_2');
     var ck_ed = CKEDITOR.instances.ckeditor.getData();
 </script>
 <script>
     CKEDITOR.replace('ckeditor_3');
     var ck_ed = CKEDITOR.instances.ckeditor.getData();
 </script>