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
            <form action="<?= base_url('data_profil/profil_info'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <label for="">Pengumuman</label>
                    <div class="mb-3">
                        <textarea id="ckeditor1" class="summernote" name="text_info" placeholder="Pengumuman" style="height: 100px"><?= $sch['text_info'] ?></textarea>
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