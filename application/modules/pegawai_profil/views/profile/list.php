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
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- Profile Image -->
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url() ?>panel/assets/img/profil-user/<?= $pegawai['img'] ?>" alt="User profile picture">
                            </div>
                            <h4 class="profile-username text-center"><?= $pegawai['nama_pegawai'] ?></h4>
                            <p class="text-muted text-center"><?= $pegawai['email_pegawai'] ?></p>
                        </div>                       
                        <!-- About Me Box -->             
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#profil" data-toggle="tab">Profil</a></li>
                                <li class="nav-item"><a class="nav-link" href="#biodata" data-toggle="tab">Password</a></li>
                                <li class="nav-item"><a class="nav-link" href="#riwayat" data-toggle="tab">Dinas Pendidikan</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profil">
                                    <!-- Default box -->
                                    <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                    <?= $this->session->flashdata('message'); ?>
                                    <div class="tampil-modal"></div>
                                    <?= form_open_multipart('pegawai_profil/pegawai/profil'); ?>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email_pegawai" name="email_pegawai" value="<?= $pegawai['email_pegawai'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="<?= $pegawai['nama_pegawai'] ?>">
                                                <?= form_error('nama_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">File input</label>
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="custom-file">
                                                            <img src="<?= base_url() ?>panel/assets/img/profil-user/<?= $pegawai['img'] ?>" class="img-thumbnail" height="100px" width="100px">
                                                            <input type="hidden" name="old_image" value="<?= $pegawai['img'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="img" name="img">
                                                            <label class="custom-file-label" for="img">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    </form>
                                    <!-- /.card -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="biodata">
                                    <?= form_open_multipart('pegawai_profil/pegawai/password'); ?>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="email_pegawai" name="email_pegawai" value="<?= $pegawai['email_pegawai'] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputName2" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" name="password2" class="form-control" id="password2" placeholder="Konfirmasi Password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="riwayat">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                Link Dinas Pendidikan
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>
                                            <div class="timeline-item">
                                                <a href="http://paud.kemdikbud.go.id/" target="_blank">DIREKTORAT PAUD</a>
                                            </div>
                                            <div class="timeline-item">
                                                <a href="http://ditpsd.kemdikbud.go.id/" target="_blank">DIREKTORAT SEKOLAH DASAR</a>
                                            </div>
                                            <div class="timeline-item">
                                                <a href="http://ditsmp.kemdikbud.go.id/" target="_blank">DIREKTORAT SEKOLAH MENENGAH PERTAMA</a>
                                            </div>
                                            <div class="timeline-item">
                                                <a href="https://psma.kemdikbud.go.id/" target="_blank">DIREKTORAT SEKOLAH MENENGAH ATAS</a>
                                            </div>
                                            <div class="timeline-item">
                                                <a href="https://smk.kemdikbud.go.id/" target="_blank">DIREKTORAT MENENGAH KEJURUAN</a>
                                            </div>
                                         </div>

                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

 </div>
