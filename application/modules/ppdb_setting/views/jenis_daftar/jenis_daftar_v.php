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
      
      <div class="row">

            <div class="col-12">
                <!-- Default box -->
                <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('message'); ?>
                <div class="card-toolbar">
                    <a href="" class="btn btn-primary font-weight-bolder font-size-sm mr-3" data-toggle="modal" data-target="#newRoleModal"> <span class="fa fa-plus"></span> Tambah Data</a>
                </div>
                <br />
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $subtitle; ?></h5>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            #
                                        </th>
                                        <th>Kode jenis</th>
                                        <th>Nama jenis</th>
                                        <th>status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($jenis as $jn) :
                                        $no++ ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $jn['id_jenis'] ?></td>
                                            <td><?= $jn['nama_jenis'] ?></td>
                                            <td>
                                                <?php if ($jn['status'] == 1) { ?>
                                                    <span class="badge bg-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="badge bg-danger">Non Aktif</span>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <!-- Button trigger modal -->
                                                <a class="btn btn-sm btn-warning" title="Edit" id="edit_jenis" data-toggle="modal" data-target="#editModal" data-id_jenis="<?= $jn['id_jenis']; ?>" data-nama_jenis="<?= $jn['nama_jenis']; ?>" data-status="<?= $jn['status']; ?>"><i class="fa fa-edit"></i></a>
                                                <a href="<?= base_url() ?>ppdb_setting/deldata_jenis/<?= $jn['id_jenis'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
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
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>

<!--modal add--->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Jenis Daftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_tambah_jenis" role="form" id="form-action" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Jenis Daftar</label>
                        <input type="text" name="id_jenis" class="form-control" required="">
                    </div>
                    <div class="mb-3">
                        <label>Nama jenis</label>
                        <input type="text" name="nama" class="form-control" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </div>
</div>

<!--modal update--->
<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Jenis Daftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) ?>/simpan_edit_jenis" role="form" id="form-action" enctype="multipart/form-data">
                <div class="modal-body" id="modal-edit">
                    <input type="hidden" name="id_jenis" id="id_jenis" class="form-control" required="">
                    <div class="mb-3">
                        <label>Nama jenis</label>
                        <input type="text" name="nama" id="nama_jenis" class="form-control" required="">
                    </div>
                    <div class="mb-3">
                        <div class="control-label">Status Jenjang</div>
                        <label class="custom-switch mt-2">
                            <input type="checkbox" name="status" class="custom-switch-input" value='1' <?php if ("status" == 1) {
                                                                                                            echo "checked";
                                                                                                        } ?>>
                            <span class="custom-switch-indicator"></span>
                            <span class="custom-switch-description"> Pilih Status</span>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                <!-- /.card-body -->
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on("click", "#edit_jenis", function() {
        var id_jenis = $(this).data('id_jenis');
        var nama_jenis = $(this).data('nama_jenis');
        var status = $(this).data('status');
        $("#modal-edit #id_jenis").val(id_jenis);
        $("#modal-edit #nama_jenis").val(nama_jenis);
        $("#modal-edit #status").val(status);
    })
</script>