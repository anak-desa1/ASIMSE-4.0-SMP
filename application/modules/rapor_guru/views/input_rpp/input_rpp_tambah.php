<div class="modal fade modal-action" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-rose card-header-icon">
                        <h4 class="card-title">Walikelas</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" role="form" id="form-action" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card ">
                                        <div class="form-group">
                                            <label>Campus <span class="symbol required"> </span></label>
                                            <select class="form-control select2" style="width: 100%;" id="campus" name="kd_campus">
                                                <option value="">Pilih Campus</option>
                                                <?php foreach ($campus as $cam) {
                                                    echo '<option value="' . $cam->kd_campus . '">' . $cam->nama_campus . '</option>';
                                                } ?>
                                            </select>
                                        </div>

                                        <div class="dropdown bootstrap-select">
                                            <div class="form-group">
                                                <label>Sekolah<span class="symbol required"> </span></label>
                                                <select name="kd_sekolah" id="sekolah" class="selectpicker form-control" data-live-search="true">
                                                    <option value="">Pilih Campus Dulu</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Guru Mapel<span class="symbol required"> </span></label>
                                                <select name="id_guru" id="guru" class="selectpicker form-control" data-live-search="true">
                                                    <option value="">Pilih Guru</option>

                                                </select>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Tahun Aktif <span class="symbol required"> </span></label>
                                        <select class="form-control select2" style="width: 100%;" id="" name="th_active">
                                            <option value="">Pilih Tahun</option>
                                            <?php foreach ($tahun as $t) {
                                                echo '<option value="' . $t->tahun . '">' . $t->tahun . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Rombel Baru <span class="symbol required"> </span></label>
                                        <select class="form-control select2" style="width: 100%;" id="" name="id_kelas">
                                            <option value="">Pilih Kelas</option>
                                            <?php foreach ($kelas as $kel) {
                                                echo '<option value="' . $kel->id . '">' . $kel->nama . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button> -->
                                        <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>