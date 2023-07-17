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
            <div class="card">
                <div class="tampil-modal"></div>
                <div class="card-body">
                    <br>
                    <?php if ($cek_akses['role_id'] == 1) : ?>
                        <button type="button" class="btn btn-primary mb-3 btn-action">
                            <span class="fa fa-plus"></span> Tambah Data
                        </button>
                    <?php endif ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-sm" id="myTable" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Kode Biaya</th>
                                    <th>Periode</th>
                                    <th>Jenis Daftar</th>
                                    <th>Nama Biaya</th>
                                    <th>Jumlah Biaya</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($biaya as $biaya) :
                                    $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $biaya['id_biaya'] ?></td>
                                        <td><?= $biaya['periode'] ?></td>
                                        <td><?= $biaya['jenis_daftar'] ?></td>
                                        <td><?= $biaya['nama_biaya'] ?></td>
                                        <td><?= 'Rp ' . number_format($biaya['jumlah'], 0, ',', '.'); ?></td>
                                        <td>
                                            <?php if ($biaya['status'] == 1) { ?>
                                                <span class="badge bg-success">Aktif</span>
                                            <?php } else { ?>
                                                <span class="badge bg-danger">Non Aktif</span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-warning btn-edit" data-id="<?= $biaya['id_biaya'] ?>">
                                                <i class=" fas fa-edit"></i>
                                            </button>
                                            <a href="<?= base_url() ?>ppdb_biaya/deldata/<?= $biaya['id_biaya'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>
