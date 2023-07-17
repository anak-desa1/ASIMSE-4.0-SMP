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
                            <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas/nilai_catatan/tambah_pts/'); ?>"> <i class="fa fa-address-book"></i> Catatan PTS</a>
                            <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas/nilai_catatan/cetak_pts/'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak PTS</a>
                            <?php if ($semester == 1) { ?>
                                <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas/nilai_catatan/tambah_pas/'); ?>"> <i class="fa fa-address-book"></i> Catatan PAS</a>
                                <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas/nilai_catatan/cetak_pas/'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak PAS</a>
                            <?php  } else { ?>
                                <a class="btn btn-info mb-3" href="<?= base_url('akademik_walikelas/nilai_catatan/tambah_pat/'); ?>"> <i class="fa fa-address-book"></i> Catatan PAT</a>
                                <a class="btn btn-success mb-3" href="<?= base_url('akademik_walikelas/nilai_catatan/cetak_pat/'); ?>" target="_blank"><i class="fa fa-print"></i> Cetak PAT</a>
                            <?php  } ?>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <p align="center"><b>CATATAN WALIKELAS</b>
                                                    <br><?php echo "Kelas : " . $kelas['rombel'] . ", Nama Wali : " . $kelas['nama_lengkap']; ?>
                                                </p>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" colspan="2">Nama</th>
                                                            <th class="text-center" colspan="3">Catatan</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="ctr" width="3%">No</th>
                                                            <th width="5%">NIS</th>
                                                            <th width="20%">Nama</th>
                                                            <th class="ctr">PTS</th>
                                                            <?php if ($semester == 1) { ?>
                                                                <th class="ctr">PAS</th>
                                                            <?php  } else { ?>
                                                                <th class="ctr">PAT</th>
                                                                <th class="ctr">Status</th>
                                                                <th class="ctr">Naik Kelas</th>
                                                            <?php  } ?>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        if (!empty($siswa)) {
                                                            foreach ($siswa as $s)
                                                                if ($s['id_guru'] == $pegawai['nik']) {
                                                        ?>
                                                                <tr>
                                                                    <td class="text-center"><?= $no; ?></td>
                                                                    <td><?= $s['nis']; ?></td>
                                                                    <td><?= $s['nama']; ?></td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        foreach ($catatan as $sk) :
                                                                            if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                if ($sk['penilaian'] == 'PTS') {
                                                                                    echo ' <div>' . $sk['catatan_wali'] . ' </div>';
                                                                                }
                                                                        endforeach;
                                                                        ?>
                                                                    </td>
                                                                    <?php if ($semester == 1) { ?>
                                                                        <td class="text-center">
                                                                            <?php
                                                                            foreach ($catatan as $sk) :
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PAS') {
                                                                                        echo ' <div>' . $sk['catatan_wali'] . ' </div>';
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                        </td>
                                                                    <?php  } else { ?>
                                                                        <td class="text-center">
                                                                            <?php
                                                                            foreach ($catatan as $sk) :
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PAT') {
                                                                                        echo ' <div>' . $sk['catatan_wali'] . ' </div>';
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?php
                                                                            foreach ($catatan as $sk) :
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PAT') {
                                                                                        echo ' <div>' . $sk['naik'] . ' </div>';
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <?php
                                                                            foreach ($catatan as $sk) :
                                                                                if ($sk['id_siswa'] == $s['id_siswa'])
                                                                                    if ($sk['penilaian'] == 'PAT') {
                                                                                        echo ' <div>' . $sk['kelas'] . ' </div>';
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                        </td>
                                                                    <?php  } ?>
                                                                </tr>
                                                        <?php
                                                                    $no++;
                                                                }
                                                        } else {
                                                            echo '<tr><td colspan="5"><div class="alert alert-info">Belum ada catatan diinputkan</div></td></tr>';
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
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

<script type="text/javascript">
    $(document).on("ready", function() {

        $("#<?php echo $url; ?>").on("submit", function() {

            var data = $(this).serialize();


            $.ajax({
                type: "POST",
                data: data,
                url: base_url + "<?php echo $url; ?>/simpan",
                beforeSend: function() {
                    $("#tbsimpan").attr("disabled", true);
                },
                success: function(r) {
                    $("#tbsimpan").attr("disabled", false);
                    if (r.status == "ok") {
                        noti("success", r.data);
                    } else {
                        noti("danger", r.data);
                    }
                }
            });

            return false;
        });
    });
</script>