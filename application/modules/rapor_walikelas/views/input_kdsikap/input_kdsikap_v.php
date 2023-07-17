  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <?php $this->load->view('layout/header-page') ?>

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <!-- /.col -->
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-body">
                              <div class="tab-content">
                                  <div class="active tab-pane" id="activity">
                                      <!-- Table row -->
                                      <div class="row">
                                          <div class="col-12 table-responsive">
                                              <table class="table table-striped table table-sm">
                                                  <div class="card-header">
                                                      <h3 class="btn btn-info mb-3">KI-I SIKAP SPIRITUAL</h3>
                                                  </div>
                                                  <thead>
                                                      <tr>
                                                          <th>#</th>
                                                          <th>KD</th>
                                                          <th>Deskripsi </th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php
                                                        $i = 1;
                                                        ?>
                                                      <?php foreach ($kd as $s) :
                                                            if ($s['jenis'] == 'SSp') { ?>
                                                              <tr>
                                                                  <td><?= $i; ?></td>
                                                                  <td><?= $s['no_kd']; ?></td>
                                                                  <td><?= $s['nama_kd']; ?></td>
                                                              </tr>
                                                              <?php $i++ ?>
                                                      <?php }
                                                        endforeach ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                          <!-- /.col -->
                                      </div>
                                      <!-- /.row -->
                                  </div>
                                  <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
                          </div><!-- /.card-body -->
                      </div>
                      <!-- /.nav-tabs-custom -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="row">
                  <!-- /.col -->
                  <div class="col-md-12">
                      <div class="card">
                          <div class="card-body">
                              <div class="tab-content">
                                  <div class="active tab-pane" id="activity">
                                      <!-- Table row -->
                                      <div class="row">
                                          <div class="col-12 table-responsive">
                                              <table class="table table-striped table table-sm">
                                                  <div class="card-header">
                                                      <h3 class="btn btn-info mb-3">KI-2 SIKAP SOSIAL</h3>
                                                  </div>
                                                  <thead>
                                                      <tr>
                                                          <th>#</th>
                                                          <th>KD</th>
                                                          <th>Deskripsi </th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                      <?php
                                                        $i = 1;
                                                        ?>
                                                      <?php foreach ($kd as $s) :
                                                            if ($s['jenis'] == 'SSo') { ?>
                                                              <tr>
                                                                  <td><?= $i; ?></td>
                                                                  <td><?= $s['no_kd']; ?></td>
                                                                  <td><?= $s['nama_kd']; ?></td>
                                                              </tr>
                                                              <?php $i++ ?>
                                                      <?php }
                                                        endforeach ?>
                                                  </tbody>
                                              </table>
                                          </div>
                                          <!-- /.col -->
                                      </div>
                                      <!-- /.row -->
                                  </div>
                                  <!-- /.tab-pane -->
                              </div>
                              <!-- /.tab-content -->
                          </div><!-- /.card-body -->
                      </div>
                      <!-- /.nav-tabs-custom -->
                  </div>
                  <!-- /.col -->
              </div>
              <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->