<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center w-auto">
                                <!-- <img src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah['logo'] ?>" alt="" style="width:100%;max-width:150px"> -->
                                <!-- <span class="d-none d-lg-block">Form Login</span> -->
                            </a>
                        </div><!-- End Logo -->
                        <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
                            <div class="card mb-3">
                                <div class="card-body">

                                    <div class="pt-4 pb-3">
                                        <h5 class="card-title text-center pb-0 fs-4">Form Login</h5>
                                        <p class="text-center small">Enter your username & password to login</p>
                                    </div>

                                    <?= $this->session->flashdata('authmsg'); ?>
                                    <form class="row g-3 needs-validation" action="" method="post">
                                        <?= csrf() ?>
                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Username</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="ri-at-line"></i></span>
                                                <input class="form-control" name="email_pegawai" id="email_pegawai" type="text" value="<?= set_value('email_pegawai') ?>" placeholder="Enter Email">
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                        </div>
                                        <?= form_error('email_pegawai', '<small class="text-danger pl-3">', '</small>'); ?>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Password</label>
                                            <div class="input-group has-validation">
                                                <span class="input-group-text" id="inputGroupPrepend"><i class="ri-key-2-fill"></i></span>
                                                <input class="form-control" name="password" id="password" type="password" placeholder="Password">
                                                <div class="invalid-feedback">Please enter your password!</div>
                                            </div>
                                        </div>
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                                <label class="form-check-label" for="rememberMe">Remember me</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="credits">
                            Developed by <a href="https://sistemanakdesa.my.id/">Sistem Anak Desa</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main><!-- End #main -->