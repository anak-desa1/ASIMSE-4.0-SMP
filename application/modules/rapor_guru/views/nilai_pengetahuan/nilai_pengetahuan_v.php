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
                     <p class="text-muted"><?= $data['rombel'] ?> | <?= $data['id_kelas'] ?> | <?= $data['mapel_id'] ?> | <?= $data['id_mapel'] ?> | <?= $data['nama_lengkap'] ?></p>
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
                             <a class="btn btn-primary mb-3" href="<?= site_url('akademik_guru/nilai_pengetahuan/tambah_peng/') ?><?= $data['mapel_id'] ?>"><i class="fa fa-plus-circle"></i> Input Nilai</a>
                             <a class="btn btn-warning mb-3" href="<?= site_url('akademik_guru/nilai_pengetahuan/cetak/') ?><?= $data['mapel_id'] ?>" target="_blank"><i class="fa fa-print"></i> cetak</a>
                             <?php if ($cek_akses['role_id'] == 1) : ?>
                             <?php endif ?>
                             &nbsp;
                             Tahun Aktif : <?= $tahun ?>
                             &nbsp;
                             Semester : <?= $semester ?>
                             <div class="alert alert-danger" role="alert">
                                 *KD yang sudah di petakan wajib diisi, bila tidak di ujikan dikosongkan saja / 0 (karena tampilan nilai akan error)
                             </div>
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
                                                         <td rowspan="2" colspan="4" class="text-center align-middle"><b>DATA SISWA</b></td>
                                                         <td colspan="19" class="text-center"><b>KI-3 PENGETAHUAN</b></td>
                                                         <!-- <?php echo $ta ?> -->
                                                     </tr>
                                                     <?php foreach ($siswa as $s) :
                                                        endforeach ?>
                                                     <tr>
                                                         <?php if (!empty($nilai)) { ?>
                                                             <?php foreach ($nilai as $n) : ?>
                                                             <?php endforeach ?>
                                                             <?php if ($ta == 1) { ?>
                                                                 <td colspan="2" class="text-center">Tes Tertulis </td>
                                                                 <td colspan="2" class="text-center">Penugasan</td>
                                                             <?php } ?>
                                                             <?php if ($ta == 2) { ?>
                                                                <td colspan="2" class="text-center">Tes Tertulis </td>
                                                                 <td colspan="2" class="text-center">Penugasan</td>
                                                             <?php } ?>
                                                             <td colspan="11" class="text-center">REKAP NILAI</td>
                                                     </tr>
                                                     <tr>
                                                         <td class="text-center align-middle">NO</td>
                                                         <td class="text-center align-middle">NIS</td>
                                                         <td class="text-center align-middle">Nama Siswa</td>
                                                         <td class="text-center align-middle">KKM</td>
                                                         <?php if ($ta == 1) { ?>
                                                             <td class="text-center align-middle">KD</td>
                                                             <td class="text-center align-middle">PH</td>
                                                             <td class="text-center align-middle">KD</td>
                                                             <td class="text-center align-middle">TG</td>
                                                         <?php } ?>
                                                         <?php if ($ta == 2) { ?>
                                                             <td class="text-center align-middle">KD</td>
                                                             <td class="text-center align-middle">PH</td>
                                                             <td class="text-center align-middle">KD</td>
                                                             <td class="text-center align-middle">TG</td>
                                                         <?php } ?>
                                                     <?php } ?>
                                                     <td class="text-center align-middle">KD</td>
                                                     <td class="text-center align-middle">NILAI KD</td>
                                                     <td class="text-center align-middle">NPH</td>
                                                     <td class="text-center align-middle">NPTS</td>
                                                     <td class="text-center align-middle">NPAS</td>
                                                     <!-- <td class="text-center align-middle">Deskripsi</td> -->
                                                     <td class="text-center align-middle">NILAI RAPOR</td>
                                                     <td class="text-center align-middle">Predikat</td>
                                                     <td class="text-center align-middle">Ketuntasan</td>
                                                     </tr>
                                                     <?php $no = 1;  ?>
                                                     <?php if (!empty($nilai)) { ?>
                                                         <?php foreach ($siswa as $s) : ?>
                                                             <tr>
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
                                                                 <!-- hitung nilai -->
                                                                 <?php
                                                                    $total_all_n = 0;
                                                                    $total_nakd = 0;
                                                                    $total_na = 0;
                                                                    $total_nph = 0;
                                                                    $akd = array();
                                                                    $all_kd = "";
                                                                    $jum_kd = 0;
                                                                    foreach ($nilai as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_siswa'] == $s['id_siswa'])
                                                                                if (substr($n['jenis'], 0, 2) == 'PH' || substr($n['jenis'], 0, 2) == 'TG') { {
                                                                                        if (strpos($all_kd, $n['no_kd']) === false) {
                                                                                            $all_kd = $all_kd . $n['no_kd'];
                                                                                            array_push($akd, $n['no_kd']);
                                                                                            $jum_kd++;
                                                                                        } else if ($all_kd == "") {
                                                                                            $all_kd = $all_kd . $n['no_kd'];
                                                                                            array_push($akd, $n['no_kd']);
                                                                                            $jum_kd++;
                                                                                        }
                                                                                    }
                                                                    ?>
                                                                 <?php }
                                                                    endforeach
                                                                    ?>
                                                                 <!-- end hitung nilai -->
                                                                 <?php if ($ta == 1) { ?>
                                                                     <td class="text-center">
                                                                         <?php
                                                                            foreach ($nilai as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                            echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                     </td>
                                                                     <td class="text-center">
                                                                         <?php
                                                                            foreach ($nilai as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                            echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                     </td>
                                                                     <td class="text-center">
                                                                         <?php
                                                                            foreach ($nilai as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                            echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                     </td>
                                                                     <td class="text-center">
                                                                         <?php
                                                                            foreach ($nilai as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                            echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                     </td>
                                                                 <?php } ?>
                                                                 <?php if ($ta == 2) { ?>
                                                                     <td class="text-center">
                                                                         <?php
                                                                            foreach ($nilai as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                            echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                     </td>
                                                                     <td class="text-center">
                                                                         <?php
                                                                            foreach ($nilai as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                            echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                     </td>
                                                                     <td class="text-center">
                                                                         <?php
                                                                            foreach ($nilai as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                            echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                     </td>
                                                                     <td class="text-center">
                                                                         <?php
                                                                            foreach ($nilai as $n) :
                                                                                if ($n['tasm'] == $tasm)
                                                                                    if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                        if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                            echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                        }
                                                                                    }
                                                                            endforeach;
                                                                            ?>
                                                                     </td>
                                                                 <?php } ?>
                                                                 <td class="text-center">
                                                                     <?php
                                                                        for ($i = 0; $i < $jum_kd; $i++) {
                                                                            echo '<div>' . $akd[$i] . '</div>';
                                                                        }
                                                                        ?>
                                                                 </td>
                                                                 <td class="text-center">
                                                                     <?php
                                                                        if (!empty($nilai)) {
                                                                            $maxmin = [];
                                                                            $desckd = [];
                                                                            for ($i = 0; $i < $jum_kd; $i++) {
                                                                                $jum_ph = 0;
                                                                                $jum_tg = 0;
                                                                                $total_ph = 0;
                                                                                $total_tg = 0;
                                                                                // $jum_n = 0;
                                                                                if (!empty($nilai)) {
                                                                                    foreach ($nilai as $n) :
                                                                                        if ($n['tasm'] == $tasm)
                                                                                            if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                                    if ($n['no_kd'] == $akd[$i]) {
                                                                                                        $jum_ph++;
                                                                                                        $total_ph = $total_ph + $n['nilai'];                                                                                                       
                                                                                                        $kd = $n['nama_kd'];
                                                                                                        //$desckd[] = $n['nama_kd'];
                                                                                                        if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                                                                            $desckd[] = $n['nama_kd'];
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                                if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                                    if ($n['no_kd'] == $akd[$i]) {
                                                                                                        $jum_tg++;
                                                                                                        $total_tg = $total_tg + $n['nilai'];                                                                                                       
                                                                                                        $kd = $n['nama_kd'];
                                                                                                        //$desckd[] = $n['nama_kd'];
                                                                                                        if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                                                                            $desckd[] = $n['nama_kd'];
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                    endforeach;
                                                                                    // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                                                                    $total_all_ph = ($total_ph != 0) ?  (string)round($total_ph / $jum_ph, 0, PHP_ROUND_HALF_UP) * 0.6: 0;
                                                                                    $total_all_tg = ($total_tg != 0) ?  (string)round($total_tg / $jum_tg, 0, PHP_ROUND_HALF_UP) * 0.4 : 0;
                                                                                    $total_all_n = $total_all_ph + $total_all_tg;
                                                                                    $total_all_n = ($total_all_n != 0) ?  (string)round($total_all_n, 0, PHP_ROUND_HALF_UP) : 0;
                                                                                    echo '<div>' .  $total_all_n . '</div>';
                                                                                } else {
                                                                                    echo $total_all_n = 0;
                                                                                }
                                                                                $total_nakd = $total_all_n;
                                                                                // $total_nakd = $total_all_n;
                                                                                // var_dump($nilai_rapor);
                                                                                // die;
                                                                                if ($total_all_n > 1) {
                                                                                    $total_na += (string)round($total_nakd, 0, PHP_ROUND_HALF_UP);
                                                                                }
                                                                            }
                                                                        }
                                                                        ?>
                                                                 </td>
                                                                 <td class="text-center">
                                                                     <?php if (!empty($total_all_n)) { ?>
                                                                         <?php $nilai_n =  (string)round($total_na / count($akd), 0, PHP_ROUND_HALF_UP);  ?>
                                                                         <?php echo '<div>' .  $nilai_n . '</div>'; ?>
                                                                     <?php
                                                                        } else {
                                                                            echo $total_all_n = 0;
                                                                        } ?>
                                                                 </td>
                                                                 <td class="text-center">
                                                                     <?php
                                                                        $nilai_pts = 0;
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                    if ($n['jenis'] == 'PTS') {
                                                                                        $nilai_pts = $n['nilai'];
                                                                                        echo ' <div>' . $nilai_pts . ' </div>';
                                                                                    }
                                                                                }
                                                                        endforeach;
                                                                        ?>
                                                                 </td>
                                                                 <td class="text-center">
                                                                     <?php
                                                                        $nilai_pas = 0;
                                                                        foreach ($nilai as $n) :
                                                                            if ($n['tasm'] == $tasm)
                                                                                if ($n['id_siswa'] == $s['id_siswa']) {
                                                                                    if ($n['jenis'] == 'PAS') {
                                                                                        $nilai_pas = $n['nilai'];
                                                                                        echo ' <div>' .  $nilai_pas . ' </div>';
                                                                                    }
                                                                                }
                                                                        endforeach;
                                                                        ?>
                                                                 </td>
                                                                 <td class="text-center">
                                                                     <?php if (!empty($total_all_n)) {
                                                                            $total_nph = round(((2 * $nilai_n) + (1 * $nilai_pts) + (1 * $nilai_pas)) / 4, 0, PHP_ROUND_HALF_UP);
                                                                            echo '<div>' .  $total_nph . '</div>';
                                                                        } else {
                                                                            echo $total_all_n = 0;
                                                                        } ?>
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
                                                                                        if ($k['ta'] == $tahun)                                          // echo $k['kkm'];
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