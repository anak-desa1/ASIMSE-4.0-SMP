<aside class="main-sidebar sidebar-light-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url() ?>/panel/dist/upload/logo/<?= $sekolah['logo'] ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" style=" font-size: 12px; font-weight: bold;"><?= $sekolah['nama_sekolah'] ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>panel/assets/img/profil-user/<?= $pegawai['img'] ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= $pegawai['nama_pegawai']; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url() ?>dashboard" class="nav-link <?= ($this->uri->segment(1, 0) == 'dashboard' ? 'active' : '') ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>pegawai_profil/pegawai/profil" class="nav-link <?= ($this->uri->segment(1, 0) == 'pegawai_profil' ? 'active' : '') ?>">
            <i class="nav-icon fas fa-user-edit"></i>
            <p>My Profile</p>
          </a>
        </li>
        <?php if ($pegawai['role_id'] == 1) { ?>
          <li class="nav-item">
            <a href="<?= base_url() ?>data_menu" class="nav-link <?= ($this->uri->segment(1, 0) == 'data_menu' ? 'active' : '') ?>">
                <i class="nav-icon fas fa-clipboard"></i>
                <p>Main Menu</p>
            </a>
          </li><!-- End Main Menu Page Nav -->

          <li class="nav-item">
            <a href="<?= base_url() ?>data_submenu" class="nav-link <?= ($this->uri->segment(1, 0) == 'data_submenu' ? 'active' : '') ?>">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>Sub Menu</p>
            </a>
          </li><!-- End Sub Menu Page Nav -->

          <li class="nav-item">
            <a href="<?= base_url() ?>data_role" class="nav-link <?= ($this->uri->segment(1, 0) == 'data_role' ? 'active' : '') ?>">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>Role Access</p> 
            </a>
          </li><!-- End Role Access Page Nav -->

          <li class="nav-item">
            <a href="<?= base_url() ?>data_akses" class="nav-link <?= ($this->uri->segment(1, 0) == 'data_akses' ? 'active' : '') ?>">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>User Access</p>  
            </a>
          </li><!-- End User Access Page Nav -->
        <?php } ?>

        <?php if ($pegawai['role_id'] == 1) { ?>
        <li class="nav-item">
          <a href="<?= base_url() ?>web/out" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
        <?php } ?>
        <?php if ($pegawai['role_id'] == 23) { ?>
        <li class="nav-item">
          <a href="<?= base_url() ?>kepsek/out" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
        <?php } ?>
        <?php if ($pegawai['role_id'] == 18) { ?>
        <li class="nav-item">
          <a href="<?= base_url() ?>tu/out" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
        <?php } ?>
        <?php if ($pegawai['role_id'] == 24 || $pegawai['role_id'] == 25 || $pegawai['role_id'] == 26) { ?>
        <li class="nav-item">
          <a href="<?= base_url() ?>guru/out" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
        <?php } ?>
        <li class="nav-header"> Bottom Navigation </li>
        <?php foreach ($main_menu as $mm) : ?>
          <li class="nav-item has-treeview <?= ($mm['url'] == $this->uri->segment(1, 0) ? 'menu-open' : '')  ?>">
            <a href="#" class="nav-link <?= ($mm['url'] == $this->uri->segment(1, 0) ? 'active' : '')  ?>">
              <i class="nav-icon fas <?= $mm['m_icon'] ?>"></i>
              <p>
                <?= $mm['nama_menu'] ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style=" <?= ($mm['url'] == $this->uri->segment(1, 0) ? " " : "display:none") ?>">
              <?php foreach ($sub_menu as $sm) :
                if ($sm['menu_id'] == $mm['id']) { ?>
                  <li class="nav-item">
                    <a href="<?= base_url($sm['url']) ?>" class="nav-link <?= ($sm['url'] == $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'leading') ? "active" : "") ?>">
                      <i class="far <?= $sm['s_icon'] ?> nav-icon"></i>
                      <p><?= $sm['judul_menu'] ?></p>
                    </a>
                  </li>
              <?php }
              endforeach ?>
            </ul>
          </li>
        <?php endforeach ?>

        <br>
        <li class="nav-item">
          <a href="" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              ASIMSE.4
            </p>
          </a>
        </li>

      </ul>


    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>