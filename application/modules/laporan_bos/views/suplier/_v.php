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
                        <table class="table table-striped table-sm" id="" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama Suplier</th>
                                    <th>Alamat</th>
                                    <th>No Telp/ HP</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($suplier as $sp) :
                                    $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $sp['suplier_nama'] ?></td>
                                        <td><?= $sp['suplier_alamat'] ?></td>
                                        <td><?= $sp['suplier_notelp'] ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-warning btn-edit" data-id="<?= $sp['suplier_id'] ?>">
                                                <i class=" fas fa-edit"></i>
                                            </button>
                                            <a href="<?= base_url() ?>lpj_bos/deldata_suplier/<?= $sp['suplier_id'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i> </a>
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
    </section>
    <!-- /.content -->
</div>
