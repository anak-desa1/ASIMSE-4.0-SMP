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
       
       <!-- Main content -->
    <div class="modal-body">
        <div class="card">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(3, 0)) ?> Data</h4>
            </div>
            <div class="col-12">
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>akademik_master/tahun_aktif/update" role="form" id="form-action" enctype="multipart/form-data">
                        <input type="hidden" name="_id" id="_id" value="<?= $data['id'] ?>">
                        <!-- <input type="hidden" name="_mode" id="_mode" value=""> -->
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tahun" class="col-sm-4 control-label">Tahun ( <?= $data['tahun'] ?> )<span class="symbol required"> wajib diisi kembali </span> </label>
                                <div class="col-sm-9">
                                    <?= form_dropdown('tahun', $p_tahun, '', 'class="form-control" id="tahun" required'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun" class="col-sm-4 control-label">Semester ( <?= $data['semester'] ?> ) <span class="symbol required"> wajib diisi kembali </span> </label>
                                <div class="col-sm-9">
                                    <?= form_dropdown('semester', $p_semester, '', 'class="form-control" id="semester" required'); ?>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label for="tahun" class="col-sm-3 control-label">Campus <span class="symbol required"> </span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2 col-sm-3" style="width: 100%;" id="campus" name="kd_campus">
                                        <option value="<?= $data['kd_campus'] ?>"><?= $data['nama_campus'] ?></option>
                                        <?php foreach ($campus as $cam) {
                                            echo '<option value="' . $cam->kd_campus . '">' . $cam->nama_campus . '</option>';
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun" class="col-sm-3 control-label">Sekolah<span class=" symbol required"> </span></label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" id="sekolah" name="kd_sekolah">
                                        <option value="<?= $data['kd_sekolah'] ?>"><?= $data['nama_sekolah'] ?></option>

                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="tahun" class="col-sm-3 control-label">Kepala Sekolah <span class=" symbol required"> </span> </label>
                                <div class="col-sm-9">
                                    <select class="form-control select2" style="width: 100%;" name="nik" id="nik" required>
                                        <option value="<?= $data['nik'] ?>"><?= $data['nama_lengkap'] ?></option>
                                        <?php
                                        foreach ($p_guru as $pg) {
                                            echo "<option value=" . $pg['nik'] . ">" . $pg['nama_lengkap'] . "</option>";
                                        } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tahun" class="col-sm-3 control-label">NIP Kepsek <span class=" symbol required"> </span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="nip_kepsek" value="<?= $data['nip_kepsek'] ?>" class="form-control" id="nip_kepsek" required>
                                </div>
                            </div>                            
                        </div>

                        <div class="modal-footer justify-content-between">
                            <a href="<?= base_url() ?>akademik_master/tahun_aktif" type="button" class="btn btn-default" data-dismiss="modal"><i class="bi bi-arrow-counterclockwise"></i> Kembali</a>
                            <button type="submit" id="simpan" class="btn btn-primary"><i class="bi bi-save2"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>
