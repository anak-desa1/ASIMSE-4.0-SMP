<!DOCTYPE html>
<html>

<head>
    <title><?= $header['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 10.1pt;
            width: 100%
        }

        .table {
            border-collapse: collapse;
            /* border: solid 2px #999; */
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

        .ctr {
            /* text-align: justify; */
            /* text-align: right; */
            text-align: center;
            font-family: arial;
            font-size: 10.1pt;
            /* width: 50% */
        }

        .ctr_des {
            text-align: justify;
            /* text-align: right; */
            /* text-align: center; */
            font-family: arial;
            font-size: 10.1pt;
            width: 55%;
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
            /* text-align: center; */
            font-size: 10pt;
        }

        .ki {
            text-align: center;
            font-size: 10pt;
        }

        .d {
            color: white;
        }

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 10.1pt;
        }

        .f {
            padding: 5px 10.1px;
            border: 1px solid black;
        }

        .nilai {
            text-align: center;
            font-family: arial;
            font-size: 10.1pt;
            width: 7%
        }
    </style>
</head>

<body>
    <!-- KETERAMPILAN -->
    <table class="table">
        <tbody>
            <!--nilai -->
            <tr>
                <td rowspan="2" class="e">NO</td>
                <td rowspan="2" class="e">Muatan Pelajaran</td>
                <td colspan="4" class="e">Keterampilan</td>
            </tr>
            <tr>
                <td class="e">KKM</td>
                <td class="e">Nilai</td>
                <td class="e">Predikat</td>
                <td class="e">Deskripsi</td>
            </tr>
            <tr>
                <td colspan="6">Kelompok (B)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'B') {
            ?>
                  <tr>
                        <td width="5%" class="ctr"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <td width="5%" class="nilai">
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
                        <?php
                        $akd = array();
                        $all_kd = "";
                        $jum_kd = 0;
                        foreach ($nilai_k as $n) :
                            if ($n['tasm'] == $tasm)
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
                        <td class="nilai">
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
                                    if ($n['tasm'] == $tasm)
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

                                // $nilai_tinggi = round($nilai_tinggi / $num, 0, PHP_ROUND_HALF_UP);
                                $nilai_tinggi = ($nilai_tinggi != 0) ? round($nilai_tinggi / $num, 0, PHP_ROUND_HALF_UP) : 0;
                                $total_all_k = $total_all_k + $nilai_tinggi;
                                // echo '<div>' .  $nilai_tinggi  . '</div>';
                            }
                            ?>
                            <?php if (!empty($total_all_k)) { ?>
                                <?php $total_ket = round($total_all_k / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                                <?php echo '<div>' .   $total_ket  . '</div>'; ?>
                            <?php
                            } else {
                                echo  $total_ket = 0;
                            } ?>
                        </td>
                        <td class="nilai">
                            <?php if (!empty($total_ket)) {
                                foreach ($kkm as $k) :
                                    if ($k['id_mapel'] == $m['id_mapel'])
                                        if ($k['kelas'] == $m['id_kelas']) {
                                            $in_kkm = (string)round((100 - $k['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                            $C = $k['kkm'];
                                            $B = $C + $in_kkm;
                                            $A = $B + $in_kkm;
                                        }
                                endforeach
                            ?>
                                <?php if ($total_ket >= $A) {
                                    echo "A";
                                } elseif ($total_ket >= $B) {
                                    echo "B";
                                } elseif ($total_ket >= $C) {
                                    echo "C";
                                } elseif ($total_ket <= $C) {
                                    echo "D";
                                } else {
                                    echo "Jangan menyerah, anda pasti bisa!  ";
                                } ?>
                            <?php
                            } else {
                                // echo $total_ket = 0;
                            } ?>
                        </td>
                        <td class="ctr_des">
                        <?php if (!empty($total_all_k)) {
                            $in_kkm = (string)round((100 - $m['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                            $C = $m['kkm'];
                            $B = $C + $in_kkm;
                            $A = $B + $in_kkm;
                            $maxmin = [];
                            $desckd = [];
                            for ($i = 0; $i < $jum_kd; $i++) {
                                $total = 0;
                                $jum_n = 0;
                                foreach ($nilai_k as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_siswa'] == $m['id_siswa']) {
                                            if ($n['no_kd'] == $akd[$i]) {
                                                $jum_n++;
                                                $total = $total + $n['nilai'];
                                                if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                    // $desckd[] = $n['nama_kd'];
                                                    $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr('<p class="alert alert-danger" role="alert">' . $n['nama_kd'] . '<p>', 0, 115) . " ..." : $n['nama_kd']);
                                                }
                                            }
                                        }
                                endforeach;
                                $total_all_k += round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                // echo '<div>' . $akd[$i] . ': ' . (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP) . '</div>';
                                $maxmin[] = round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                            }
                            if ($total_ket >= $A) {
                                if (min($maxmin) >= $A) {
                                    // echo "A";
                                    // echo $total_all_n;
                                    echo "<div> Memiliki penguasaan keterampilan sangat baik dalam 
                                                    " . $desckd[array_search(max($maxmin), $maxmin)] . "</div>";
                                } else {
                                    echo "<div> Memiliki penguasaan keterampilan sangat baik dalam  
                                    " . $desckd[array_search(max($maxmin), $maxmin)] . "
                                    , namun masih perlu peningkatan dalam hal
                                    " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
                                }
                            } elseif ($total_ket >= $B) {
                                // echo "B";
                                echo "<div> Memiliki penguasaan keterampilan baik dalam  
                                                " . $desckd[array_search(max($maxmin), $maxmin)] . "
                                                , namun masih perlu peningkatan dalam hal
                                                " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
                            } elseif ($total_ket >= $C) {
                                // echo "C";
                                echo "<div> Memiliki penguasaan keterampilan cukup dalam  
                                                " . $desckd[array_search(max($maxmin), $maxmin)] . "
                                                , namun masih perlu peningkatan dalam hal
                                                " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
                            } elseif ($total_ket <= $C) {
                                // echo "D";
                                echo "<div> Memiliki penguasaan keterampilan mulai berkembang dalam  
                                                " . $desckd[array_search(max($maxmin), $maxmin)] . "
                                                , namun masih perlu peningkatan dalam hal
                                                " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
                            }
                            // echo "<div>Memiliki penguasaan keterampilan baik, dalam " . $desckd[array_search(max($maxmin), $maxmin)] . ", namun masih perlu peningkatan dalam hal  " . $desckd[array_search(min($maxmin), $maxmin)] . "</div>";
                        } else {
                            echo $total_all_k = 0;
                        }
                        ?>
                        </td>
                        <!-- end nilai pengetahuan -->
                    </tr>
                    <?php $no++ ?>
            <?php  }
            endforeach ?>

            <!-- end nilai -->
        </tbody>
    </table>
    <!-- END KETERAMPILAN -->
    <br>
    <table class="table">
        <tr>
            <td class="e" colspan="5"> <b>Tabel Interval Predikat.</b></td>
        </tr>
        <tr>
            <td class="e">KKM</td>
            <td class="e">D (kurang)</td>
            <td class="e">C (cukup baik) </td>
            <td class="e">B (baik)</td>
            <td class="e">A (sangat baik)</td>
        </tr>
        <?php
        $all_kkm = "";
        $all_kkm2 = "";
        $all_kkm3 = "";
        $all_kkm4 = "";
        $all_kkm5 = "";
        foreach ($mapel as $m) {
            if ($m['kelompok'] == 'A' || $m['kelompok'] == 'B') {
                foreach ($kkm as $k) {
                    if (strpos($all_kkm, $k['kkm']) === false || $all_kkm == "") {
                        if ($k['id_mapel'] == $m['id_mapel'] && $k['kelas'] == $m['id_kelas']) {
                            $all_kkm = $all_kkm . $k['kkm'];
        ?>
                            <tr>
                                <td class="nilai">
                                    <?php echo $k['kkm']; ?>
                                </td>
                                <td class="nilai">
                                    <?php
                                    $in_kkm = (string)round((100 - $k['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                    echo '< ',  $k['kkm'];
                                    ?>
                                </td>
                                <td class="nilai">
                                    <?php
                                    $in_kkm = (string)round((100 - $k['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                    $C = $k['kkm'];
                                    $B = $C + $in_kkm;
                                    $A = $B + $in_kkm;
                                    echo $C . ' &le; N &le; ' . ($B - 1);
                                    ?>
                                </td>
                                <td class="nilai">
                                    <?php
                                    $in_kkm = (string)round((100 - $k['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                    $C = $k['kkm'];
                                    $B = $C + $in_kkm;
                                    $A = $B + $in_kkm;
                                    echo $B . ' &le; N &le; ' . ($A - 1);
                                    ?>
                                </td>

                                <td class="nilai">
                                    <?php
                                    $in_kkm = (string)round((100 - $k['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                                    $C = $k['kkm'];
                                    $B = $C + $in_kkm;
                                    $A = $B + $in_kkm;
                                    echo $A . ' &le; N &le; ' . '100';
                                    ?>
                                </td>
                            </tr>
        <?php  }
                    }
                }
            }
        } ?>
    </table>
    <br>
    <div>
        <b>C. Ekstrakurikuler</b>
    </div>
    <table class="table" style="border: solid 1px #000; padding: 20px 11px; width: 110%">
        <tr>
            <td class="e">No.</td>
            <td class="e">Kegiatan Ekstrakurikuler</td>
            <td class="e">Keterangan</td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($ekskul as $ek) : { ?>
                <tr>
                    <td width="5%" class="ctr"> <?= $no ?>.</td>
                    <td class="ctr"><?= $ek['ekskul'] ?></td>
                    <td class="ctr"><?= $ek['desk'] ?></td>
                </tr>
                <?php $no++ ?>
        <?php }
        endforeach ?>
    </table>
    <br>
    <div>
        <b>D. Ketidakhadiran</b>
    </div>
    <table>
        <tr>
            <td class="f">Sakit</td>
            <td class="f">: <?= $absen_siswa['s']; ?> &nbsp; hari</td>
        </tr>
        <tr>
            <td class="f">Izin</td>
            <td class="f">: <?= $absen_siswa['i']; ?> &nbsp; hari</td>
        </tr>
        <tr>
            <td class="f">Tanpa Keterangan</td>
            <td class="f">: <?= $absen_siswa['a']; ?> &nbsp; hari</td>
        </tr>
    </table>
    <br>
    <div>
        <b>E. Prestasi</b>
    </div>
    <table class="table">
        <tr>
            <td class="e">No.</td>
            <td class="e">Jenis Prestasi</td>
            <td class="e">Keterangan</td>
        </tr>
        <?php $no = 1 ?>
        <?php foreach ($prestasi as $pre) : { ?>
                <tr>
                    <td width="5%" class="ctr"> <?= $no ?>.</td>
                    <td class="ctr"><?= $pre['jenis'] ?></td>
                    <td class="ctr"><?= $pre['keterangan'] ?></td>
                </tr>
                <?php $no++ ?>
        <?php }
        endforeach ?>
    </table>
</body>

</html>