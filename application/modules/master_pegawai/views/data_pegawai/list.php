<div class="content-wrapper">
    <?php $this->load->view('layout/header-page') ?>

    <!-- Main content -->
    <section class="content">
        <div class="col-12">
            <div class="card">
                <div class="tampil-modal"></div>
                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                <div class="card-body">
                    <div class="panel-body">
                        <?php if ($cek_akses['role_id'] == 1) : ?>
                            <button type="button" class="btn btn-primary mb-3 btn-action">
                                <span class="fa fa-plus"></span> Tambah Data
                            </button>
                            <a class="btn btn-success mb-3" href="<?= site_url('master_pegawai/data_pegawai/create') ?>"><i class="fa fa-upload"></i> Import Excel</a>
                            <a class="btn btn-primary mb-3" href="<?= site_url('master_pegawai/data_pegawai') ?>"><i class="fa fa-users"></i> Data Pegawai</a>
                        <?php endif ?>
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-sm table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NIK</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Telp</th>
                                        <th scope="col">Email Pribadi</th>
                                        <th scope="col">Tgl Masuk</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <br>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->