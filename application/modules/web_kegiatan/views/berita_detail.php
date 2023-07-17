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

  <!-- ======= Blog Single Section ======= -->
  <section id="blog" class="blog">
    <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="col-lg-8 entries">
          <div class="card">
            <article class="entry entry-single">
                  <div class="card-header">
                    <div class="entry-img center">
                      <img src="<?= base_url() ?>/panel/dist/upload/profil_berita/<?= $berita['gambar'] ?>" alt="" class="img-fluid">
                    </div>
                  </div>           

                  <div class="card-body">
                    <h5 class="card-title"><?= $berita['judul_artikel'] ?></h5>
                    <a href="#" class="card-link"><i class="bi bi-person"></i> <?= $berita['user_update'] ?></a>
                    <a href="#" class="card-link"><i class="bi bi-clock"></i> <?= $berita['tanggal_terbit'] ?></a>
                  </div>           

                  <div class="card-body">              
                    <p class="card-text"><?= $berita['deskripsi'] ?></p>
                  </div>          
            </article><!-- End blog entry -->
          </div>
        </div><!-- End blog entries list -->

        <div class="col-lg-4">
          <div class="card">
            <div class="sidebar">
              <div class="card-header">
                <h3 class="sidebar-title">Recent Posts</h3>
              </div>
              <div class="sidebar-item recent-posts">
                <div class="card-body">
                  <?php foreach ($sidebar as $e) : ?>
                  <div class="card-header">
                    <div class="row">
                      <div class="col-lg-4">
                        <img src="<?= base_url() ?>/panel/dist/upload/profil_berita/<?= $e->gambar ?>" style="height: 100px; width: 100px;" alt="">
                      </div>
                      <div class="col-lg-8">
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item"><a href="<?= base_url() ?>web_kegiatan/detail_berita/<?= $e->id_artikel ?>"><?= $e->judul_artikel ?></a></li>
                          <li class="list-group-item"><time datetime="2020-01-01"><?= $e->tanggal_terbit ?></time></li>
                        </ul>                       
                      </div>
                    </div>
                  </div>
                <?php endforeach ?>
              </div><!-- End sidebar recent posts-->
            </div><!-- End sidebar -->
          </div> 
        </div>
        <!-- End blog sidebar -->
      </div>              

      </div>
    </section><!-- End Blog Single Section -->
  </main><!-- End #main -->