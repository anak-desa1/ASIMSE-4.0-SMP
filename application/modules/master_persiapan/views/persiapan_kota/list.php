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
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="card-toolbar">
                <a href="" class="btn btn-primary font-weight-bolder font-size-sm mr-3" data-toggle="modal" data-target="#newRoleModal"><span class="fa fa-plus"></span> Tambah Data</a>
            </div>
            <br />
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?= $subtitle; ?></h3>
                    <div class="card-tools">

                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <!--begin::Table-->
                    <div class="table-responsive">
                        <table class="table table-striped" id="mytable" style="font-size: 14px;">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Kota</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kota as $r) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $r['provinsi']; ?></td>
                                        <td><?= $r['kota']; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-warning" href="" data-provinsi_id="<?= $r['provinsi_id']; ?>" data-kota="<?= $r['kota']; ?>" data-id="<?= $r['kota_id']; ?>" data-toggle="modal" data-target="#editModal" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?= base_url('data_persiapan/persiapan_kota/delkota/') . $r['kota_id'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!--end::Table-->
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--modal--->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Kota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('data_persiapan/persiapan_kota'); ?>" method="post">
                <div class=" modal-body">
                    <div class="form-group">
                        <select class="form-control m-bot15" style="width: 100%" id="provinsi_id" name="provinsi_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($provinsi as $m) : ?>
                                <option value="<?= $m['provinsi_id']; ?>"><?= $m['provinsi']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Edit Kota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('data_persiapan/persiapan_kota/editkota'); ?>" method="post">
                <div class=" modal-body">
                    <input type="hidden" class="form-control" id="ed_id" name="ed_id">
                    <div class="form-group">
                        <select class="form-control m-bot15" style="width: 100%" id="ed_provinsi_id" name="ed_provinsi_id">
                            <option value="">Select Menu</option>
                            <?php foreach ($provinsi as $m) : ?>
                                <option value="<?= $m['provinsi_id']; ?>"><?= $m['provinsi']; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="ed_kota" name="ed_kota" placeholder="Kota name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>

<script>
    $(function() {
        $('#editModal').on('show.bs.modal', function(e) {
            let btn = $(e.relatedTarget);
            let id = btn.data('id');
            let provinsi_id = btn.data('provinsi_id');
            let kota = btn.data('kota');
            $("#ed_id").val(id);
            $("#ed_provinsi_id").val(provinsi_id);
            $("#ed_kota").val(kota);
        });
    })
</script>