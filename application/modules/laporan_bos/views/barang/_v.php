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
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan</th>
                                    <th>Kategori</th>
                                    <th>Harga Pokok</th>
                                    <th>Harga (Eceran)</th>
                                    <th>Harga (Grosir)</th>
                                    <th>Stok</th>
                                    <th>Min Stok</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($barang as $br) :
                                    $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $br['barang_id'] ?></td>
                                        <td><?= $br['barang_nama'] ?></td>
                                        <td><?= $br['barang_satuan'] ?></td>
                                        <td><?= $br['barang_kategori'] ?></td>
                                        <td><?= 'Rp ' . number_format($br['barang_harpok'], 0, ',', '.');  ?></td>
                                        <td><?= 'Rp ' . number_format($br['barang_harjul'], 0, ',', '.'); ?></td>
                                        <td><?= 'Rp ' . number_format($br['barang_harjul_grosir'], 0, ',', '.'); ?></td>
                                        <td><?= $br['barang_stok'] ?></td>
                                        <td><?= $br['barang_min_stok'] ?></td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-warning btn-edit" data-id="<?= $br['barang_id'] ?>">
                                                <i class=" fas fa-edit"></i>
                                            </button>
                                            <a href="<?= base_url() ?>lpj_bos/deldata_barang/<?= $br['barang_id'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i> </a>
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

        </div>
    </section>
    <!-- /.content -->
</div>
