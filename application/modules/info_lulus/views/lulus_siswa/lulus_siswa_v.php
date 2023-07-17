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
            <div class="card">
                <div class="tampil-modal"></div>
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-body">
                    <div class="info-box">
                        <h5 class="card-title">Daftar <span>| Kelulusan</span></h5>
                    </div>
                    <button type="button" class="btn btn-primary mb-3 btn-action">
                            <span class="fa fa-plus"></span> Tambah Data
                        </button>
                        <a class="btn btn-success mb-3" href="<?= site_url('lulus_info/lulusInfo_siswa/create_lulus') ?>"><i class="fa fa-upload"></i> Import Excel</a>
                    <!-- <?php if ($cek_akses['role_id'] == 1) : ?>
                    <?php endif ?> -->
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-sm" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>No Surat</th>
                                    <th>TH Pelajaran</th>
                                    <th>Nama Siswa</th>
                                    <th>NIS</th>
                                    <th>NISN</th>  
                                    <th>Tempat Lahir</th>   
                                    <th>Tanggal Lahir</th>                            
                                    <th>Keterangan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($lulus as $sk) :
                                    $no++ ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $sk['no_surat'] ?></td>
                                        <td><?= $sk['tahun_pelajaran'] ?></td>
                                        <td><?= $sk['nama_siswa'] ?></td>
                                        <td><?= $sk['nis'] ?></td>
                                        <td><?= $sk['nisn'] ?></td>
                                        <td><?= $sk['tempat_lahir'] ?></td>
                                        <td><?= $sk['tanggal_lahir'] ?></td>
                                        <td><?= $sk['keterangan'] ?></td>
                                        <td>
                                            <?php if ($sk['status'] == 1) { ?>
                                                Aktif
                                            <?php } else { ?>
                                                Tidak Aktif
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-warning btn-edit" data-id="<?= $sk['lulus_id'] ?>">
                                                <i class=" fas fa-edit"></i>
                                            </button>
                                            <a href="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/dellulus/<?= $sk['lulus_id'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i></a>
                                            <a target="_blank" href="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>/detail_lulus/<?= $sk['lulus_id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
