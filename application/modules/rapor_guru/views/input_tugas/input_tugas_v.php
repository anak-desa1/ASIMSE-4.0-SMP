<div class="content-wrapper">
    <?php $this->load->view('layout/header-page') ?>


    <div class="card-body">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit"></i>
                    <?= $subtitle ?>
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
                        <h3>Masih dalam Pengembangan</h3>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->