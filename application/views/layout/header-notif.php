<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-danger navbar-badge"><?= sizeof(list_notifikasi()) ?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <?php
        if (sizeof(list_notifikasi()) == 0) {
        ?>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">

                <h3 class="dropdown-item-title">
                  Tidak ada Notifikasi
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
        <?php
        }
        foreach (list_notifikasi() as $ln) : ?>
          <a href="#" class="dropdown-item notifikasi" data-id="<?= $ln['id'] ?>" data-jenis="<?= $ln['jenis'] ?>">
            <!-- Message Start -->
            <div class="media">
              <img src="<?= base_url() ?>assets/images/profil-user/<?= $ln['foto'] ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?= $ln['jenis'] ?>
                </h3>
                <h3 class="dropdown-item-title">
                  <span class="text-sm"><i class="fas fa-user"></i></span> <?= $ln['nama_lengkap'] ?>
                </h3>
                <p class="text-sm"><?= $ln['keterangan'] ?></p>
                <p class="float-right text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= convert_date_to_id($ln['tanggal']) ?></p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
        <?php endforeach ?>
      </div>
    </li>
  
    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li> -->

  </ul>
</nav>