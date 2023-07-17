<!DOCTYPE html>
<html>

<head>
    <title>Cetak Nilai Keterampilan</title>
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 12pt
        }

        .table {
            border-collapse: collapse;
            border: solid 1px #999;
            width: 100%
        }

        .table tr td,
        .table tr th {
            border: solid 1px #999;
            padding: 3px;
            font-size: 12px
        }

        .rgt {
            text-align: right;
        }

        .ctr {
            text-align: center;
        }
    </style>
</head>

<body>

    <?php
    echo '<p align="left"><b>REKAP NILAI KETERAMPILAN</b>
                <br><div class="card-body">
                     <p class="text-muted">' . $data['nama'] . '</p>
                     <p class="text-muted">' . $data['mapel_id'] . ' | ' . $data['id_mapel'] . ' | ' . $data['nama_lengkap'] . ' | ' . $data['rombel'] . ' | ' .  $data['id_kelas'] . '</p>
                     <hr style="border: solid 1px #000; margin-top: -10px">
                 </div>';
    ?>
    <table class="table table-striped table table-sm">
        <thead></thead>
        <tbody>
            <tr>
                <td colspan="3" class="ctr"><b>DATA SISWA</b></td>
                <td colspan="24" class="ctr"><b>KI-4 KETERAMPILAN</b></td>
            </tr>
            <tr>
                <td class="ctr">NO</td>
                <td class="ctr">NIS</td>
                <td class="ctr">Nama Siswa</td>
                <td class="ctr">KKM</td>               
                <td class="ctr">KD</td>
                <td class="ctr">Praktik</td>
                <td class="ctr">NT</td>               
                <td class="ctr">KD</td>
                <td class="ctr">Produk</td>
                <td class="ctr">NT</td>
                <td class="ctr">KD</td>
                <td class="ctr">Projek</td>
                <td class="ctr">NT</td>
                <td class="ctr">KD</td>
                <td class="ctr">Portofolio</td>
                <td class="ctr">NT</td>
                <td class="ctr">KD</td>
                <td class="ctr">NPH</td>         
                <td class="ctr">N_Rapor</td>
                <td class="ctr">Deskripsi</td>
                <td class="ctr">Predikat</td>
                <td class="ctr">Ketuntasan</td>
            </tr>
            <?php $no = 1;  ?>
            <?php if (!empty($nilai)) { ?>
                <?php foreach ($siswa as $s) : ?>
                    <td class="ctr"><?= $no; ?></td>
                    <td class="ctr"><?= $s['nis']; ?></td>
                    <td><?= $s['nama']; ?></td>                   
                    <td class="ctr">
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
                    <!-- <td class="ctr">
                    <?php foreach ($nilai as $n) :
                        if ($n['tasm'] == $tasm)
                            if ($n['id_siswa'] == $s['id_siswa']) { ?>
                            <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                <div><?= $n['tema']; ?></div>
                            <?php endif ?>
                    <?php }
                    endforeach ?>
                </td> -->
                    <td class="ctr">
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
                    <td class="ctr">
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
                    <td class="ctr">
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
                    <!-- <td class="ctr">
                    <?php foreach ($nilai as $n) :
                        if ($n['tasm'] == $tasm)
                            if ($n['id_siswa'] == $s['id_siswa']) { ?>
                            <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                <div><?= $n['tema']; ?></div>
                            <?php endif ?>
                    <?php }
                    endforeach ?>
                </td> -->
                    <td class="ctr">
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
                    <td class="ctr">
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
                    <td class="ctr">
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
                    <!-- <td class="ctr">
                    <?php foreach ($nilai as $n) :
                        if ($n['tasm'] == $tasm)
                            if ($n['id_siswa'] == $s['id_siswa']) { ?>
                            <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                <div><?= $n['tema']; ?></div>
                            <?php endif ?>
                    <?php }
                    endforeach ?>
                </td> -->
                    <td class="ctr">
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
                    <td class="ctr">
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
                    <td class="ctr">
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
                    <!-- <td class="ctr">
                    <?php foreach ($nilai as $n) :
                        if ($n['tasm'] == $tasm)
                            if ($n['id_siswa'] == $s['id_siswa']) { ?>
                            <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                <div><?= $n['tema']; ?></div>
                            <?php endif ?>
                    <?php }
                    endforeach ?>
                </td> -->
                    <td class="ctr">
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
                    <td class="ctr">
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
                    <td class="ctr">
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
                    <td class="ctr">
                        <?php
                        for ($i = 0; $i < $jum_kd; $i++) {
                            echo '<div>' . ($akd[$i])  . '</div>';
                        } ?>
                    </td>
                    <td class="ctr">
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
                                    <?php if ($n['jenis'] == 'Produk1' || $n['jenis'] == 'Produk2' || $n['jenis'] == 'Produk3' || $n['jenis'] == 'Produk4') {
                                            $maxprd[] = round($n['nilai']);
                                        } else if ($n['jenis'] == 'Praktik1' || $n['jenis'] == 'Praktik2' || $n['jenis'] == 'Praktik3' || $n['jenis'] == 'Praktik4') {
                                            $maxprk[] = round($n['nilai']);
                                        } else if ($n['jenis'] == 'Projek1' || $n['jenis'] == 'Projek2' || $n['jenis'] == 'Projek3' || $n['jenis'] == 'Projek4') {
                                            $maxprj[] = round($n['nilai']);
                                        } else if ($n['jenis'] == 'Portofolio1' || $n['jenis'] == 'Portofolio2' || $n['jenis'] == 'Portofolio3' || $n['jenis'] == 'Portofolio4') {
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
                            echo '<div>' .  $nilai_tinggi  . '</div>';
                        }
                        ?>
                    </td>
                    <td class="ctr">
                    <?php if (!empty($nilai)) { ?>
                        <?php $total_nph = round($total_all / count($akd), 0, PHP_ROUND_HALF_UP) ?>
                            <?php echo '<div>' .  $total_nph  . '</div>'; ?>
                        <?php
                        } else {
                        echo $total_nph = 0;
                    } ?>
                    </td>
                    <td class="ctr">
                        <?php if (!empty($total_all)) {
                            $in_kkm = (string)round((100 - $s['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
                            $C = $s['kkm'];
                            $B = $C + $in_kkm;
                            $A = $B + $in_kkm;
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
                                                    // $desckd[] = $n['nama_kd'];
                                                    $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr('<p class="alert alert-danger" role="alert">' . $n['nama_kd'] . '<p>', 0, 115) . " ..." : $n['nama_kd']);
                                                }
                                            }
                                        }
                                endforeach;
                                $total_all += round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                // echo '<div>' . $akd[$i] . ': ' . (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP) . '</div>';
                                $maxmin[] = round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                            }
                            if ($total_nph >= $A) {
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
                            } elseif ($total_nph >= $B) {
                                // echo "B";
                                echo "<div> Memiliki penguasaan keterampilan baik dalam  
                                                " . $desckd[array_search(max($maxmin), $maxmin)] . "
                                                , namun masih perlu peningkatan dalam hal
                                                " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
                            } elseif ($total_nph >= $C) {
                                // echo "C";
                                echo "<div> Memiliki penguasaan keterampilan cukup dalam  
                                                " . $desckd[array_search(max($maxmin), $maxmin)] . "
                                                , namun masih perlu peningkatan dalam hal
                                                " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
                            } elseif ($total_nph <= $C) {
                                // echo "D";
                                echo "<div> Memiliki penguasaan keterampilan mulai berkembang dalam  
                                                " . $desckd[array_search(max($maxmin), $maxmin)] . "
                                                , namun masih perlu peningkatan dalam hal
                                                " . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
                            }
                            // echo "<div>Memiliki penguasaan keterampilan baik, dalam " . $desckd[array_search(max($maxmin), $maxmin)] . ", namun masih perlu peningkatan dalam hal  " . $desckd[array_search(min($maxmin), $maxmin)] . "</div>";
                        } else {
                            echo $total_all = 0;
                        }
                        ?>
                    </td>                   
                    <td class="ctr">
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
                    <td class="ctr">
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
</body>

</html>