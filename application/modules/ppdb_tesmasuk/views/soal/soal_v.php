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
       
      <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="tampil-modal"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-secondary" href="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>">Back</a>
                        <button class="btn btn-primary btn-action" onclick="pilihform('tambah')" data-toggle="modal" data-target="#tambahsoal"><i class="fas fa-fw fa-plus"></i> Tambah soal</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- The time line -->
                                <div class="timeline" id="divsoal">
                                    <br>
                                    <?php
                                    $no = 1;
                                    foreach ($soal as $soal) : ?>
                                        <div>
                                            <!-- <i class="fas fa-envelope bg-blue"></i> -->
                                            <div class="timeline-item">
                                                <span class="time">Soal No : <?= $no++ ?> <a href="#" data-id="<?= $soal['id_soal'] ?>" class="btn-delete btn-danger btn-sm"> <i class="fa fa-trash-alt"></i> Hapus</a> </span>
                                                <h3 class="timeline-header">
                                                    <?= $soal['soal'] ?>
                                                </h3>
                                                <div class="timeline-body">
                                                    <table class="table table-striped table-sm">
                                                        <tbody>
                                                            <?php
                                                            $opsi = $this->db->get_where('ppdb_soal_opsi', ['id_soal' => $soal['id_soal']])->result_array();
                                                            foreach ($opsi as $opsi) :
                                                                if ($opsi['benar'] == 1) {
                                                                    $kunci = '<span class="badge bg-success">o</span>';
                                                                } else {
                                                                    $kunci = '<span class="badge bg-primary">o</span>';
                                                                }
                                                            ?>
                                                                <tr>
                                                                    <td scope="row" style="width:10px"><?= $kunci ?></td>
                                                                    <td><?= $opsi['opsi'] ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>
<!-- /.content-wrapper -->