 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <?php $this->load->view('layout/header-page') ?>

     <section class="content">
         <div class="container-fluid">
             <!-- About Me Box -->
             <div class="card card-info">
                 <div class="card-header">
                     <h3 class="card-title">About Me</h3>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body">
                     <p class="text-muted"><?= $data['nama'] ?></p>
                     <p class="text-muted"><?= $data['mapel_id'] ?> | <?= $data['id_mapel'] ?> | <?= $data['nama_lengkap'] ?> | <?= $data['rombel'] ?> | <?= $data['id_kelas'] ?></p>
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </div>
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <!-- /.col -->
                 <div class="col-md-12">
                     <div class="card">
                         <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                         <?= $this->session->flashdata('message'); ?>
                         <div class="tampil-modal"></div>
                         <div class="card-header p-2">
                             <a class="btn btn-info mb-3" href="<?= site_url('akademik_guru/input_nilai/') ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                             <a class="btn btn-primary mb-3" href="<?= site_url('akademik_guru/nilai_keterampilan/tambah_ket/') ?><?= $data['mapel_id'] ?>"><i class="fa fa-plus-circle"></i> Input Nilai</a>
                             <a class="btn btn-warning mb-3" href="<?= site_url('akademik_guru/nilai_keterampilan/cetak/') ?><?= $data['mapel_id'] ?>" target="blank_"><i class="fa fa-print"></i> cetak</a>
                             <?php if ($cek_akses['role_id'] == 1) : ?>
                             <?php endif ?>
                             &nbsp;
                             Tahun Aktif : <?= $tahun ?>
                             &nbsp;
                             Semester : <?= $semester ?>
                         </div><!-- /.card-header -->
                         <div class="card-body">
                             <div class="tab-content">
                                 <div class="active tab-pane" id="activity">
                                     <!-- Table row -->
                                     <div class="row">
                                         <div class="table-responsive">
                                             <table class="table table-striped table table-sm">
                                                 <thead></thead>
                                                 <tbody>
                                                     <tr>
                                                         <td colspan="3" class="text-center"><b>DATA SISWA</b></td>
                                                         <td colspan="24" class="text-center"><b>KI-4 KETERAMPILAN</b></td>
                                                     </tr>
                                                     <tr>
                                                         <td class="text-center align-middle">NO</td>
                                                         <td class="text-center align-middle">NIS</td>
                                                         <td class="text-center align-middle">Nama Siswa</td>
                                                         <td class="text-center align-middle">KKM</td>
                                                         <!-- <td class="text-center align-middle">Tema</td> -->
                                                         <td class="text-center align-middle">KD</td>
                                                         <td class="text-center align-middle">Praktik</td>
                                                         <td class="text-center align-middle">NT</td>
                                                         <!-- <td class="text-center align-middle">Tema</td> -->
                                                         <td class="text-center align-middle">KD</td>
                                                         <td class="text-center align-middle">Produk</td>
                                                         <td class="text-center align-middle">NT</td>
                                                         <!-- <td class="text-center align-middle">Tema</td> -->
                                                         <td class="text-center align-middle">KD</td>
                                                         <td class="text-center align-middle">Projek</td>
                                                         <td class="text-center align-middle">NT</td>
                                                         <!-- <td class="text-center align-middle">Tema</td> -->
                                                         <td class="text-center align-middle">KD</td>
                                                         <td class="text-center align-middle">Portofolio</td>
                                                         <td class="text-center align-middle">NT</td>
                                                         <td class="text-center align-middle"><b>KD</b></td>
                                                         <td class="text-center align-middle"><b>Nilai KD</b></td>
                                                         <!-- <td class="text-center align-middle">NA_NPH</td> -->
                                                         <!-- <td class="text-center align-middle">Deskripsi</td> -->
                                                         <td class="text-center align-middle">N_Rapor</td>
                                                         <td class="text-center align-middle">Predikat</td>
                                                         <td class="text-center align-middle">Ketuntasan</td>
                                                     </tr>
                                                     <?php $no = 1;  ?>
                                                     <?php if (!empty($nilai)) { ?>
                                                         <?php foreach ($siswa as $s) : ?>
                                                             <td class="text-center"><?= $no; ?></td>
                                                             <td class="text-center"><?= $s['nis']; ?></td>
                                                             <td><?= $s['nama']; ?></td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($kkm as $k) :
                                                                        if ($k['id_mapel'] == $data['id_mapel'])
                                                                            if ($k['kelas'] == $data['id_kelas'])
                                                                                if ($k['ta'] == $tahun) {
                                                                                    echo $k['kkm'];
                                                                                }
                                                                    endforeach
                                                                    ?>
                                                             </td>
                                                             <?php
                                                                $total_all = 0;
                                                                $akd = array();
                                                                $all_kd = "";
                                                                $jum_kd = 0;
                                                                foreach ($nilai as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_siswa'] == $s['id_siswa']) {
                                                                            if (strpos($all_kd, $n['no_kd']) === false) {
                                                                                $all_kd = $all_kd . $n['no_kd'];
                                                                                array_push($akd, $n['no_kd']);
                                                                                $jum_kd++;
                                                                            } else if ($all_kd == "") {
                                                                                $all_kd = $all_kd . $n['no_kd'];
                                                                                array_push($akd, $n['no_kd']);
                                                                                $jum_kd++;
                                                                            }
                                                                ?>
                                                             <?php }
                                                                endforeach
                                                                ?>
                                                             <!-- Praktik -->
                                                             <!-- <td class="text-center">
                                                             <?php foreach ($nilai as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_siswa'] == $s['id_siswa']) { ?>
                                                                     <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                                                         <div><?= $n['tema']; ?></div>
                                                                     <?php endif ?>
                                                             <?php }
                                                                endforeach ?>
                                                         </td> -->
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kdprd = [];
                                                                    foreach ($nilai as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_siswa'] == $s['id_siswa']) { ?>
                                                                         <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                                                             <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                                                        $kdprd[] = $n['no_kd'];
                                                                                    } ?>
                                                                             <div><?= $n['no_kd']; ?></div>
                                                                         <?php endif ?>
                                                                 <?php }
                                                                    endforeach ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kp = 0;
                                                                    $maxprd = [];
                                                                    for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                        $max = [];
                                                                        $maxall = [];
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                                                             <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                                                                 <div><?= $n['nilai'] ?></div>
                                                                             <?php
                                                                                    endif ?>
                                                                 <?php }

                                                                        endforeach;
                                                                    }
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kp = 0;
                                                                    for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                        $max = [];
                                                                        $maxall = [];
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                                                             <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                                                             <?php
                                                                                        $maxall[] = round($n['nilai']);
                                                                                    endif ?>
                                                                 <?php }

                                                                        endforeach;
                                                                        echo '<div><b>' . max($maxall) . '</b></div>';
                                                                    }
                                                                    ?>
                                                             </td>
                                                             <!-- Praktik -->
                                                             <!-- Produk -->
                                                             <!-- <td class="text-center">
                                                             <?php foreach ($nilai as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_siswa'] == $s['id_siswa']) { ?>
                                                                     <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                                                         <div><?= $n['tema']; ?></div>
                                                                     <?php endif ?>
                                                             <?php }
                                                                endforeach ?>
                                                         </td> -->
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kdprd = [];
                                                                    foreach ($nilai as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_siswa'] == $s['id_siswa']) { ?>
                                                                         <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                                                             <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                                                        $kdprd[] = $n['no_kd'];
                                                                                    } ?>
                                                                             <div><?= $n['no_kd']; ?></div>
                                                                         <?php endif ?>
                                                                 <?php }
                                                                    endforeach ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kp = 0;
                                                                    $maxprd = [];
                                                                    for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                        $max = [];
                                                                        $maxall = [];
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                                                             <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                                                                 <div><?= $n['nilai'] ?></div>
                                                                             <?php
                                                                                    endif ?>
                                                                 <?php }

                                                                        endforeach;
                                                                    }
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kp = 0;
                                                                    for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                        $max = [];
                                                                        $maxall = [];
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                                                             <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                                                             <?php
                                                                                        $maxall[] = round($n['nilai']);
                                                                                    endif ?>
                                                                 <?php }

                                                                        endforeach;
                                                                        echo '<div><b>' . max($maxall) . '</b></div>';
                                                                    }
                                                                    ?>
                                                             </td>
                                                             <!-- end Produk -->
                                                             <!-- Projek -->
                                                             <!-- <td class="text-center">
                                                             <?php foreach ($nilai as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_siswa'] == $s['id_siswa']) { ?>
                                                                     <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                                                         <div><?= $n['tema']; ?></div>
                                                                     <?php endif ?>
                                                             <?php }
                                                                endforeach ?>
                                                         </td> -->
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kdprd = [];
                                                                    foreach ($nilai as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_siswa'] == $s['id_siswa']) { ?>
                                                                         <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                                                             <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                                                        $kdprd[] = $n['no_kd'];
                                                                                    } ?>
                                                                             <div><?= $n['no_kd']; ?></div>
                                                                         <?php endif ?>
                                                                 <?php }
                                                                    endforeach ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kp = 0;
                                                                    $maxprd = [];
                                                                    for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                        $max = [];
                                                                        $maxall = [];
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                                                             <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                                                                 <div><?= $n['nilai'] ?></div>
                                                                             <?php
                                                                                    endif ?>
                                                                 <?php }

                                                                        endforeach;
                                                                    }
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kp = 0;
                                                                    for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                        $max = [];
                                                                        $maxall = [];
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                                                             <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                                                             <?php
                                                                                        $maxall[] = round($n['nilai']);
                                                                                    endif ?>
                                                                 <?php }

                                                                        endforeach;
                                                                        echo '<div><b>' . max($maxall) . '</b></div>';
                                                                    }
                                                                    ?>
                                                             </td>
                                                             <!-- end Projek -->
                                                             <!-- Portofolio -->
                                                             <!-- <td class="text-center">
                                                             <?php foreach ($nilai as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_siswa'] == $s['id_siswa']) { ?>
                                                                     <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                                                         <div><?= $n['tema']; ?></div>
                                                                     <?php endif ?>
                                                             <?php }
                                                                endforeach ?>
                                                         </td> -->
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kdprd = [];
                                                                    foreach ($nilai as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_siswa'] == $s['id_siswa']) { ?>
                                                                         <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                                                             <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                                                        $kdprd[] = $n['no_kd'];
                                                                                    } ?>
                                                                             <div><?= $n['no_kd']; ?></div>
                                                                         <?php endif ?>
                                                                 <?php }
                                                                    endforeach ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kp = 0;
                                                                    $maxprd = [];
                                                                    for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                        $max = [];
                                                                        $maxall = [];
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                                                             <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                                                                 <div><?= $n['nilai'] ?></div>
                                                                             <?php
                                                                                    endif ?>
                                                                 <?php }

                                                                        endforeach;
                                                                    }
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    $kp = 0;
                                                                    for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                        $max = [];
                                                                        $maxall = [];
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa'] && $n['no_kd'] == $kdprd[$kp]) { ?>
                                                                             <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                                                             <?php
                                                                                        $maxall[] = round($n['nilai']);
                                                                                    endif ?>
                                                                 <?php }

                                                                        endforeach;
                                                                        echo '<div><b>' . max($maxall) . '</b></div>';
                                                                    }
                                                                    ?>
                                                             </td>
                                                             <!-- end Portofolio -->
                                                             <td class="text-center">
                                                                 <?php
                                                                    for ($i = 0; $i < $jum_kd; $i++) {
                                                                        echo '<div><b>' . ($akd[$i])  . '</b></div>';
                                                                    } ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    $maxall = [];
                                                                    $jum_n = 0;
                                                                    $total_all = 0;
                                                                    for ($i = 0; $i < $jum_kd; $i++) {
                                                                        $maxprk = [];
                                                                        $maxprj = [];
                                                                        $maxprd = [];
                                                                        $maxprt = [];
                                                                        $nilai_tinggi = 0;
                                                                        $num = 0;
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa'] && $n['no_kd'] == $akd[$i]) { ?>
                                                                             <?php if (substr($n['jenis'], 0, 6) == 'Produk') {
                                                                                        $maxprd[] = round($n['nilai']);
                                                                                    } else if (substr($n['jenis'], 0, 7) == 'Praktik') {
                                                                                        $maxprk[] = round($n['nilai']);
                                                                                    } else if (substr($n['jenis'], 0, 6) == 'Projek') {
                                                                                        $maxprj[] = round($n['nilai']);
                                                                                    } else if (substr($n['jenis'], 0, 10) == 'Portofolio') {
                                                                                        $maxprt[] = round($n['nilai']);
                                                                                    }

                                                                                ?>
                                                                 <?php }

                                                                        endforeach;

                                                                        if (count($maxprj) > 0) {
                                                                            $nilai_tinggi = $nilai_tinggi + max($maxprj);
                                                                            $num++;
                                                                        }
                                                                        if (count($maxprt) > 0) {
                                                                            $nilai_tinggi = $nilai_tinggi + max($maxprt);
                                                                            $num++;
                                                                        }
                                                                        if (count($maxprk) > 0) {
                                                                            $nilai_tinggi = $nilai_tinggi + max($maxprk);
                                                                            $num++;
                                                                        }
                                                                        if (count($maxprd) > 0) {
                                                                            $nilai_tinggi = $nilai_tinggi + max($maxprd);
                                                                            $num++;
                                                                        }

                                                                        $nilai_tinggi = round($nilai_tinggi / $num, 0, PHP_ROUND_HALF_UP);
                                                                        $total_all = $total_all + $nilai_tinggi;
                                                                        echo '<div><b>' .  $nilai_tinggi  . '</b></div>';
                                                                    }
                                                                    ?>
                                                             </td>
                                                             <!-- <td class="text-center">
                                                             <?php if (!empty($nilai)) { ?>
                                                                 <?php $total_nph = round($total_all / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                                                 <?php echo '<div>' .  $total_nph  . '</div>'; ?>
                                                             <?php
                                                                } else {
                                                                    echo $total_nph = 0;
                                                                } ?>
                                                         </td> -->
                                                             <!-- <td class="text-center">
                                                             <?php if (!empty($total_all)) {
                                                                    $maxmin = [];
                                                                    $desckd = [];
                                                                    for ($i = 0; $i < $jum_kd; $i++) {
                                                                        $total = 0;
                                                                        $jum_n = 0;
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                    if ($n['no_kd'] == $akd[$i]) {
                                                                                        $jum_n++;
                                                                                        $total = $total + $n['nilai'];
                                                                                        if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                                                            $desckd[] = $n['nama_kd'];
                                                                                        }
                                                                                    }
                                                                                }
                                                                        endforeach;
                                                                        $total_all += round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                                                        // echo '<div>' . $akd[$i] . ': ' . (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP) . '</div>';
                                                                        $maxmin[] = round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                                                    }
                                                                    echo "<div> Ananda" . $s['nama'] . " <b>sangat baik</b> " . $desckd[array_search(max($maxmin), $maxmin)] . ", <b>cukup</b> " . $desckd[array_search(min($maxmin), $maxmin)] . "</div>";
                                                                } else {
                                                                    echo $total_all = 0;
                                                                }
                                                                ?>
                                                         </td> -->
                                                             <td class="text-center">
                                                                 <?= $total_nph ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php if (!empty($total_nph)) {
                                                                        foreach ($kkm as $k) :
                                                                            if ($k['id_mapel'] == $data['id_mapel'])
                                                                                if ($k['kelas'] == $data['id_kelas']) {
                                                                                    // echo $k['kkm'];
                                                                                    $in_kkm = (string)round((100 - $k['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                                                                    $C = $k['kkm'];
                                                                                    $B = $C + $in_kkm;
                                                                                    $A = $B + $in_kkm;
                                                                                }
                                                                        endforeach
                                                                    ?>
                                                                     <?php if ($total_nph >= $A) {
                                                                            echo "A";
                                                                        } elseif ($total_nph >= $B) {
                                                                            echo "B";
                                                                        } elseif ($total_nph >= $C) {
                                                                            echo "C";
                                                                        } elseif ($total_nph <= $C) {
                                                                            echo "D";
                                                                        } else {
                                                                            echo "Jangan menyerah, anda pasti bisa!  ";
                                                                        } ?>
                                                                 <?php
                                                                    } else {
                                                                        // echo $total_nph = 0;
                                                                    } ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php if (!empty($total_nph))
                                                                        foreach ($kkm as $k) :
                                                                            if ($k['id_mapel'] == $data['id_mapel'])
                                                                                if ($k['kelas'] == $data['id_kelas'])
                                                                                    // echo $k['kkm'];
                                                                                    if ($total_nph >= $k['kkm']) {
                                                                                        echo 'Tuntas';
                                                                                    } else {
                                                                                        echo 'Belum Tuntas';
                                                                                    }
                                                                        endforeach
                                                                    ?>
                                                             </td>
                                                             </tr>
                                                             <?php $no++ ?>
                                                         <?php endforeach ?>
                                                     <?php } ?>
                                                 </tbody>
                                             </table>
                                         </div>
                                         <!-- /.col -->
                                     </div>
                                     <!-- /.row -->
                                 </div>
                                 <!-- /.tab-pane -->
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