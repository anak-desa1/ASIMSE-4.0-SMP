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

      <!-- Profil Sekolah -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Customers Card -->
          <div class="col-xxl-8 col-xl-8">
            <div class="card info-card customers-card">

              <div class="info-box">
                <h5 class="card-title center">Profil <span>| Sekolah</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="container">
                    <div class="row">
                      <div class="col-6" style="font-size: 14px;">Nama</div>
                      <div class="col-6" style="font-size: 14px;">: <?= $sekolah['nama_sekolah'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 14px;">NPSN</div>
                      <div class="col-6" style="font-size: 14px;">: <?= $sekolah['npsn'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 14px;">Alamat</div>
                      <div class="col-6" style="font-size: 14px;">: <?= $sekolah['alamat'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 14px;">Kode Pos</div>
                      <div class="col-6" style="font-size: 14px;">: <?= $sekolah['kodepos'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 14px;">Kecamatan/Kota (LN)</div>
                      <div class="col-6" style="font-size: 14px;">: <?= $sekolah['kecamatan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 14px;">Kab.-Kota/Negara (LN)</div>
                      <div class="col-6" style="font-size: 14px;">: <?= $sekolah['kota'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-6" style="font-size: 14px;">Propinsi/Luar Negeri (LN)</div>
                      <div class="col-6" style="font-size: 14px;">: <?= $sekolah['provinsi'] ?></div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Customers Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-4">
            <div class="card info-card customers-card">

              <div class="info-box">
                <h5 class="card-title">Kepala <span>| Sekolah</span></h5>
              </div>

              <div class="card-body">
                <div class="">
                <img src="<?= base_url() ?>panel/dist/upload/logo/<?= $kepsek['foto'] ?>" class="img-profile" style="width: 8rem;" alt="">
                <p><span class="d-none d-lg-block" style="font-size: 12px;"><?= $kepsek['nama_kepsek'] ?> </span></p>
                <p class="d-none d-lg-block" style="font-size: 12px;">Kepala <?= $sekolah['nama_sekolah'] ?></p> 
                </div>
              </div>
            </div>

          </div><!-- End Customers Card -->
        </div>

      </div>
      <!-- End Profil Sekolah -->

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Diterima Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="info-box">
                <h5 class="card-title">Total <span>| Diterima</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($diterima as $d1) { ?>
                      <h6> <?= $d1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End Diterima Card -->

          <!-- Cadangan Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="info-box">
                <h5 class="card-title">Total <span>| Cadangan</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-bounding-box"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($cadangan as $c1) { ?>
                      <h6><?= $c1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End Cadangan Card -->

          <!-- Pendaftar Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="info-box">
                <h5 class="card-title">Total <span>| Pendaftar</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-check-fill"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($registrasi as $g1) { ?>
                      <h6><?= $g1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>

              </div>

            </div>
          </div><!-- End Pendaftar Card -->

          <!-- Kuota Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="info-box">
                <h5 class="card-title">Kuota <span>| Pendaftaran</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-badge"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($kuota as $k1) { ?>
                      <h6><?= $k1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Kuota Card -->


        </div>
      </div>

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Diterima Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card sales-card">

              <div class="info-box">
                <h5 class="card-title">Daftar <span>| Ulang</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($diterima as $d1) { ?>
                      <h6><?= $d1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Diterima Card -->

          <!-- Cadangan Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card customers-card">

              <div class="info-box">
                <h5 class="card-title">Data <span>| Transaksi</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-bookmark-star"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($transakasi as $t1) { ?>
                      <h6> <?= $t1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Cadangan Card -->

          <!-- Pendaftar Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="info-box">
                <h5 class="card-title">Data <span>| Asal Sekolah</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-shop"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($jml_sekolah as $s1) { ?>
                      <h6> <?= $s1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Pendaftar Card -->

          <!-- Kuota Card -->
          <div class="col-xxl-3 col-md-3">
            <div class="card info-card revenue-card">

              <div class="info-box">
                <h5 class="card-title">Online <span>| Users</span></h5>
              </div>

              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-lines-fill"></i>
                  </div>
                  <div class="ps-3">
                    <?php foreach ($online as $o1) { ?>
                      <h6> <?= $o1['total'] ?></h6>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End Kuota Card -->

        </div>
      </div>

    </div>

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>