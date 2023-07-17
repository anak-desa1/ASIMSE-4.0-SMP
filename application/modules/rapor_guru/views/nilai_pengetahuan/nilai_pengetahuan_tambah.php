<?php if ($pegawai['kd_sekolah'] == $pegawai['kd_sekolah']) : ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php $this->load->view('layout/header-page') ?>

        <section class="content">
            <div class="container-fluid">
                <!-- About Me Box -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p class="text-muted"><?= $data['nama'] ?></p>
                        <p class="text-muted"><?= $data['mapel_id'] ?> | <?= $data['nama_lengkap'] ?> | <?= $data['rombel'] ?></p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card">
                            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="tampil-modal"></div>
                            <div class="card-header p-2">
                                <a class="btn btn-info mb-3" href="<?= site_url('akademik_guru/nilai_pengetahuan/pengetahuan/') ?><?= $data['mapel_id'] ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                                <a class="btn btn-success mb-3" href="<?= site_url('akademik_guru/nilai_pengetahuan/export_excel_pts/') ?><?= $data['mapel_id'] ?>"><i class="fa fa-download"></i> Export Excel </a>
                                <!-- <a class="btn btn-success mb-3" href="<?= site_url('akademik_guru/nilai_pengetahuan/export_excel_pas/') ?><?= $data['mapel_id'] ?>"><i class="fa fa-download"></i> Export Excel PAS</a> -->
                                <a class="btn btn-primary mb-3" href="<?= site_url('akademik_guru/nilai_pengetahuan/import_excel/') ?><?= $data['mapel_id'] ?>"><i class="fa fa-upload"></i> Import Excel</a>
                                <?php if ($cek_akses['role_id'] == 1) : ?>
                                <?php endif ?>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card card-warning">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Tambah Nilai</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Mata Pelajaran<span class="symbol required"> </span></label>
                                                            <input type="text" value="<?= $mapel['nama'] ?>" class="form-control" readonly>
                                                        </div>
                                                        <ul class="list-group">
                                                            <li class="list-group-item">
                                                                <div class="pull-right">
                                                                    <a>
                                                                        <form action="" id="FormTingkat">
                                                                            <input type="hidden" name="tingkat" id="tingkat" value="<?= $data['mapel_id'] ?>" class="form-control" data-live-search="true">
                                                                            <button type="submit" class="btn"><i class="fa fa-chevron-right text-info"></i> <b class="text-info">Penilaian NPH</b> </button>
                                                                        </form>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="pull-right">
                                                                    <a>
                                                                        <form action="" id="FormPTS">
                                                                            <input type="hidden" name="tingkat" id="tingkat" value="<?= $data['mapel_id'] ?>" class="form-control" data-live-search="true">
                                                                            <button type="submit" class="btn"><i class="fa fa-chevron-right text-info"></i> <b class="text-info">Penilaian NPTS</b> </button>
                                                                        </form>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <div class="pull-right">
                                                                    <a>
                                                                        <form action="" id="FormPAS">
                                                                            <input type="hidden" name="tingkat" id="tingkat" value="<?= $data['mapel_id'] ?>" class="form-control" data-live-search="true">
                                                                            <button type="submit" class="btn"><i class="fa fa-chevron-right text-info"></i> <b class="text-info">Penilaian NPAS</b> </button>
                                                                        </form>
                                                                    </a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <!-- About Me Box -->
                                                <div class="card card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Penilaian</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <p class="text-muted">Kelas : <?= $data['rombel'] ?></p>
                                                        <hr>
                                                        <?php foreach ($siswa as $h) : ?>
                                                        <?php endforeach ?>
                                                        <ul class="list-group">
                                                            <?php if ($ta == 1) { ?>
                                                                <li class="list-group-item">
                                                                    <h3 class="card-title"> Penilaian PH<h3>
                                                                </li>
                                                                <?php
                                                                if (!empty($nilai)) {
                                                                    foreach ($nilai as $a)
                                                                        if ($a['id_siswa'] == $h['id_siswa']) {
                                                                ?>
                                                                        <?php
                                                                            if (substr($a['jenis'], 0, 2) == 'PH') : ?>
                                                                            <li class="list-group-item">
                                                                                <div class="pull-right">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-chevron-right"></i> <?= $a['penilaian']; ?> - KD - <?= $a['no_kd']; ?> - <?= $a['jenis'] ?>
                                                                                    </a>
                                                                                    <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru/nilai_pengetahuan/edit_peng/') ?><?= $data['mapel_id'] ?>/<?= $a['kd_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-pen"></i></a>
                                                                                    <a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru/nilai_pengetahuan/delete_data/') ?><?= $data['mapel_id'] ?>/<?= $a['kd_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-trash-alt"></i></a>
                                                                                </div>
                                                                            </li>
                                                                        <?php endif ?>
                                                                <?php
                                                                        }
                                                                } else {
                                                                    echo '';
                                                                }
                                                                ?>
                                                                <li class="list-group-item">
                                                                    <h3 class="card-title">Penilaian TG<h3>
                                                                </li>
                                                                <?php
                                                                if (!empty($nilai)) {
                                                                    foreach ($nilai as $a)
                                                                        if ($a['id_siswa'] == $h['id_siswa']) {
                                                                ?>
                                                                        <?php
                                                                            if (substr($a['jenis'], 0, 2) == 'TG') : ?>
                                                                            <li class="list-group-item">
                                                                                <div class="pull-right">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-chevron-right"></i> <?= $a['penilaian']; ?> - KD - <?= $a['no_kd']; ?> - <?= $a['jenis'] ?>
                                                                                    </a>
                                                                                    <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru/nilai_pengetahuan/edit_peng/') ?><?= $data['mapel_id'] ?>/<?= $a['kd_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-pen"></i></a>
                                                                                    <a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru/nilai_pengetahuan/delete_data/') ?><?= $data['mapel_id'] ?>/<?= $a['kd_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-trash-alt"></i></a>
                                                                                </div>
                                                                            </li>
                                                                        <?php endif ?>
                                                                <?php
                                                                        }
                                                                } else {
                                                                    echo '';
                                                                }
                                                                ?>
                                                            <?php } ?>
                                                            <?php if ($ta == 2) { ?>
                                                                <li class="list-group-item">
                                                                    <h3 class="card-title">Penilaian PH<h3>
                                                                </li>
                                                                <?php
                                                                if (!empty($nilai)) {
                                                                    foreach ($nilai as $a)
                                                                        if ($a['id_siswa'] == $h['id_siswa']) {
                                                                ?>
                                                                        <?php
                                                                            if (substr($a['jenis'], 0, 2) == 'PH') : ?>
                                                                            <li class="list-group-item">
                                                                                <div class="pull-right">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-chevron-right"></i> <?= $a['penilaian']; ?> - KD - <?= $a['no_kd']; ?> - <?= $a['jenis'] ?>
                                                                                    </a>
                                                                                    <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru/nilai_pengetahuan/edit_peng/') ?><?= $data['mapel_id'] ?>/<?= $a['kd_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-pen"></i></a>
                                                                                    <a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru/nilai_pengetahuan/delete_data/') ?><?= $data['mapel_id'] ?>/<?= $a['kd_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-trash-alt"></i></a>
                                                                                </div>
                                                                            </li>
                                                                        <?php endif ?>
                                                                <?php
                                                                        }
                                                                } else {
                                                                    echo '';
                                                                }
                                                                ?>
                                                                <li class="list-group-item">
                                                                    <h3 class="card-title">Penilaian TG<h3>
                                                                </li>
                                                                <?php
                                                                if (!empty($nilai)) {
                                                                    foreach ($nilai as $a)
                                                                        if ($a['id_siswa'] == $h['id_siswa']) {
                                                                ?>
                                                                        <?php
                                                                            if (substr($a['jenis'], 0, 2) == 'TG') : ?>
                                                                            <li class="list-group-item">
                                                                                <div class="pull-right">
                                                                                    <a href="#">
                                                                                        <i class="fa fa-chevron-right"></i> <?= $a['penilaian']; ?> - KD - <?= $a['no_kd']; ?> - <?= $a['jenis'] ?>
                                                                                    </a>
                                                                                    <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru/nilai_pengetahuan/edit_peng/') ?><?= $data['mapel_id'] ?>/<?= $a['kd_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-pen"></i></a>
                                                                                    <a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru/nilai_pengetahuan/delete_data/') ?><?= $data['mapel_id'] ?>/<?= $a['kd_id']; ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>"> <i class="fa fa-trash-alt"></i></a>
                                                                                </div>
                                                                            </li>
                                                                        <?php endif ?>
                                                                <?php
                                                                        }
                                                                } else {
                                                                    echo '';
                                                                }
                                                                ?>
                                                            <?php } ?>

                                                            <li class="list-group-item">
                                                                <h3 class="card-title">Penilaian NPTS<h3>
                                                            </li>
                                                            <?php
                                                            if (!empty($nilai_pts)) {
                                                                foreach ($nilai_pts as $a)
                                                                    if ($a['tasm'] == $tasm)
                                                                        if ($a['id_siswa'] == $h['id_siswa']) {
                                                            ?>

                                                                    <li class="list-group-item">
                                                                        <div class="pull-right">
                                                                            <a href="#">
                                                                                <i class="fa fa-chevron-right"></i> <?= $a['penilaian']; ?> - <?= $a['tasm'] ?>
                                                                            </a>
                                                                            <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru/nilai_pengetahuan/edit_peng_pts_pas/') ?><?= $data['mapel_id'] ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>/<?= $a['tasm'] ?>"> <i class="fa fa-pen"></i></a>
                                                                            <a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru/nilai_pengetahuan/delete_data_pts_pas/') ?><?= $data['mapel_id'] ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>/<?= $a['tasm'] ?>"> <i class="fa fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </li>

                                                            <?php
                                                                        }
                                                            } else {
                                                                echo '';
                                                            }
                                                            ?>
                                                            <li class="list-group-item">
                                                                <h3 class="card-title">Penilaian NPAS<h3>
                                                            </li>
                                                            <?php
                                                            if (!empty($nilai_pas)) {
                                                                foreach ($nilai_pas as $a)
                                                                    if ($a['tasm'] == $tasm)
                                                                        if ($a['id_siswa'] == $h['id_siswa']) {
                                                            ?>
                                                                    <li class="list-group-item">
                                                                        <div class="pull-right">
                                                                            <a href="#">
                                                                                <i class="fa fa-chevron-right"></i> <?= $a['penilaian']; ?> - <?= $a['tasm'] ?>
                                                                            </a>
                                                                            <a class="btn btn-xs btn-warning" href="<?= site_url('akademik_guru/nilai_pengetahuan/edit_peng_pts_pas/') ?><?= $data['mapel_id'] ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>/<?= $a['tasm'] ?>"> <i class="fa fa-pen"></i></a>
                                                                            <a class="btn btn-xs btn-danger" href="<?= site_url('akademik_guru/nilai_pengetahuan/delete_data_pts_pas/') ?><?= $data['mapel_id'] ?>/<?= $a['penilaian'] ?>/<?= $a['jenis'] ?>/<?= $a['tasm'] ?>"> <i class="fa fa-trash-alt"></i></a>
                                                                        </div>
                                                                    </li>
                                                            <?php
                                                                        }
                                                            } else {
                                                                echo '';
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="card card-warning">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Informasi Sistem dan Input Nilai</h3>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                <div class="table-responsive" id="mapel">

                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>
                                                                                    > Penilaian NPH<br>
                                                                                    <ul>
                                                                                        <li>1. Pilih Penilaian (supaya nilai dapat tersimpan sesuai kondisi PTS / PAS) </li>
                                                                                        <li>2. Pilih KD (supaya nilai dapat tersimpan sesuai kondisi KD )</li>
                                                                                        <li>3. Pilih PH/TG (supaya nilai dapat tersimpan sesuai kondisi PH/TG )</li>
                                                                                        <li>4. Klik Simpan </li>
                                                                                    </ul>
                                                                                    > Penilaian NPTS<br>
                                                                                    <ul>
                                                                                        <li>1. Masukkan nilai PTS</li>
                                                                                        <li>2. Klik Simpan </li>
                                                                                    </ul>
                                                                                    > Penilaian NPAS<br>
                                                                                    <ul>
                                                                                        <li>1. Masukkan nilai PAS</li>
                                                                                        <li>2. Klik Simpan </li>
                                                                                    </ul>
                                                                                    Proses Expor dan Impor Excel :<br>
                                                                                    <ul>
                                                                                        <li>Klik Expor Excel "Untuk menarik data siswa dan nilai"</li>
                                                                                        <li>Klik Impor Excel "Untuk memasukkan data siswa dan nilai"</li>
                                                                                    </ul>
                                                                                </th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php endif ?>