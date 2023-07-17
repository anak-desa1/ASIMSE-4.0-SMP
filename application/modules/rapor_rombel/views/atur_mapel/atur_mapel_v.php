<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
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
       
      <div class="card-body">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-edit"></i>
                        <?= $subtitle ?>
                    </h3>
                </div>
                <!-- Default box -->
                <div class="card-body p-0" style="display: block;">
                    <div class="tampil-modal"></div>
                    <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                    <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                    <div class="card-header">
                        <h3 class="card-title">
                            <!-- <?php if ($cek_akses['role_id'] == 1) : ?>
                            <button type="button" class="btn btn-primary mb-3 btn-action">
                                <span class="fa fa-plus"></span> Tambah Data
                            </button>
                        <?php endif ?> -->
                        </h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Nama Guru Mapel
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tampil as $t) :  { ?>                                 
                                        <tr>
                                            <td>
                                                <?= $i ?>
                                            </td>
                                            <td>
                                                <a>
                                                    <?= $t['nama_guru'] ?>
                                                </a>
                                            </td>
                                            <td class="project-actions">
                                                <?php if ($cek_akses['role_id'] == 1) : ?>
                                                    <a class="btn btn-info btn-sm" href="<?= base_url() ?>akademik_rombel/atur_mapel/detail/<?= $t['nip']; ?>">
                                                        <i class="fas fa-folder">
                                                        </i>
                                                        Mata Pelajaran
                                                    </a>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                <?php }
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>

