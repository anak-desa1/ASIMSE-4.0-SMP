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
       
      <div class="modal-body">
            <div class="card">
                <div class="modal-header">
                    <h4 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Data</h4>
                </div>
                <div class="col-12">
                    <div class="modal-body">
                        <?= form_open_multipart(base_url('akademik_master/master_mapel/update')); ?>
                        <input type="hidden" name="_id" id="_id" value="<?= $data['id']; ?>">
                        <!-- <div class="form-group">
                        <label for="nama" class="col-sm-3 control-label">Kelas</label>
                        <div class="col-sm-9">
                            <input type="text" name="tingkat" value="<?= $data['tingkat']; ?>" class="form-control" id="kd_singkat" required>
                        </div>
                    </div> -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kode" class="col-sm-3 control-label">Kelompok</label>
                                <div class="col-sm-9">
                                    <?php echo form_dropdown('kelompok', $p_kelompok, $data['kelompok'], 'class="form-control" id="kelompok" required'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kode" class="col-sm-3 control-label">Tambahan Sub</label>
                                <div class="col-sm-9">
                                    <?php echo form_dropdown('tambahan_sub', $p_tambahansub, $data['tambahan_sub'], 'class="form-control" id="tambahan_sub" required'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Kode Singkat</label>
                                <div class="col-sm-9">
                                    <input type="text" name="kd_singkat" value="<?= $data['kd_singkat']; ?>" class="form-control" id="kd_singkat" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-sm-3 control-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama" value="<?= $data['nama']; ?>" class="form-control" id="nama" required>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">KKM</label>
                            <div class="col-sm-9">
                                <input type="number" name="kkm" value="<?= $data['kkm']; ?>" class="form-control" id="kkm" required>
                            </div>
                        </div> -->
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                        <a href="<?= base_url() . 'akademik_master/master_mapel'; ?>" class="btn btn-default" data-dismiss="modal"><i class="bi bi-arrow-counterclockwise"></i> Kembali</a>
                        <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.content -->
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>

