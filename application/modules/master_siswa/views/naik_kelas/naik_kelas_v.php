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
            <div class="card">
                <div class="tampil-modal"></div>
                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                <div class="card-body">
                    <div class="content">
                        <div class="panel">
                            <div class="panel-body">
                                <p>Pastikan Siswa sudah mengikuti proses <strong>daftar ulang</strong>, untuk menentukan kelas siswa</p>
                                <button type="button" class="btn btn-primary mb-3 btn-action-1">
                                    <span class="fa fa-plus"></span> Siswa Baru
                                </button>
                                <button type="button" class="btn btn-primary mb-3 btn-action-2">
                                    <span class="fa fa-plus"></span> Naik Kelas
                                </button>
                                <!-- <a class="btn btn-success mb-3" href="<?= site_url('master_siswa/naik_kelas/create') ?>"><i class="fa fa-upload"></i> Import Excel</a> -->
                                <!-- <a class="btn btn-primary mb-3" href="<?= site_url('master_siswa/naik_kelas') ?>"><i class="fa fa-users"></i> Data Siswa</a> -->
                                <!-- <?php if ($pegawai['bagian_shift'] == 'ON') : ?>
                                                                  <?php endif ?> -->
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="example1" style="font-size: 14px">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Tahun</th>
                                            <th>Status</th>
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



<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>