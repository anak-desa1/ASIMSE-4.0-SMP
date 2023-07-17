 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <?php $this->load->view('layout/header-page') ?>

     <!-- Main content -->
     <section class="content">
         <div class="row">
             <div class="col-md-12">
                 <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                 <?= $this->session->flashdata('message'); ?>
                 <div class="tampil-modal"></div>
                 <div class="card-header p-2">
                     <a class="btn btn-danger mb-3" href="<?= site_url('akademik_walikelas/cetak_rapor_pts') ?>"><i class="fa fa-times-circle"></i> Keluar</a>
                 </div><!-- /.card-header -->
                 <div class="card-body">
                     <div class="tab-content">
                         <div class="active tab-pane" id="activity">
                             <!-- Table row -->
                             <div class="row">
                                 <div class="table-responsive">
                                     <table class="table table-striped table table-sm">
                                         <thead> </thead>
                                         <tbody>
                                             <tr>
                                                 <td></td>
                                                 <td colspan="1" style="text-align: center; font-weight: bold"><img src="<?= base_url(); ?>assets/dist/upload/logo/logo.png" alt="..." style="width:100%;max-width:100px"></td>
                                                 <td colspan="" style="text-align: center; font-weight: bold">
                                                     <p>
                                                     <h3>LAPORAN HASIL BELAJAR <br> PENILAIAN TENGAH SEMESTER (PTS) <br> YPK ORA et LABORA <h3>
                                                             </p>
                                                 </td>
                                                 <td></td>
                                                 <td></td>
                                                 <td></td>
                                             </tr>
                                             <tr>
                                                 <td>Nama Sekolah</td>
                                                 <td>: <?= $sekolah['nama_sekolah'] ?></td>
                                                 <td class="tbl"></td>
                                                 <td>Kelas</td>
                                                 <td>: <?= $header['rombel'] ?>
                                                 <td class="tbl"></td>
                                             </tr>
                                             <tr>
                                                 <td>Alamat Sekolah</td>
                                                 <td>: <?= $sekolah['alamat'] ?>
                                                 <td class="tbl"></td>
                                                 <td>Semester</td>
                                                 <td>: <?php
                                                        $semester = $tahun['semester'];
                                                        echo $semester;
                                                        if ($semester == 1) {
                                                            echo " / Ganjil";
                                                        } else {
                                                            echo " / Genap";
                                                        }
                                                        ?></td>
                                                 <td class="tbl"></td>
                                             </tr>
                                             <tr>
                                                 <td>Nama Siswa</td>
                                                 <td>: <?= $siswa['nama'] ?></td>
                                                 <td class="tbl"></td>
                                                 <td>Tahun Pelajaran</td>
                                                 <td>: <?= $tahun['th_pelajaran'] ?></td>
                                                 <td class="tbl"></td>
                                             </tr>
                                             <tr>
                                                 <td>NIS / NISN</td>
                                                 <td>: <?= $siswa['nis'] ?>/<?= $siswa['nisn'] ?></td>
                                                 <td class="tbl"></td>
                                                 <td colspan="3"></td>
                                             </tr>
                                         </tbody>
                                     </table>
                                     <div>
                                         <br>
                                         <b>SIKAP</b><br>
                                         <b>1. Sikap Spiritual</b>
                                     </div>
                                     <table class="table">
                                         <tr>
                                             <th>Predikat</th>
                                             <th colspan="3" width="60%" class="e"> Deskripsi</th>
                                         </tr>
                                         <tr>
                                             <?php foreach ($selalu_sp as $sp) : ?>
                                                 <td colspan="2" class="p"><b><?= $sp['predikat'] ?></b></td>
                                                 <td>
                                                     <?php
                                                        $sp_selalu = explode(",", $sp['selalu']);
                                                        $text_sp_selalu = array();
                                                        for ($i = 0; $i < sizeof($sp_selalu); $i++) {
                                                            $idx = $sp_selalu[$i];

                                                            $text_sp_selalu[] = $list_kd_sp[$idx];
                                                        }
                                                        $sp_text_selalu = implode(", ", $text_sp_selalu);
                                                        ?>
                                                     <p style="font-size:14px">
                                                         <i><b> Selalu Bersyukur</b>, selalu <?= $sp_text_selalu  ?> dan
                                                         <?php endforeach ?>
                                                         <?php foreach ($mulai_meningkat_sp as $m) : ?>
                                                             <?= $m['nama_kd'] ?> <b>;</b> <b> ketaatan beribadah sudah berkembang</b>.
                                                         </i>
                                                     </p>
                                                 <?php endforeach ?>

                                                 </td>
                                         </tr>
                                     </table>
                                     <div>
                                         <b>2. Sikap Sosial</b>
                                     </div>
                                     <table class="table">
                                         <tr>
                                             <th>Predikat</th>
                                             <th colspan="3" width="60%" class="e"> Deskripsi</th>
                                         </tr>
                                         <tr>
                                             <?php foreach ($selalu_so as $so) : ?>
                                                 <td colspan="2" class="p"><b><?= $so['predikat'] ?></b></td>
                                                 <td>
                                                     <?php
                                                        $pc_selalu = explode(",", $so['selalu']);
                                                        $teks_selalu = array();
                                                        for ($i = 0; $i < sizeof($pc_selalu); $i++) {
                                                            $idx = $pc_selalu[$i];

                                                            $teks_selalu[] = $list_kd_so[$idx];
                                                        }

                                                        $text_selalu = implode(", ", $teks_selalu); ?>
                                                     <p style="font-size:14px">
                                                         <i><b><?= $so['predikat'] ?></b> dalam <?= $text_selalu ?>
                                                         <?php endforeach ?>
                                                         <?php foreach ($mulai_meningkat_so as $m) : ?>
                                                             dan <?= $m['nama_kd'] ?> <b>mulai meningkat</b>.
                                                         </i>
                                                     </p>
                                                 <?php endforeach ?>

                                                 </td>
                                         </tr>
                                     </table>
                                     <div>
                                         <br>
                                         <b>PENGETAHUAN DAN KETERAMPILAN</b>
                                     </div>
                                     <table class="table table-striped table table-sm" border="1">
                                         <thead> </thead>
                                         <tbody>
                                             <!--nilai -->
                                             <?php foreach ($mapel as $m) : ?>
                                             <?php endforeach ?>
                                             <tr>
                                                 <td rowspan="2" colspan="3" class="text-center align-middle" width="10%"><b>MATA PELAJARAN</b></td>
                                                 <td colspan="5" class="text-center align-middle" width="10%"><b>KI-3 PENGETAHUAN</b></td>
                                                 <td rowspan="2" colspan="8" class="text-center align-middle" width="5%"><b>KI-4 KETERAMPILAN</b></td>
                                             </tr>
                                             <tr>
                                                 <?php if (!empty($nilai_p)) { ?>
                                                     <?php foreach ($nilai_p as $p) : ?>
                                                     <?php endforeach ?>
                                                     <?php if ($ta == 1) { ?>
                                                         <td colspan="2" class="text-center">Tes_Tertulis</td>
                                                         <td colspan="2" class="text-center">Penugasan</td>
                                                         <td colspan="" class="text-center align-middle" width="3%"><b>PTS</b></td>
                                                     <?php } ?>
                                                     <?php if ($ta == 2) { ?>
                                                         <td colspan="2" class="text-center">Tes_Tertulis</td>
                                                         <td colspan="2" class="text-center">Penugasan</td>
                                                         <td colspan="" class="text-center align-middle" width="3%"><b>PTS</b></td>
                                                     <?php } ?>

                                             </tr>
                                             <tr>
                                                 <td class="text-center align-middle">NO</td>
                                                 <td class="text-center align-middle">Nama Mata Pelajaran</td>
                                                 <td class="text-center align-middle">KKM</td>
                                                 <?php if ($ta == 1) { ?>
                                                     <td class="text-center align-middle">KD</td>
                                                     <td class="text-center align-middle">PH</td>
                                                     <td class="text-center align-middle">KD</td>
                                                     <td class="text-center align-middle">TG</td>
                                                     <td class="text-center align-middle">PTS</td>
                                                 <?php } ?>
                                                 <?php if ($ta == 2) { ?>
                                                     <td class="text-center align-middle">KD</td>
                                                     <td class="text-center align-middle">PH</td>
                                                     <td class="text-center align-middle">KD</td>
                                                     <td class="text-center align-middle">TG</td>
                                                     <td class="text-center align-middle">PTS</td>
                                                 <?php } ?>
                                             <?php } ?>
                                             <td class="text-center align-middle">KD</td>
                                             <td class="text-center align-middle">Praktik</td>
                                             <td class="text-center align-middle">KD</td>
                                             <td class="text-center align-middle">Produk</td>
                                             <td class="text-center align-middle">KD</td>
                                             <td class="text-center align-middle">Projek</td>
                                             <td class="text-center align-middle">KD</td>
                                             <td class="text-center align-middle">Portofolio</td>
                                             </tr>
                                             <tr>
                                                 <td colspan="21">Kelompok (A)</td>
                                             </tr>
                                             <?php $no = 1; ?>
                                             <?php foreach ($mapel as $m) :
                                                    if ($m['kelompok'] == 'A') {
                                                ?>
                                                     <tr>
                                                         <td width=" 5%" class="text-center align-middle"><?= $no; ?></td>
                                                         <td width="45%" class="align-middle"> <?= $m['nama']; ?> </td>
                                                         <td width="7%" class="text-center align-middle">
                                                             <!-- <?= $m['kkm']; ?> -->
                                                             <?php
                                                                foreach ($kkm as $k) :
                                                                    if ($k['id_mapel'] == $m['id_mapel'])
                                                                        if ($k['kelas'] == $m['id_kelas']) 
                                                                            if ($k['ta'] == $tah) {
                                                                            echo $k['kkm'];
                                                                        }
                                                                endforeach
                                                                ?>
                                                         </td>
                                                         <!--nilai pengetahuan -->
                                                         <?php if ($ta == 1) { ?>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                    echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                    echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <!-- nilai PTS -->
                                                             <td class="text-center">
                                                                 <?php
                                                                    $nilai_npts = 0;
                                                                    foreach ($nilai_pts as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if ($n['jenis'] == 'PTS') {
                                                                                    $nilai_npts = $n['nilai'];
                                                                                    echo ' <div>' . $nilai_npts . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                         <?php } ?>
                                                         <?php if ($ta == 2) { ?>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                    echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                    echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <!-- nilai PTS -->
                                                             <td class="text-center">
                                                                 <?php
                                                                    $nilai_npts = 0;
                                                                    foreach ($nilai_pts as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if ($n['jenis'] == 'PTS') {
                                                                                    $nilai_npts = $n['nilai'];
                                                                                    echo ' <div>' . $nilai_npts . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                         <?php } ?>
                                                         <!-- end nilai PTS -->
                                                         <!-- end nilai pengetahuan -->
                                                         <!-- nilai keterampilan -->
                                                         <!-- Praktik -->
                                                         <td class="text-center">
                                                             <?php
                                                                $kdprd = [];
                                                                foreach ($nilai_k as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_mapel'] == $m['id_mapel']) { ?>
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
                                                                for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                    $max = [];
                                                                    $maxall = [];
                                                                    foreach ($nilai_k as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
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
                                                         <td class="text-center">
                                                             <?php
                                                                $kdprd = [];
                                                                foreach ($nilai_k as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_mapel'] == $m['id_mapel']) { ?>
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
                                                                for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                    $max = [];
                                                                    $maxall = [];
                                                                    foreach ($nilai_k as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
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
                                                         <!-- Produk -->
                                                         <!-- Projek -->
                                                         <td class="text-center">
                                                             <?php
                                                                $kdprd = [];
                                                                foreach ($nilai_k as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_mapel'] == $m['id_mapel']) { ?>
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
                                                                for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                    $max = [];
                                                                    $maxall = [];
                                                                    foreach ($nilai_k as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
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
                                                         <!-- Projek -->
                                                         <!-- Portofolio -->
                                                         <td class="text-center">
                                                             <?php
                                                                $kdprd = [];
                                                                foreach ($nilai_k as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_mapel'] == $m['id_mapel']) { ?>
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
                                                                for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                    $max = [];
                                                                    $maxall = [];
                                                                    foreach ($nilai_k as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
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
                                                         <!-- Portofolio -->
                                                         <!-- end nilai keterampilan -->
                                                     </tr>
                                                     <?php $no++ ?>
                                             <?php }
                                                endforeach ?>
                                             <tr>
                                                 <td colspan="21">Kelompok (B)</td>
                                             </tr>
                                             <?php $no = 1; ?>
                                             <?php foreach ($mapel as $m) :
                                                    if ($m['kelompok'] == 'B') {
                                                ?>
                                                     <tr>
                                                         <td width=" 5%" class="text-center align-middle"><?= $no; ?></td>
                                                         <td width="45%" class="align-middle"> <?= $m['nama']; ?> </td>
                                                         <td width="7%" class="text-center align-middle"><?= $m['kkm']; ?></td>
                                                         <!--nilai pengetahuan -->
                                                         <?php if ($ta == 1) { ?>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                    echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                    echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <!-- nilai PTS -->
                                                             <td class="text-center">
                                                                 <?php
                                                                    $nilai_npts = 0;
                                                                    foreach ($nilai_pts as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if ($n['jenis'] == 'PTS') {
                                                                                    $nilai_npts = $n['nilai'];
                                                                                    echo ' <div>' . $nilai_npts . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                         <?php } ?>
                                                         <?php if ($ta == 2) { ?>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                    echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                    echo ' <div>' . $n['no_kd'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <td class="text-center">
                                                                 <?php
                                                                    foreach ($nilai_p as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if (substr($n['jenis'], 0, 2) == 'TG') {
                                                                                    echo ' <div>' . $n['nilai'] . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                             <!-- nilai PTS -->
                                                             <td class="text-center">
                                                                 <?php
                                                                    $nilai_npts = 0;
                                                                    foreach ($nilai_pts as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                                                if ($n['jenis'] == 'PTS') {
                                                                                    $nilai_npts = $n['nilai'];
                                                                                    echo ' <div>' . $nilai_npts . ' </div>';
                                                                                }
                                                                            }
                                                                    endforeach;
                                                                    ?>
                                                             </td>
                                                         <?php } ?>
                                                         <!-- end nilai PTS -->
                                                         <!-- end nilai pengetahuan -->
                                                         <!-- nilai keterampilan -->
                                                         <!-- Praktik -->
                                                         <td class="text-center">
                                                             <?php
                                                                $kdprd = [];
                                                                foreach ($nilai_k as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_mapel'] == $m['id_mapel']) { ?>
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
                                                                for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                    $max = [];
                                                                    $maxall = [];
                                                                    foreach ($nilai_k as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
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
                                                         <td class="text-center">
                                                             <?php
                                                                $kdprd = [];
                                                                foreach ($nilai_k as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_mapel'] == $m['id_mapel']) { ?>
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
                                                                for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                    $max = [];
                                                                    $maxall = [];
                                                                    foreach ($nilai_k as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
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
                                                         <!-- Produk -->
                                                         <!-- Projek -->
                                                         <td class="text-center">
                                                             <?php
                                                                $kdprd = [];
                                                                foreach ($nilai_k as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_mapel'] == $m['id_mapel']) { ?>
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
                                                                for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                    $max = [];
                                                                    $maxall = [];
                                                                    foreach ($nilai_k as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
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
                                                         <!-- Projek -->
                                                         <!-- Portofolio -->
                                                         <td class="text-center">
                                                             <?php
                                                                $kdprd = [];
                                                                foreach ($nilai_k as $n) :
                                                                    if ($n['tasm'] == $tasm)
                                                                        if ($n['id_mapel'] == $m['id_mapel']) { ?>
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
                                                                for ($kp = 0; $kp < count($kdprd); $kp++) {
                                                                    $max = [];
                                                                    $maxall = [];
                                                                    foreach ($nilai_k as $n) :
                                                                        if ($n['tasm'] == $tasm)
                                                                            if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $kdprd[$kp]) { ?>
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
                                                         <!-- Portofolio -->
                                                         <!-- end nilai keterampilan -->
                                                     </tr>
                                                     <?php $no++ ?>
                                             <?php }
                                                endforeach ?>
                                             <!-- end nilai -->
                                         </tbody>
                                     </table>
                                     <b>KETIDAKHADIRAN</b>
                                     <br>
                                     <table class="table" width="20%">
                                         <tr>
                                             <td width="10%">Sakit</td>
                                             <td width="20%" class="text-center align-middle"> <?= $absen_siswa['s']; ?> &nbsp; hari</td>
                                         </tr>
                                         <tr>
                                             <td>Izin</td>
                                             <td class="text-center align-middle"> <?= $absen_siswa['i']; ?> &nbsp; hari</td>
                                         </tr>
                                         <tr>
                                             <td>Tanpa Keterangan</td>
                                             <td class="text-center align-middle"> <?= $absen_siswa['a']; ?> &nbsp; hari</td>
                                         </tr>
                                     </table>
                                     <br>

                                     <b>CATATAN WALI KELAS</b>
                                     <br>
                                     <div style="border: solid 1px #000; padding: 20px 10px; width: 100%">
                                         <?= $catatan['catatan_wali'] ?>
                                     </div>
                                     <br>

                                     <b>TANGGAPAN ORANGTUA/WALI</b>
                                     <br>
                                     <div style="border: solid 1px #000; padding: 20px 10px; height: 80px; width: 100%">
                                     </div>
                                     <br />
                                     <table>
                                         <thead> </thead>
                                         <tbody>
                                             <tr>
                                                 <td width="2%"></td>
                                                 <td width="50%">
                                                     Mengetahui : <br>
                                                     Orang Tua/Wali, <br>
                                                     <br><br><br><br>
                                                     <u>...........................................</u>
                                                 </td>
                                                 <td width="0%"></td>
                                                 <td width="20%">
                                                 </td>
                                                 <td width="5%"></td>
                                                 <td width="60%">
                                                     <?= $footer_1['kota'] ?>, <span><?php echo format_indo(date($tahun['tgl_raport'])); ?></span><br>
                                                     Wali Kelas <br>
                                                     <br><br><br><br>
                                                     <u>
                                                         <p class="font-size: 50%;"><?= $footer_1['nama_lengkap'] ?></p>
                                                     </u>
                                                     <!-- NIP. -->
                                                 </td>
                                             </tr>
                                         </tbody>
                                     </table>
                                     <br />
                                     <table>
                                         <thead> </thead>
                                         <tbody>
                                             <tr>
                                                 <td width="0%"></td>
                                                 <td width="0%">
                                                 <td width="14%"></td>
                                                 <td width="60%" align="center">
                                                     Mengetahui : <br>
                                                     Kepala Sekolah <br>
                                                     <br><br><br><br>
                                                     <u><?= $tahun['nama_kepsek'] ?></u>
                                                 </td>
                                                 <td width="2%"></td>
                                                 <td width="36%">
                                             </tr>
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
         <!-- /.row -->
         <!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->