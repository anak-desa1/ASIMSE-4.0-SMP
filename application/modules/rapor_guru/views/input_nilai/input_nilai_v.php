<div class="content-wrapper">
    <?php $this->load->view('layout/header-page') ?>


    <div class="card-body">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    <?= $subtitle ?>
                    &nbsp;
                    Tahun Aktif : <?= $tahun ?>
                    &nbsp;
                    Semester : <?= $semester ?>
                    <!-- <?= $sekolah['nama_sekolah'] ?> -->
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
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <!-- <th>
                                        Tempat Mengajar
                                    </th> -->
                                    <th>
                                        Mapel
                                    </th>
                                    <th>
                                        Kelas
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($tampil as $t) : ?>
                                    <tr>
                                        <td>
                                            <?= $i ?>
                                        </td>
                                        <!-- <td>
                                            <a>
                                                <?= $t['nama_sekolah'] ?>
                                            </a>
                                        </td> -->
                                        <td>
                                            <a>
                                                <?= $t['nama'] ?>
                                            </a>
                                        </td>
                                        <td>
                                            <a>
                                                <?= $t['id_kelas'] ?>
                                            </a>
                                        </td>
                                        <td class="project-actions">
                                            <?php if ($cek_akses['role_id'] == 1) : ?>
                                                <a class="btn btn-success btn-sm" href="<?= base_url() ?>akademik_guru/nilai_pengetahuan/pengetahuan/<?= $t['mapel_id']; ?>">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    Pengetahuan
                                                </a>
                                            <?php endif ?>
                                            <?php if ($cek_akses['role_id'] == 1) : ?>
                                                <a class="btn btn-warning btn-sm" href="<?= base_url() ?>akademik_guru/nilai_keterampilan/keterampilan/<?= $t['mapel_id']; ?>">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    Keterampilan
                                                </a>
                                            <?php endif ?>
                                            <!-- <?php if ($cek_akses['role_id'] == 1) : ?>
                                                <a class="btn btn-info btn-sm" href="<?= base_url() ?>akademik_guru/nilai_pts/pts/<?= $t['mapel_id']; ?>">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    PTS
                                                </a>
                                            <?php endif ?>
                                            <?php if ($cek_akses['role_id'] == 1) : ?>
                                                <a class="btn btn-danger btn-sm" href="<?= base_url() ?>akademik_guru/nilai_pas/pas/<?= $t['mapel_id']; ?>">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    PAS
                                                </a>
                                            <?php endif ?> -->
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->