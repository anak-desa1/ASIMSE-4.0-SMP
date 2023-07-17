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
                        <!-- <h3 class="card-title">
                            <?php if ($pegawai['bagian_shift'] == 'ON') : ?>
                                <button type="button" class="btn btn-info mb-3 btn-action">
                                    <i class="bi bi-plus-square"></i> Tambah Data
                                </button>
                            <?php endif ?>
                        </h3> -->
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Nama Kelas
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kelas as $t) :{ ?>
                                        <tr>
                                                <td>
                                                    <?= $i ?>
                                                </td>
                                                <td>
                                                    <a>
                                                        <?= $t['tingkat'] ?>
                                                    </a>
                                                </td>
                                                <td class="project-actions">
                                                    <?php if ($cek_akses['role_id'] == 1) : ?>
                                                        <a class="btn btn-info btn-sm" href="<?= base_url() ?>akademik_rombel/atur_kkm/detail/<?= $t['tingkat'] ?>">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            KKM
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
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>

