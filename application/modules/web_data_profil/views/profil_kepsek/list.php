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
    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?= $this->session->flashdata('message'); ?>
    <div class="card">
        <div class="card-body">
            <div class="info-box">
                <h3 class="card-title"><?= $subtitle; ?></h3>
            </div>

            <!--begin::Table-->
            <form action="<?= base_url('data_profil/profil_kepsek'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="form-control" name="nip" value="<?= $sch['nip'] ?>" required>
                        <label for="">Nama Kepala Sekolah</label>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek" value="<?= $sch['nama_kepsek'] ?>" placeholder="Nama Kepala Sekolah">
                            </div>
                        </div>
                    </div>
                    <br>
                    <label for="">Sambutan Kepala Sekolah</label>
                    <div class="mb-3">
                        <textarea id="ckeditor1" class="summernote" name="kata_sambutan" placeholder="Kata Sambutan" style="height: 100px"><?= $sch['kata_sambutan'] ?></textarea>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div><br></div>
                            <div class="col-md-4">
                                <div class="mb-3 text-center">
                                    <img src="<?= base_url(); ?>panel/dist/upload/logo/<?= $sch['foto'] ?>" alt="..." style="width:100%;max-width:150px">
                                    <input type="hidden" name="old_image" value="<?= $sch['foto'] ?>" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="file" class="form-control" id="foto" name="foto" placeholder="Photo">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Save</button>
                </div>
            </form>
            <!--end::Table-->
        </div>
        <!-- /.card-body -->
    </div>
</div>

</div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>

<script src="<?= base_url() ?>panel/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('ckeditor1');
    CKEDITOR.replace('ckeditor2');
</script>