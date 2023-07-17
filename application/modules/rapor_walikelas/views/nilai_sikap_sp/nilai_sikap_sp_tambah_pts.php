<style type="text/css">
    .ctr {
        text-align: center
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <?php $this->load->view('layout/header-page') ?>

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <!-- About Me Box -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p class="text-muted">
                        Walikelas : <?= $kelas['nama_lengkap'] ?>
                        Kelas : <?= $kelas['rombel'] ?>
                    </p>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="tampil-modal"></div>
                        <div class="card-header p-2">
                            <a class="btn btn-warning mb-3" href="<?= base_url('akademik_walikelas/nilai_sikap_sp'); ?>"><i class="fa fa-arrow-alt-circle-left"></i> Kembali</a>
                            <h3 class="btn btn-info mb-3">Form Awal Tambah Nilai Sikap Spiritual</h3>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <div class="content">
                                                    <table class="table table-condensed table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%">No</th>
                                                                <th width="20%">Nama</th>
                                                                <th width="10%">Predikat</th>
                                                                <th width="50%" colspan="2">Selalu Dilakukan</th>
                                                                <th width="20%">Mulai Meningkat</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <form action="<?= base_url('akademik_walikelas/nilai_sikap_sp/simpan_nilai_pts'); ?>" method="post">
                                                                <input type="hidden" name="id_kelas" value="<?= $kelas['rombel'] ?>">
                                                                <input type="hidden" name="tasm" value="<?= $tasm ?>">
                                                                <?php
                                                                $no = 1;
                                                                if (!empty($siswa_kelas)) {
                                                                    $opsyen = array();

                                                                    foreach ($list_kd as $l) {
                                                                        $idx = $l['kd_id'];
                                                                        $val = $l['nama_kd'];
                                                                        $opsyen[$idx] = $val;
                                                                    }

                                                                    foreach ($siswa_kelas as $sk) {
                                                                        $pc_selalu = explode(",", $sk['selalu']);
                                                                        $mm = $sk['mulai_meningkat'];

                                                                        if (empty($pc_selalu[0])) {
                                                                            $pcs = '8';
                                                                        } else {
                                                                            $pcs = $pc_selalu[0];
                                                                        }

                                                                        if (empty($pc_selalu[1])) {
                                                                            $pcs1 = '9';
                                                                        } else {
                                                                            $pcs1 = $pc_selalu[1];
                                                                        }

                                                                        if (empty($mm)) {
                                                                            $mm = '10';
                                                                        } else {
                                                                            $mm = $mm;
                                                                        }

                                                                ?>
                                                                        <tr>
                                                                            <td><?= $no; ?></td>
                                                                            <td> <input type="hidden" name="id_siswa[]" value="<?= $sk['nis']; ?>"><?= $sk['nama']; ?></td>
                                                                            <td>
                                                                                <?php
                                                                                if (empty($sk['predikat'])) {
                                                                                    $sk = '4';
                                                                                } else {
                                                                                    $sk = $sk['predikat'];
                                                                                }
                                                                                echo form_dropdown('predikat[]', $p_predikat, $sk, 'class="form-control" required id="predikat"'); ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= form_dropdown('ssp1[]', $opsyen, $pcs, 'class="form-control" required id="ssp1"'); ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= form_dropdown('ssp2[]', $opsyen, $pcs1, 'class="form-control" required id="ssp2"'); ?>
                                                                            </td>
                                                                            <td>
                                                                                <?= form_dropdown('ssp3[]', $opsyen, $mm, 'class="form-control" required id="ssp3"'); ?>
                                                                            </td>
                                                                        </tr>
                                                                <?php
                                                                        $no++;
                                                                    }
                                                                } else {
                                                                    echo '<tr><td colspan="5">Belum ada data siswa</td></tr>';
                                                                }
                                                                ?>
                                                        </tbody>

                                                    </table>
                                                    <input type="hidden" name="jumlah" value="<?= $no; ?>">
                                                    <button type="submit" class="btn btn-success" id="tbsimpan"><i class="fa fa-check"></i> Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).on("ready", function() {

        $("#<?= $nama_form; ?>").on("submit", function() {
            // console.log(<?= $nama_form; ?>);
            var data = $(this).serialize();
            var jml_data = <?= $no; ?>;
            var teks_error = "";

            for (var i = 1; i < jml_data; i++) {
                var ssp1 = $("#ssp1_" + i).val();
                var ssp2 = $("#ssp2_" + i).val();
                var ssp3 = $("#ssp3_" + i).val();
                if ((ssp1 == ssp2) || (ssp1 == ssp3) || (ssp2 == ssp3)) {
                    teks_error += 'Baris ' + i + ' ada isian sama<br>';
                }
            }
            if (teks_error != "") {
                noti("danger", teks_error);
            } else {
                $.ajax({
                    type: "POST",
                    data: data,
                    url: "<?= base_url() ?><?= $url; ?>simpan_nilai",
                    beforeSend: function() {
                        $("#tbsimpan").attr("disabled", true);
                    },
                    success: function(r) {
                        $("#tbsimpan").attr("disabled", false);
                        if (r.status == "ok") {
                            noti("success", r.data);
                        } else {
                            noti("danger", "Data gagal disimpan...");
                        }
                    }
                });
            }
            return false;
        });
    });
</script>