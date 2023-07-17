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

  <!-- ======= Testimonials Section ======= -->
  <!-- ======= Portfolio Details Section ======= -->
  <section id="portfolio-details" class="portfolio-details">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">
        
        <div class="col-lg-8">

          <div class="portfolio-info">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-indicators">
                <?php
                  foreach ($galery as $key => $value) {
                  $active = ($key == 0) ? 'active' : '';
                  echo ' <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $key . '" class="' . $active . '" aria-current="true" aria-label="Slide 1"></button>';
                  }
                ?>
              </div>
              <div class="carousel-inner">
                <?php
                  foreach ($galery as $key => $value) {
                  $active = ($key == 0) ? 'active' : '';
                  echo '<div class="carousel-item ' . $active . '">
                  <img src="' . base_url() . '/panel/dist/upload/profil_galery/' . $value['foto'] . '" style="height: 350px; width: 700px;" alt="…">                             
                  </div>';
                  }
                ?>
              </div>
              
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>              
          
        </div>

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3><?= $data['judul_galeri'] ?></h3>
            <ul>
              <li><strong>Project date</strong>: <?= $data['datecreate'] ?></li>
            </ul>
            <p><?= $data['deskripsi'] ?></p>
          </div>
        </div>
      </div>

    </div>

    </div>
  </section><!-- End Portfolio Details Section -->

</main><!-- End #main -->