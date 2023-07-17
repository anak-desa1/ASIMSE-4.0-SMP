  <?php if ($pegawai['kd_sekolah'] == $pegawai['kd_sekolah']) : ?>
      <div class="modal fade modal-action" id="modal-lg">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title"><?= ucwords($this->uri->segment(4, 0)) ?> Data </h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-header card-header-rose card-header-icon">
                              <h4 class="card-title"><?= $pegawai['nama_pegawai'] ?></h4>
                          </div>
                          <div class="card-body">
                              <!--  <div class="alert alert-danger" role="alert">
                                  *Untuk Pilih KD !!! klik pada '> KI-3 PENGETAHUAN' dan '> KI-4 KETERAMPILAN' dibawah, lalu 'klik ceklis' pada No.KD dan Diskripsi.KD (supaya tidak terjadi error)
                              </div> -->
                              <div class="alert alert-warning" role="alert">
                                  *Untuk Pilih KD !!! klik pada '<b class="text-info"> > KI-3 PENGETAHUAN</b> ' dan ' <b class="text-info"> > KI-4 KETERAMPILAN </b>' dibawah, lalu 'klik ceklis' pada No.KD dan Diskripsi.KD (supaya tidak terjadi error)
                              </div>

                              <div class="row">
                                  <div class="col-md-5">
                                      <div class="card ">
                                          <div class="form-group">
                                              <label>Mapel<span class="symbol required"> </span></label>
                                              <input type="text" name="" value="<?= $data['nama'] ?>" class="form-control" readonly>
                                          </div>
                                          <div class="form-group">
                                              <label>Kelas<span class="symbol required"> </span></label>
                                              <input type="text" name="" value="<?= $data['tingkat'] ?>" class="form-control" readonly>
                                          </div>
                                          <div class="form-group">
                                              <div class="col-sm-8">
                                                  <form action="" id="FormKdKI3">
                                                      <div class="dropdown bootstrap-select">
                                                          <input type="hidden" id="id_mapel" name="id_mapel" value="<?= $data['id_mapel'] ?>">
                                                          <input type="hidden" id="tingkat" name="tingkat" value="<?= $data['tingkat'] ?>">
                                                      </div>
                                                      <i class="fa fa-chevron-right text-info"></i>
                                                      <button type="submit" class="btn">
                                                          <h7 class="text-info">KI-3 PENGETAHUAN</h7>
                                                      </button>
                                                  </form>
                                              </div>
                                              <div class="col-sm-8">
                                                  <form action="" id="FormKdKI4">
                                                      <div class="dropdown bootstrap-select">
                                                          <input type="hidden" id="id_mapel" name="id_mapel" value="<?= $data['id_mapel'] ?>">
                                                          <input type="hidden" id="tingkat" name="tingkat" value="<?= $data['tingkat'] ?>">
                                                      </div>
                                                      <i class="fa fa-chevron-right text-info"></i>
                                                      <button type="submit" class="btn">
                                                          <h7 class="text-info">KI-4 KETERAMPILAN</h7>
                                                      </button>
                                                  </form>
                                              </div>
                                          </div>
                                          <h7> Klik KI-3 PENGETAHUAN </h7>
                                          <p> "Untuk Menampilkan Data KD KI-3"</p>
                                          <h7> KI-4 KETERAMPILAN</h7>
                                          <p> "Untuk Menampilkan Data KD KI-4"</p>
                                      </div>
                                  </div>
                                  <div class="col-md-7">
                                      <form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'kd_simpan' ?>" role="form" id="form-action" enctype="multipart/form-data">
                                          <div class="form-group">
                                              <label>Semester :<span class="symbol required"> </span></label>
                                              <?php if ($semester == 1) { ?>
                                                  <input type="hidden" class="form-control" name="semester" value="1">
                                                  <input type="text" placeholder="Semester : 1 (satu) " class="form-control" id="semester" readonly>
                                              <?php } else { ?>
                                                  <input type="hidden" class="form-control" name="semester" value="2">
                                                  <input type="text" placeholder="Semester : 2 (dua)" class="form-control" id="semester" readonly>
                                              <?php } ?>
                                          </div>
                                          <!-- tampil data kd -->
                                          <div class="form-group" id="kd">

                                          </div>
                                          <!-- <input type="hidden" name="kd_campus" value="<?= $data['kd_campus'] ?>">
                                          <input type="hidden" name="kd_sekolah" value="<?= $data['kd_sekolah'] ?>"> -->
                                          <input type="hidden" name="id_guru" value="<?= $data['id_guru'] ?>">
                                          <input type="hidden" name="id_mapel" value="<?= $data['mapel_id'] ?>">
                                          <input type="hidden" name="mapel_id" value="<?= $data['mapel_id'] ?>">
                                          <input type="hidden" name="tingkat" value="<?= $data['id_kelas'] ?>">
                                          <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                          <!-- end tampil data kd -->
                                      </form>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      </div>
  <?php endif ?>