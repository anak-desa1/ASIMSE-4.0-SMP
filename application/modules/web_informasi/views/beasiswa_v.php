<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2><?= $title; ?></h2>
        <ol>
          <li><a href="<?= base_url('home') ?>">Home</a></li>
          <li><?= $home; ?></li>
          <li><?= $subtitle; ?></li>
        </ol>
      </div>

    </div>
  </section><!-- End Breadcrumbs -->

  <!-- ======= Events Section ======= -->
  <section id="events" class="events">
    <div class="container">

      <div class="section-title">
        <h2>Informasi Data Beasiswa <span>Sekolah</span></h2>
      </div>

      <div class="row">

        <div class="col-lg-8 mt-4 mt-lg-0">

          <div class="card">
            <div class="card-body">
              <div class="card-responsive">
                <form action="" id="form-beasiswa">
                  <div class="row">
                    <div class="col-lg-8 mt-4 mt-lg-0">
                      <div class="">
                        <input class="form-control" type="number" name="nis" id="nis" placeholder="Masukkan NIS">
                      </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                      <button type="submit" class="btn btn-primary">Cari Data</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <p class="fst-italic text-danger"> * Untuk menampilkan Informasi Data Beasiswa -> masukkan NIS -> klik cari data</p>
            </div>
          </div>

          <div class="col-md-4 form-group"><br></div>
          <div class="card" id="sertifikat"></div>

        </div>

        <!-- Info Lebih Lanjut -->        
        <div class="col-lg-4">
            <div class="info">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Info Lebih Lanjut</h5>
                </div>
              
                <div class="container" data-aos="fade-up"> 
                    <br>              
                    <div class="phone">
                    <?php foreach ($kontak as $k) :
                      $opsi = $this->db->get_where('m_sekolah')->row_array(); ?>
                    
                      <h4>CONTACT:</h4>
                      <p>  &nbsp<?= $opsi['nama_sekolah'] ?></b><br>
                            &nbsp<?= $k['nama_kontak'] ?><br>
                            <i class=""><a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=Hello... , <?= $opsi['nama_sekolah'] ?> <?= $sekolah['livechat'] ?>" class="alert-link"><img class="img-profile rounded-circle" style="width: 3rem;" src="<?= base_url() ?>panel/dist/upload/avatar/WA_group.png"></a></i>&nbsp<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?= $k['no_kontak'] ?>&text=Hello... , <?= $opsi['nama_sekolah'] ?> <?= $sekolah['livechat'] ?>" class="alert-link"><?= $k['no_kontak'] ?></a></p>
                      <?php endforeach ?>     
                    </div>                                            
                </div> 

              </div>
            </div> 
        </div>
        <!-- End Info Lebih Lanjut -->

      </div>

    </div>
  </section><!-- End Events Section -->


</main><!-- End #main -->