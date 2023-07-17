<!DOCTYPE html>
<html>

<head>
    <title><?= $siswa['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 10pt;
            width: 100%
        }

        .table {
            border-collapse: collapse;
            border: solid 2px #999;
            width: 100%
        }

        .table tr td,
        .table tr th {
            border: solid 1px #000;
            padding: 2px;
        }

        .table tr th {
            font-weight: bold;
            /* text-align: center */
        }

        .rgt {
            text-align: right;
        }

        .ctr_a {
            text-align: center;
            font-family: arial;
            font-size: 10pt;

        }

        .ctr_b {
            text-align: '';
            font-family: arial;
            font-size: 10pt;
        }

        .ctr {
            text-align: center;
            font-family: arial;
            font-size: 10pt;
        }


        .tbl {
            font-weight: bold
        }

        table tr td {
            vertical-align: middle
        }

        .font_kecil {
            font-size: 18px
        }

        .p {
            font-size: 10pt;
        }

        .d {
            color: white;
        }

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 9pt;
            /* text-align: center; */
            /* font-family: arial; */
        }

        .f {
            padding: 5px 10px;
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <br>
    <br>

    <div style="border: solid 1px #000; padding: 11px 11px; width: 100%">
        <table class="body">
            <thead></thead>
            <tr>
                <td>Nama Sekolah</td>
                <td>: <?= $sekolah['nama_sekolah'] ?></td>
                <td colspan="7"></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Kelas</td>
                <td>: <?= $kelas['rombel'] ?>
                <td></td>
            </tr>
            <tr>
                <td>Alamat Sekolah</td>
                <td>: <?= $sekolah['alamat'] ?>
                <td colspan="7"></td>
                <td></td>
                <td></td>
                <td></td>
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
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td>: <?= $siswa['nama'] ?></td>
                <td colspan="7"></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Tahun Pelajaran</td>
                <td>: <?= $tahun['th_pelajaran'] ?></td>
            </tr>
            <tr>
                <td>NIS / NISN</td>
                <td>: <?= $siswa['nis'] ?>/<?= $siswa['nisn'] ?></td>
                <td colspan="7"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <br />

    <table class="table">
        <tbody>
            <!--nilai -->
            <tr>
                <td colspan="8">KKM Satuan Pendidikan : <?= $kkm['kkm'] ?></td>
            </tr>
            <tr>
                <td rowspan="2" class="e">NO</td>
                <td rowspan="2" class="e">Muatan Pelajaran</td>
                <td colspan="2" class="e">Semester 1</td>
                <td colspan="2" class="e">Semester 2</td>
                <td colspan="2" class="e">Rerata</td>
            </tr>
            <tr>
                <td class="e">Pengetahuan</td>
                <td class="e">Keterampilan</td>
                <td class="e">Pengetahuan</td>
                <td class="e">Keterampilan</td>
                <td class="e">Pengetahuan</td>
                <td class="e">Keterampilan</td>
            </tr>
            <tr>
                <td colspan="8">Kelompok (Umum)</td>
            </tr>
            <!-- semester 1 -->
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'A' | $m['kelompok'] == 'B') {
            ?>
                    <tr>
                        <td class="ctr"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <?php
                        $total_all_p = 0;
                        $total_na = 0;
                        $total_all_n = 0;
                        $total_all_pts = 0;
                        $total_all_pas = 0;
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_p as $n) :
                            if (substr($n['tasm'], 4) == 1)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td class="ctr">
                            <?php
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $total_n = 0;
                                $jum_n = 0;
                                $total_t = 0;
                                $jum_t = 0;
                                $total_p = 0;
                                $jum_p = 0;
                                if (!empty($nilai_p)) {
                                    foreach ($nilai_p as $n) :
                                        if (substr($n['tasm'], 4) == 1)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_n++;
                                                        $total_n = $total_n + $n['nilai'];
                                                    }
                                                }
                                            }
                                    endforeach;
                                    $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                } else {
                                    // echo $total_all_n = 0;
                                }
                                if (!empty($nilai_pts)) {
                                    foreach ($nilai_pts as $n) :
                                        if (substr($n['tasm'], 4) == 1)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_t++;
                                                    $total_t =  $total_t + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pts = 0;
                                }
                                if (!empty($nilai_pas)) {
                                    foreach ($nilai_pas as $n) :
                                        if (substr($n['tasm'], 4) == 1)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_p++;
                                                    $total_p =  $total_p + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pas = ($total_p != 0) ? (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pas = 0;
                                }

                                $total_na = $total_all_n +  $total_all_pts + $total_all_pas;

                                if ($total_all_pts > 1) {
                                    // echo '<div>' . (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
                                } else {
                                    // echo '<div>' . (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
                                }
                            }
                            ?>
                            <?php if (!empty($total_all_p)) { ?>
                                <?php $total_peng_1 =  round($total_all_p / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .  $total_peng_1 . '</div>'; ?>

                            <?php
                            } else {
                                echo 0;
                            } ?>
                        </td>
                        <?php
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_k as $n) :
                            if (substr($n['tasm'], 4) == 1)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td class="ctr">
                            <?php
                            $maxall = [];
                            $jum_n = 0;
                            $total_all_k = 0;
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $maxprk = [];
                                $maxprj = [];
                                $maxprd = [];
                                $maxprt = [];
                                $nilai_tinggi = 0;
                                $num = 0;
                                foreach ($nilai_k as $n) :
                                    if (substr($n['tasm'], 4) == 1)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $akd[$i]) {
                                            if (substr($n['jenis'], 0, 6) == 'Produk') {
                                                $maxprd[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 7) == 'Praktik') {
                                                $maxprk[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 6) == 'Projek') {
                                                $maxprj[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 10) == 'Portofolio') {
                                                $maxprt[] = round($n['nilai']);
                                            }
                                        }

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
                                $total_all_k = $total_all_k + $nilai_tinggi;
                                // echo '<div>' .  $nilai_tinggi  . '</div>';
                            }
                            ?>
                            <?php if (!empty($total_all_k)) { ?>
                                <?php $total_ket_1 = round($total_all_k / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .   $total_ket_1  . '</div>'; ?>
                            <?php
                            } else {
                                echo  0;
                            } ?>
                        </td>
                        <!-- end semester 1 -->
                        <!-- semester 2 -->
                        <?php
                        $total_all_p = 0;
                        $total_na = 0;
                        $total_all_n = 0;
                        $total_all_pts = 0;
                        $total_all_pas = 0;
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_p as $n) :
                            if (substr($n['tasm'], 4) == 2)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td class="ctr">
                            <?php
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $total_n = 0;
                                $jum_n = 0;
                                $total_t = 0;
                                $jum_t = 0;
                                $total_p = 0;
                                $jum_p = 0;
                                if (!empty($nilai_p)) {
                                    foreach ($nilai_p as $n) :
                                        if (substr($n['tasm'], 4) == 2)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_n++;
                                                        $total_n = $total_n + $n['nilai'];
                                                    }
                                                }
                                            }
                                    endforeach;
                                    // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                    $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2 : 0;
                                } else {
                                    // echo $total_all_n = 0;
                                }
                                if (!empty($nilai_pts)) {
                                    foreach ($nilai_pts as $n) :
                                        if (substr($n['tasm'], 4) == 2)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_t++;
                                                    $total_t =  $total_t + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pts = 0;
                                }
                                if (!empty($nilai_pas)) {
                                    foreach ($nilai_pas as $n) :
                                        if (substr($n['tasm'], 4) == 2)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_p++;
                                                    $total_p =  $total_p + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pas = ($total_p != 0) ? (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pas = 0;
                                }

                                $total_na = $total_all_n +  $total_all_pts + $total_all_pas;

                                if ($total_all_pts > 1) {
                                    // echo '<div>' . (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
                                } else {
                                    // echo '<div>' . (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
                                }
                            }
                            ?>
                            <?php if (!empty($total_all_p)) { ?>
                                <?php
                                //  $total_peng_2 =  round($total_all_p / count($akd), 0, PHP_ROUND_HALF_UP);
                                $total_peng_2  = ($total_all_p != 0) ?  round($total_all_p / count($akd), 0, PHP_ROUND_HALF_UP) * 1 : 0; ?>
                                <?php echo '<div>' .  $total_peng_2 . '</div>'; ?>

                            <?php
                            } else {
                                echo 0;
                            } ?>
                        </td>
                        <?php
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_k as $n) :
                            if (substr($n['tasm'], 4) == 2)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td class="ctr">
                            <?php
                            $maxall = [];
                            $jum_n = 0;
                            $total_all_k = 0;
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $maxprk = [];
                                $maxprj = [];
                                $maxprd = [];
                                $maxprt = [];
                                $nilai_tinggi = 0;
                                $num = 0;
                                foreach ($nilai_k as $n) :
                                    if (substr($n['tasm'], 4) == 2)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $akd[$i]) {
                                            if (substr($n['jenis'], 0, 6) == 'Produk') {
                                                $maxprd[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 7) == 'Praktik') {
                                                $maxprk[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 6) == 'Projek') {
                                                $maxprj[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 10) == 'Portofolio') {
                                                $maxprt[] = round($n['nilai']);
                                            }
                                        }

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
                                $total_all_k = $total_all_k + $nilai_tinggi;
                                // echo '<div>' .  $nilai_tinggi  . '</div>';
                            }
                            ?>
                            <?php if (!empty($total_all_k)) { ?>
                                <?php
                                //  $total_ket_2 = round($total_all_k / count($akd), 0, PHP_ROUND_HALF_UP);
                                $total_ket_2   = ($total_all_k  != 0) ?  round($total_all_k / count($akd), 0, PHP_ROUND_HALF_UP) * 1 : 0; ?>
                                <?php echo '<div>' .  $total_ket_2  . '</div>'; ?>
                            <?php
                            } else {
                                echo  0;
                            } ?>
                        </td>
                        <!-- end semester 2 -->
                        <td class="ctr">
                            <?php if (!empty($total_peng_2)) { ?>
                                <?php
                                $p1 = 0;
                                $p2 = 0;
                                if (!empty($total_peng_1)) $p1 = $total_peng_1;
                                if (!empty($total_peng_2)) $p2 = $total_peng_2;
                                $na_p = (string)round(($p1 + $p2) / 2, 0, PHP_ROUND_HALF_UP);
                                ?>
                                <?php echo $na_p; ?>
                            <?php
                            } else {
                                echo 0;
                            } ?>
                        </td>
                        <td class="ctr">
                            <?php if (!empty($total_ket_2)) { ?>
                                <?php
                                $k1 = 0;
                                $k2 = 0;
                                if (!empty($total_ket_1)) $k1 = $total_ket_1;
                                if (!empty($total_ket_2)) $k2 = $total_ket_2;
                                $na_k = (string)round(($k1 + $k2) / 2, 0, PHP_ROUND_HALF_UP);
                                ?>
                                <?php echo $na_k; ?>
                            <?php
                            } else {
                                echo 0;
                            } ?>
                        </td>
                    </tr>
                    <?php $no++ ?>
            <?php  }
            endforeach ?>
            <tr>
                <td colspan="8">Kelompok (Muatan Lokal)</td>
            </tr>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'C') {
            ?>
                    <tr>
                        <td class="ctr"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <!-- semester 1 -->
                        <?php
                        $total_all_p = 0;
                        $total_na = 0;
                        $total_all_n = 0;
                        $total_all_pts = 0;
                        $total_all_pas = 0;
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_p as $n) :
                            if (substr($n['tasm'], 4) == 1)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td class="ctr">
                            <?php
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $total_n = 0;
                                $jum_n = 0;
                                $total_t = 0;
                                $jum_t = 0;
                                $total_p = 0;
                                $jum_p = 0;
                                if (!empty($nilai_p)) {
                                    foreach ($nilai_p as $n) :
                                        if (substr($n['tasm'], 4) == 1)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_n++;
                                                        $total_n = $total_n + $n['nilai'];
                                                    }
                                                }
                                            }
                                    endforeach;
                                    // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                    $total_all_n = ($total_n != 0) ? (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2 : 0;
                                } else {
                                    // echo $total_all_n = 0;
                                }
                                if (!empty($nilai_pts)) {
                                    foreach ($nilai_pts as $n) :
                                        if (substr($n['tasm'], 4) == 1)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_t++;
                                                    $total_t =  $total_t + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pts = 0;
                                }
                                if (!empty($nilai_pas)) {
                                    foreach ($nilai_pas as $n) :
                                        if (substr($n['tasm'], 4) == 1)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_p++;
                                                    $total_p =  $total_p + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pas = ($total_p != 0) ? (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pas = 0;
                                }

                                $total_na = $total_all_n +  $total_all_pts + $total_all_pas;

                                if ($total_all_pts > 1) {
                                    // echo '<div>' . (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
                                } else {
                                    // echo '<div>' . (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
                                }
                            }
                            ?>
                            <?php if (!empty($total_all_p)) { ?>
                                <?php $total_peng_1 =  round($total_all_p / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .  $total_peng_1 . '</div>'; ?>

                            <?php
                            } else {
                                echo 0;
                            } ?>
                        </td>
                        <?php
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_k as $n) :
                            if (substr($n['tasm'], 4) == 1)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td class="ctr">
                            <?php
                            $maxall = [];
                            $jum_n = 0;
                            $total_all_k = 0;
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $maxprk = [];
                                $maxprj = [];
                                $maxprd = [];
                                $maxprt = [];
                                $nilai_tinggi = 0;
                                $num = 0;
                                foreach ($nilai_k as $n) :
                                    if (substr($n['tasm'], 4) == 1)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $akd[$i]) {
                                            if (substr($n['jenis'], 0, 6) == 'Produk') {
                                                $maxprd[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 7) == 'Praktik') {
                                                $maxprk[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 6) == 'Projek') {
                                                $maxprj[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 10) == 'Portofolio') {
                                                $maxprt[] = round($n['nilai']);
                                            }
                                        }

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
                                $total_all_k = $total_all_k + $nilai_tinggi;
                                // echo '<div>' .  $nilai_tinggi  . '</div>';
                            }
                            ?>
                            <?php if (!empty($total_all_k)) { ?>
                                <?php $total_ket_1 = round($total_all_k / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .   $total_ket_1  . '</div>'; ?>
                            <?php
                            } else {
                                echo 0;
                            } ?>
                        </td>
                        <!-- end semester 1 -->
                        <!-- semester 2 -->
                        <?php
                        $total_all_p = 0;
                        $total_na = 0;
                        $total_all_n = 0;
                        $total_all_pts = 0;
                        $total_all_pas = 0;
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_p as $n) :
                            if (substr($n['tasm'], 4) == 2)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td class="ctr">
                            <?php
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $total_n = 0;
                                $jum_n = 0;
                                $total_t = 0;
                                $jum_t = 0;
                                $total_p = 0;
                                $jum_p = 0;
                                if (!empty($nilai_p)) {
                                    foreach ($nilai_p as $n) :
                                        if (substr($n['tasm'], 4) == 2)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if (substr($n['jenis'], 0, 2) == 'PH') {
                                                    if ($n['no_kd'] == $akd[$i]) {
                                                        $jum_n++;
                                                        $total_n = $total_n + $n['nilai'];
                                                    }
                                                }
                                            }
                                    endforeach;
                                    $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                } else {
                                    // echo $total_all_n = 0;
                                }
                                if (!empty($nilai_pts)) {
                                    foreach ($nilai_pts as $n) :
                                        if (substr($n['tasm'], 4) == 2)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_t++;
                                                    $total_t =  $total_t + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pts = ($total_t != 0) ? (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pts = (string)round($total_t / $jum_t, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pts = 0;
                                }
                                if (!empty($nilai_pas)) {
                                    foreach ($nilai_pas as $n) :
                                        if (substr($n['tasm'], 4) == 2)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_p++;
                                                    $total_p =  $total_p + $n['nilai'];
                                                }
                                            }
                                    endforeach;
                                    $total_all_pas = ($total_p != 0) ? (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                    // $total_all_pas = (string)round($total_p / $jum_p, 0, PHP_ROUND_HALF_UP) * 1;
                                } else {
                                    // echo $total_all_pas = 0;
                                }

                                $total_na = $total_all_n +  $total_all_pts + $total_all_pas;

                                if ($total_all_pts > 1) {
                                    // echo '<div>' . (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 4, 0, PHP_ROUND_HALF_UP);
                                } else {
                                    // echo '<div>' . (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $total_all_p += (string)round($total_na / 3, 0, PHP_ROUND_HALF_UP);
                                }
                            }
                            ?>
                            <?php if (!empty($total_all_p)) { ?>
                                <?php $total_peng =  round($total_all_p / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .  $total_peng_2 . '</div>'; ?>

                            <?php
                            } else {
                                echo  0;
                            } ?>
                        </td>
                        <?php
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_k as $n) :
                            if (substr($n['tasm'], 4) == 2)
                                if ($n['id_mapel'] == $m['id_mapel']) {
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
                        <td class="ctr">
                            <?php
                            $maxall = [];
                            $jum_n = 0;
                            $total_all_k = 0;
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $maxprk = [];
                                $maxprj = [];
                                $maxprd = [];
                                $maxprt = [];
                                $nilai_tinggi = 0;
                                $num = 0;
                                foreach ($nilai_k as $n) :
                                    if (substr($n['tasm'], 4) == 2)
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $akd[$i]) {
                                            if (substr($n['jenis'], 0, 6) == 'Produk') {
                                                $maxprd[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 7) == 'Praktik') {
                                                $maxprk[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 6) == 'Projek') {
                                                $maxprj[] = round($n['nilai']);
                                            } else if (substr($n['jenis'], 0, 10) == 'Portofolio') {
                                                $maxprt[] = round($n['nilai']);
                                            }
                                        }

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
                                $total_all_k = $total_all_k + $nilai_tinggi;
                                // echo '<div>' .  $nilai_tinggi  . '</div>';
                            }
                            ?>
                            <?php if (!empty($total_all_k)) { ?>
                                <?php $total_ket_2 = round($total_all_k / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .   $total_ket_2  . '</div>'; ?>
                            <?php
                            } else {
                                echo 0;
                            } ?>
                        </td>
                        <!-- end semester 2 -->
                        <td class="ctr">
                            <?php if (!empty($total_peng_2)) { ?>
                                <?php
                                $p1 = 0;
                                $p2 = 0;
                                if (!empty($total_peng_1)) $p1 = $total_peng_1;
                                if (!empty($total_peng_2)) $p2 = $total_peng_2;
                                $na_p = (string)round(($p1 + $p2) / 2, 0, PHP_ROUND_HALF_UP);
                                echo $na_p; ?>
                            <?php
                            } else {
                                echo 0;
                            } ?>
                        </td>
                        <td class="ctr">
                            <?php if (!empty($total_ket_2)) { ?>
                                <?php
                                $k1 = 0;
                                $k2 = 0;
                                if (!empty($total_ket_1)) $k1 = $total_ket_1;
                                if (!empty($total_ket_2)) $k2 = $total_ket_2;
                                $na_k = (string)round(($k1 + $k2) / 2, 0, PHP_ROUND_HALF_UP);
                                echo $na_k; ?>
                            <?php
                            } else {
                                echo  0;
                            } ?>
                        </td>
                    </tr>
                    <?php $no++ ?>
            <?php  }
            endforeach ?>

            <!-- end nilai -->
        </tbody>
    </table>

    <div style="border: solid 1px #000; padding: 11px 11px; width: 100%">
        <table class="body">
            <tr>
                <td>Keterangan : </td>
                <td> Jika Terdapat 3 matapelajaran tidak tuntas, sehingga peserta didik tersebut <br>
                    TIDAK NAIK KELAS
                </td>
            </tr>
        </table>
    </div>

    <table class="table">
        <tr>
            <td class="e" colspan="4">Tabel Interval Predikat.</td>
        </tr>
        <tr>
            <td class="e">D</td>
            <td class="e">C</td>
            <td class="e">B</td>
            <td class="e">A</td>
        </tr>
        <tr>
            <td class="ctr">
                <?php if (!empty($kkm)) {
                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                    echo $kkm['kkm'];
                ?>
                <?php
                } else {
                    echo 0;
                } ?>
            </td>
            <td class="ctr">
                <?php if (!empty($kkm)) {
                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                    $C = $kkm['kkm'];
                    $B = $C + $in_kkm;
                    // echo $in_kkm;
                    echo $C . ' < N < ' . $B;
                ?>
                <?php
                } else {
                    echo 0;
                } ?>
            </td>
            <td class="ctr">
                <?php if (!empty($kkm)) {
                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                    $C = $kkm['kkm'];
                    $B = $C + $in_kkm;
                    $A = $B + $in_kkm;
                    echo $B . ' < N < ' . $A;
                ?>
                <?php
                } else {
                    echo 0;
                } ?>
            </td>
            <td class="ctr">
                <?php if (!empty($kkm)) {
                    $in_kkm = (string)round((100 - $kkm['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                    $C = $kkm['kkm'];
                    $B = $C + $in_kkm;
                    $A = $B + $in_kkm;
                    // echo $in_kkm;
                    echo $A . ' < N < ' . '100';
                ?>
                <?php
                } else {
                    echo 0;
                } ?>
            </td>
        </tr>
    </table>

    <br />
    <br />

    <table>
        <thead> </thead>
        <tbody>
            <tr>
                <td width="7%"></td>
                <td width="50%">
                    Mengetahui : <br>
                    Orang Tua/Wali, <br>
                    <br><br><br><br>
                    <u>...........................................</u>
                </td>
                <td width="2%"></td>
                <td width="20%">
                </td>
                <td width="5%"></td>
                <td width="60%">
                    <?= $footer_1['kota'] ?>, <span><?php echo format_indo(date($tahun['tgl_raport'])); ?></span><br>
                    Guru Kelas, <br>
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
                <td width="5%"></td>
                <td width="25%"></td>
                <td width="50%" align="center">
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

</body>

</html>