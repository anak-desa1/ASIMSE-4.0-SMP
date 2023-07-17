<style type="text/css">
    .ctr {
        text-align: center
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php $this->load->view('layout/header-page') ?>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <!-- About Me Box -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="text-muted">
                        Walikelas : <?= $kelas['nama_lengkap'] ?>
                        Kelas : <?= $kelas['rombel'] ?>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">
                            <a class="btn btn-info mb-3" href="<?= site_url('akademik_laporan/rekap_ki1_ki2/') ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            <!-- <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap_so/tambah_pts/'); ?>"> <i class="fa fa-address-book"></i> Nilai SO PTS</a>
                            <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap_so/tambah_pas/'); ?>"> <i class="fa fa-address-book"></i> Nilai SO PAS</a> -->
                            <a class="btn btn-success mb-3" href="<?= base_url('akademik_laporan/rekap_ki1_ki2/ki2_cetak_pts/'); ?><?= $kelas['rombel'] ?>" target="_blank"><i class="fa fa-print"></i> Cetak PTS</a>
                            <a class="btn btn-success mb-3" href="<?= base_url('akademik_laporan/rekap_ki1_ki2/ki2_cetak_pas/'); ?><?= $kelas['rombel'] ?>" target="_blank"><i class="fa fa-print"></i> Cetak PAS</a>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <p align="center"><b>REKAP NILAI SIKAP SOSIAL</b>
                                            <br><?php echo "Kelas : " .  $kelas['rombel'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                        </p>
                                    </div>
                                </div>
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