<style type="text/css">
    .ctr {
        text-align: center
    }

    h5 {
        text-align: right;
        font-size: 18px;
        text-align: center;
    }

    h4 {
        text-align: left;
        font-size: 18px;
        text-align: center;
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
                            <a class="btn btn-warning mb-3" href="<?= base_url('akademik_walikelas/biodata_rapor'); ?>"> <i class="fa fa-arrow-circle-left"></i> kembali</a>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="col-md-12">
                                    <div class="content">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="content">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th colspan="2">PETUNJUK PENGISIAN</th>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>Rapor  merupakan  ringkasan  hasil  penilaian  terhadap  seluruh aktivitas pembelajaran yang dilakukan peserta didik dalam kurun waktu tertentu. Rapor dipergunakan selama peserta didik yang bersangkutan mengikuti seluruh program pembelajaran di Se­ kolah Menengah Pertama tersebut. Berikut ini petunjuk untuk mengisi rapor:</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1</td>
                                                                    <td>Identitas sekolah diisi dengan data yang sesuai dengan keber­ adaan Sekolah Menengah Pertama.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>2</td>
                                                                    <td>Keterangan tentang diri peserta didik diisi lengkap.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>3</td>
                                                                    <td>Rapor dilengkapi dengan pas foto peserta didik ukuran (3 x 4) cm berwarna.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>4</td>
                                                                    <td>Deskripsi sikap spiritual dan sikap sosial diambil dari catatan ( jurnal) perkembangan sikap peserta didik yang ditulis oleh guru mata pelajaran, guru BK, dan wali kelas.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>5</td>
                                                                    <td>Capaian peserta didik dalam pengetahuan dan keterampilan ditulis dalam bentuk angka, predikat, dan deskripsi untuk masing­masing mata pelajaran.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>6</td>
                                                                    <td>Laporan ekstrakurikuler diisi dengan nama dan nilai kegiatan ekstrakurikuler yang diikuti oleh peserta didik.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>7</td>
                                                                    <td>Saransaran diisi dengan hal­hal yang perlu mendapatkan perhatian peserta didik.</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>8</td>
                                                                    <td>Prestasi diisi dengan jenis prestasi peserta didik yang diraih dalam bidang akademik dan non­akademik. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>9</td>
                                                                    <td>Ketidakhadiran ditulis dengan data akumulasi ketidakhadiran peserta didik karena sakit, izin, atau tanpa keterangan selama satu semester. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>10</td>
                                                                    <td>Tanggapan orangtua/wali adalah tanggapan atas pencapaian hasil belajar peserta didik. </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>11</td>
                                                                    <td>Keterangan pindah keluar sekolah diisi dengan alasan kepin­ dahan. Sedangkan pindah masuk diisi dengan sekolah asal.</td> 
                                                                </tr>
                                                                <tr>
                                                                    <td>12</td>
                                                                    <td>KKM (Kriteria Ketuntasan Minimal) diisi dengan nilai mini­ mal pencapaian ketuntasan kompetensi belajar peserta didik yang ditetapkan oleh sa­tuan pendidikan</td>                                                            </tr>
                                                                <tr>
                                                                    <td>13</td>
                                                                    <td>Nilai diisi dengan nilai pencapaian kompetensi belajar peserta didik.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>14</td>
                                                                    <td>Predikat untuk aspek pengetahuan dan keterampilan diisi dengan huruf A, B, C, atau D sesuai panjang interval dan KKM yang sudah ditetapkan oleh satuan pendidikan.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>15</td>
                                                                    <td>Predikat untuk aspek sikap diisi dengan Sangat Baik, Baik, Cukup, atau Kurang.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>16</td>
                                                                    <td>Deskripsi diisi uraian tentang pencapaian kompetensi peserta didik.
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
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