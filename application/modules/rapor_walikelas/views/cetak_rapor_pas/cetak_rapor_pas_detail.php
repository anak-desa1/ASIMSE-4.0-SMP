<!DOCTYPE html>
<html>

<head>
    <title><?= $siswa['nama'] ?></title>
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
            width: 50%
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
    <div style="text-align: center;">
        <h3>LAPORAN HASIL BELAJAR SISWA</h3>
    </div>
    <table>
        <thead></thead>
        <tr>
            <td rowspan="4" colspan="4" class="d"> oel </td>
            <td rowspan="4" colspan="4" class="d"> oel </td>
            <td rowspan="4" colspan="4" class="d"> oel </td>
            <td rowspan="4" colspan="4" class="d"> oel </td>
            <!-- <td rowspan="4" colspan="4" class="d"> oel </td> -->
            <td class="p">Nama Sekolah</td>
            <td colspan="3" class="p">: <?= $sekolah['nama_sekolah'] ?></td>
            <td colspan="2" class="p">Kelas</td>
            <td colspan="2" class="p">: <?= $kelas['rombel'] ?>
        </tr>
        <tr>
            <td class="p">Alamat Sekolah</td>
            <td colspan="3" class="p">: <?= $sekolah['alamat'] ?>
            <td colspan="2" class="p">Semester</td>
            <td colspan="2" class="p">: <?php
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
            <td class="p">Nama Siswa</td>
            <td colspan="3" class="p">: <?= $siswa['nama'] ?></td>
            <td colspan="2" class="p">Tahun Pelajaran</td>
            <td colspan="2" class="p">: <?= $tahun['th_pelajaran'] ?></td>
        </tr>
        <tr>
            <td class="p">NIS / NISN</td>
            <td colspan="2" class="p">: <?= $siswa['nis'] ?>/<?= $siswa['nisn'] ?></td>
        </tr>
        </tbody>
    </table>
    <div>
        <br>
        <b>A. SIKAP</b> <br>
        <b>1. Sikap Spiritual</b>
    </div>
    <table class="table" width="100%">
        <tr>
            <th width="20%" class="e"> Predikat</th>
            <th width="80%" class="e"> Deskripsi</th>
        </tr>
        <tr>
            <?php foreach ($selalu_sp as $sp) : ?>
                <td class="ki"><b><?= $sp['predikat'] ?></b></td>
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
                        <i>Memiliki sikap spiritual <?= $sp['predikat'] ?>, antara lain <?= $sp_text_selalu  ?> dan
                        <?php endforeach ?>
                        <?php foreach ($mulai_meningkat_sp as $m) : ?>
                            <?= $m['nama_kd'] ?> ; ketaatan beribadah sudah berkembang.
                        </i>
                    </p>
                <?php endforeach ?>
                </td>
        </tr>
    </table>
    <div>
        <b>2. Sikap Sosial</b>
    </div>
    <table class="table" width="100%">
        <tr>
            <th width="20%" class="e"> Predikat</th>
            <th width="80%" class="e"> Deskripsi</th>
        </tr>
        <tr>
            <?php foreach ($selalu_so as $so) : ?>
                <td class="ki"><b><?= $so['predikat'] ?></b></td>
                <td>
                    <?php $pc_selalu = explode(",", $so['selalu']);
                    $teks_selalu = array();
                    for ($i = 0; $i < sizeof($pc_selalu); $i++) {
                        $idx = $pc_selalu[$i];

                        $teks_selalu[] = $list_kd_so[$idx];
                    }

                    $text_selalu = implode(", ", $teks_selalu); ?>
                    <p style="font-size:13px">
                        <i>Memiliki sikap sosial <?= $so['predikat'] ?>, antara lain <?= $text_selalu ?>
                        <?php endforeach ?>
                        <?php foreach ($mulai_meningkat_so as $m) : ?>
                            dan <?= $m['nama_kd'] ?> mulai meningkat.
                        </i>
                    </p>
                <?php endforeach ?>
                </td>
        </tr>
    </table>
    <div>
        <br>
        <b>B. Pengetahuan dan Keterampilan</b>
        <!-- <b>KKM Satuan Pendidikan : ...</b> -->
    </div>
    <!-- PENGETAHUNA -->
    <table class="table">
        <tbody>
            <tr>
                <td rowspan="2" class="e">NO</td>
                <td rowspan="2" class="e">Muatan Pelajaran</td>
                <td colspan="4" class="e">Pengetahuan</td>
            </tr>
            <tr>
                <td class="e">KKM</td>
                <td class="e">Nilai</td>
                <td class="e">Predikat</td>
                <td class="e">Deskripsi</td>
            </tr>
            <tr>
                <td colspan="6">Kelompok (A)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'A') {
            ?>
                    <tr>
                        <td width="5%" class="ctr"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <td width="5%" class="nilai">
                            <!-- <?= $m['kkm']; ?>  -->
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
                        <td class="nilai">
                            <?php
                            $total_all_n = 0;
                            $total_nakd = 0;
                            $total_na = 0;
                            $total_peng = 0;
                            $akd = array();
                            $all_kd = "";
                            $jum_kd = 0;
                            foreach ($nilai_p as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel'])
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
                            <?php
                            if (!empty($nilai_p)) {
                                $maxmin = [];
                                $desckd = [];
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total_n = 0;
                                    $jum_n = 0;
                                    if (!empty($nilai_p)) {
                                        foreach ($nilai_p as $n) :
                                            if ($n['tasm'] == $tasm)
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if (substr($n['jenis'], 0, 2) == 'PH' || substr($n['jenis'], 0, 2) == 'TG') {
                                                        if ($n['no_kd'] == $akd[$i]) {
                                                            $jum_n++;
                                                            $total_n = $total_n + $n['nilai'];
                                                            $kd = $n['nama_kd'];
                                                            //$desckd[] = $n['nama_kd'];
                                                            if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                                // $desckd[] = $n['nama_kd'];
                                                                $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                            }
                                                        }
                                                    }
                                                }
                                        endforeach;
                                        // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                        $total_all_n = ($total_n != 0) ?  (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                        // echo '<div>' .  $total_all_n . '</div>';
                                    } else {
                                        // echo $total_all_n = 0;
                                    }

                                    $total_nakd = $total_all_n;
                                    // var_dump($nilai_rapor);
                                    // die;
                                    if ($total_all_n > 1) {
                                        $total_na += (string)round($total_nakd, 0, PHP_ROUND_HALF_UP);
                                    }
                                }
                            }
                            ?>
                            <?php if (!empty($total_all_n)) { ?>
                                <?php $nilai_n =  (string)round($total_na / count($akd), 0, PHP_ROUND_HALF_UP);  ?>
                                <!-- <?php echo '<div>' .  $nilai_n . '</div>'; ?> -->
                            <?php
                            } else {
                                // echo $total_all_n = 0;
                            } ?>
                            <?php
                            $nilai_pts = 0;
                            foreach ($nilai_p as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) {
                                        if ($n['jenis'] == 'PTS') {
                                            $nilai_pts = $n['nilai'];
                                            // echo ' <div>' . $nilai_pts . ' </div>';
                                        }
                                    }
                            endforeach;
                            ?>
                            <?php
                            $nilai_pas = 0;
                            foreach ($nilai_p as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) {
                                        if ($n['jenis'] == 'PAS') {
                                            $nilai_pas = $n['nilai'];
                                            // echo ' <div>' .  $nilai_pas . ' </div>';
                                        }
                                    }
                            endforeach;
                            ?>
                            <?php if (!empty($total_all_n)) {
                                $total_peng = round(((2 * $nilai_n) + (1 * $nilai_pts) + (1 * $nilai_pas)) / 4, 0, PHP_ROUND_HALF_UP);
                                echo '<div>' .  $total_peng . '</div>';
                            } else {
                                echo $total_peng = 0;
                            } ?>
                        </td>
                        <td class="nilai">
                            <?php if (!empty($total_peng)) {
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
                                <?php if ($total_peng >= $A) {
                                    echo "A";
                                } elseif ($total_peng >= $B) {
                                    echo "B";
                                } elseif ($total_peng >= $C) {
                                    echo "C";
                                } elseif ($total_peng <= $C) {
                                    echo "D";
                                } else {
                                    echo "Jangan menyerah, anda pasti bisa!  ";
                                } ?>
                            <?php
                            } else {
                                // echo $total_peng = 0;
                            } ?>
                        </td>
                        <td class="ctr_des">
                            <?php
                            if (!empty($nilai_p)) {
                                $maxmin = [];
                                $desckd = [];
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total_n = 0;
                                    $jum_n = 0;
                                    if (!empty($nilai_p)) {
                                        foreach ($nilai_p as $n) :
                                            if ($n['tasm'] == $tasm)
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if (substr($n['jenis'], 0, 2) == 'PH' || substr($n['jenis'], 0, 2) == 'TG') {
                                                        if ($n['no_kd'] == $akd[$i]) {
                                                            $jum_n++;
                                                            $total_n = $total_n + $n['nilai'];
                                                            $kd = $n['nama_kd'];
                                                            //$desckd[] = $n['nama_kd'];
                                                            if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                                // $desckd[] = substr($n['nama_kd'], 0, 98);
                                                                $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                            }
                                                        }
                                                    }
                                                }
                                        endforeach;
                                        // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                        $total_all_n = ($total_n != 0) ?  (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2 : 0;
                                        // echo '<div>' .  $total_all_n . '</div>';
                                    } else {
                                        echo $total_all_n = 0;
                                    }
                                    $total_na = $total_all_n;
                                    // var_dump($nilai_rapor);
                                    // die;
                                    if ($total_all_n >= 1) {
                                        $maxmin[] = (string)round($total_na, 0, PHP_ROUND_HALF_UP);
                                    }
                                }
                                if (empty($maxmin)) {
                                    echo 0;
                                } else {
                                    echo "<div>Memiliki penguasaan pengetahuan yang baik dalam " . $desckd[array_search(max($maxmin), $maxmin)] . " , 
                                    dan  " . $desckd[array_search(min($maxmin), $maxmin)]  . ' mulai berkembang' . "</div>";
                                }
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
    <!-- END PENGETAHUNA -->
    <!-- PENGETAHUNA -->
    <table class="table">
        <tbody>
            <tr>
                <td colspan="6">Kelompok (B)</td>
            </tr>
            <?php $no = 1;
            ?>
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
                            <!-- <?= $m['kkm']; ?> -->
                        </td>
                        <!--nilai pengetahuan -->
                        <td class="nilai">
                            <?php
                            $total_all_n = 0;
                            $total_nakd = 0;
                            $total_na = 0;
                            $total_peng = 0;
                            $akd = array();
                            $all_kd = "";
                            $jum_kd = 0;
                            foreach ($nilai_p as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel'])
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
                            <?php
                            if (!empty($nilai_p)) {
                                $maxmin = [];
                                $desckd = [];
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total_n = 0;
                                    $jum_n = 0;
                                    if (!empty($nilai_p)) {
                                        foreach ($nilai_p as $n) :
                                            if ($n['tasm'] == $tasm)
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if (substr($n['jenis'], 0, 2) == 'PH' || substr($n['jenis'], 0, 2) == 'TG') {
                                                        if ($n['no_kd'] == $akd[$i]) {
                                                            $jum_n++;
                                                            $total_n = $total_n + $n['nilai'];
                                                            $kd = $n['nama_kd'];
                                                            //$desckd[] = $n['nama_kd'];
                                                            if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                                // $desckd[] = $n['nama_kd'];
                                                                $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                            }
                                                        }
                                                    }
                                                }
                                        endforeach;
                                        // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                        $total_all_n = ($total_n != 0) ?  (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 1 : 0;
                                        // echo '<div>' .  $total_all_n . '</div>';
                                    } else {
                                        // echo $total_all_n = 0;
                                    }

                                    $total_nakd = $total_all_n;
                                    // var_dump($nilai_rapor);
                                    // die;
                                    if ($total_all_n > 1) {
                                        $total_na += (string)round($total_nakd, 0, PHP_ROUND_HALF_UP);
                                    }
                                }
                            }
                            ?>
                            <?php if (!empty($total_all_n)) { ?>
                                <?php $nilai_n =  (string)round($total_na / count($akd), 0, PHP_ROUND_HALF_UP);  ?>
                                <!-- <?php echo '<div>' .  $nilai_n . '</div>'; ?> -->
                            <?php
                            } else {
                                // echo $total_all_n = 0;
                            } ?>
                            <?php
                            $nilai_pts = 0;
                            foreach ($nilai_p as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) {
                                        if ($n['jenis'] == 'PTS') {
                                            $nilai_pts = $n['nilai'];
                                            // echo ' <div>' . $nilai_pts . ' </div>';
                                        }
                                    }
                            endforeach;
                            ?>
                            <?php
                            $nilai_pas = 0;
                            foreach ($nilai_p as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) {
                                        if ($n['jenis'] == 'PAS') {
                                            $nilai_pas = $n['nilai'];
                                            // echo ' <div>' .  $nilai_pas . ' </div>';
                                        }
                                    }
                            endforeach;
                            ?>
                            <?php if (!empty($total_all_n)) {
                                $total_peng = round(((2 * $nilai_n) + (1 * $nilai_pts) + (1 * $nilai_pas)) / 4, 0, PHP_ROUND_HALF_UP);
                                echo '<div>' .  $total_peng . '</div>';
                            } else {
                                echo $total_peng = 0;
                            } ?>

                        </td>
                        <td class="nilai">
                            <?php if (!empty($total_peng)) {
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
                                <?php if ($total_peng >= $A) {
                                    echo "A";
                                } elseif ($total_peng >= $B) {
                                    echo "B";
                                } elseif ($total_peng >= $C) {
                                    echo "C";
                                } elseif ($total_peng <= $C) {
                                    echo "D";
                                } else {
                                    echo "Jangan menyerah, anda pasti bisa!  ";
                                } ?>
                            <?php
                            } else {
                                // echo $total_peng = 0;
                            } ?>
                        </td>
                        </td>
                        <td class="ctr_des">
                            <?php
                            if (!empty($nilai_p)) {
                                $maxmin = [];
                                $desckd = [];
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total_n = 0;
                                    $jum_n = 0;
                                    if (!empty($nilai_p)) {
                                        foreach ($nilai_p as $n) :
                                            if ($n['tasm'] == $tasm)
                                                if ($n['id_mapel'] == $m['id_mapel']) {
                                                    if (substr($n['jenis'], 0, 2) == 'PH' || substr($n['jenis'], 0, 2) == 'TG') {
                                                        if ($n['no_kd'] == $akd[$i]) {
                                                            $jum_n++;
                                                            $total_n = $total_n + $n['nilai'];
                                                            $kd = $n['nama_kd'];
                                                            //$desckd[] = $n['nama_kd'];
                                                            if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                                $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                            }
                                                        }
                                                    }
                                                }
                                        endforeach;
                                        // $total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
                                        $total_all_n = ($total_n != 0) ?  (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2 : 0;
                                        // echo '<div>' .  $total_all_n . '</div>';
                                    } else {
                                        echo $total_all_n = 0;
                                    }
                                    $total_na = $total_all_n;
                                    // var_dump($nilai_rapor);
                                    // die;
                                    if ($total_all_n >= 1) {
                                        $maxmin[] = (string)round($total_na, 0, PHP_ROUND_HALF_UP);
                                    }
                                }

                                if (empty($maxmin)) {
                                    echo 0;
                                } else {
                                    echo "<div>Memiliki penguasaan pengetahuan yang baik dalam " . $desckd[array_search(max($maxmin), $maxmin)] . " , 
                                    dan  " . $desckd[array_search(min($maxmin), $maxmin)]  . ' mulai berkembang' . "</div>";
                                }
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
    <!-- END PENGETAHUNA -->
    <br>
    <!-- KETERAMPILAN -->
    <table class="table">
        <tbody>
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
                <td colspan="6">Kelompok (A)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'A') {
            ?>
                    <tr>
                        <td width="5%" class="ctr"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <td width="5%" class="nilai">
                            <!-- <?= $m['kkm']; ?>  -->
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
                                $maxmin = [];
                                $desckd = [];
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total = 0;
                                    $jum_n = 0;
                                    foreach ($nilai_k as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_n++;
                                                    $total = $total + $n['nilai'];
                                                    if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                        // $desckd[] = $n['nama_kd'];
                                                        $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                    }
                                                }
                                            }
                                    endforeach;
                                    $total_all_k += round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                    // echo '<div>' . $akd[$i] . ': ' . (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $maxmin[] = ($total != 0) ? round($total / $jum_n, 0, PHP_ROUND_HALF_UP) : 0;
                                }
                                echo "<div>Memiliki penguasaan keterampilan baik, dalam " . $desckd[array_search(max($maxmin), $maxmin)] . ", dan " . $desckd[array_search(min($maxmin), $maxmin)] . ' mulai meningkat' . "</div>";
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
    <!-- KETERAMPILAN -->
    <table class="table">
        <tbody>
            <tr>
                <td colspan="10">Kelompok (B)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'B') {
            ?>
                    <tr>
                        <td width="5%" class="ctr"><?= $no; ?></td>
                        <td width="25%" class="align-middle"> <?= $m['nama']; ?> </td>
                        <td width="5%" class="nilai">
                            <!-- <?= $m['kkm']; ?>  -->
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
                                $maxmin = [];
                                $desckd = [];
                                for ($i = 0; $i < $jum_kd; $i++) {
                                    $total = 0;
                                    $jum_n = 0;
                                    foreach ($nilai_k as $n) :
                                        if ($n['tasm'] == $tasm)
                                            if ($n['id_mapel'] == $m['id_mapel']) {
                                                if ($n['no_kd'] == $akd[$i]) {
                                                    $jum_n++;
                                                    $total = $total + $n['nilai'];
                                                    if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
                                                        // $desckd[] = $n['nama_kd'];
                                                        $desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr($n['nama_kd'], 0, 115) . "..." : $n['nama_kd']);
                                                    }
                                                }
                                            }
                                    endforeach;
                                    $total_all_k += round($total / $jum_n, 0, PHP_ROUND_HALF_UP);
                                    // echo '<div>' . $akd[$i] . ': ' . (string)round($total / $jum_n, 0, PHP_ROUND_HALF_UP) . '</div>';
                                    $maxmin[] = ($total != 0) ? round($total / $jum_n, 0, PHP_ROUND_HALF_UP) : 0;
                                }
                                echo "<div>Memiliki penguasaan keterampilan baik, dalam " . $desckd[array_search(max($maxmin), $maxmin)] . ", dan " . $desckd[array_search(min($maxmin), $maxmin)] . ' mulai meningkat' . "</div>";
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
    <div>
        <b>F. Catatan Wali Kelas</b>
    </div>
    <table class="table">
        <tr>
            <td width="20%" style="border: solid 1px #000; padding: 20px 11px; height: 80px; width: 100%">
                <?= $catatan['catatan_wali'] ?>
            </td>
        </tr>
    </table>
    <br>
    <div>
        <b>G. Tanggapan Orangtua/Wali</b>
    </div>
    <table class="table">
        <tr>
            <td width="20%" style="border: solid 1px #000; padding: 20px 11px; height: 80px; width: 100%">

            </td>
        </tr>
    </table>
    <br>
   
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
                <td width="2%"></td>
                <td width="20%">
                </td>
                <td width="7%"></td>
                <td width="65%">
                    <?= $footer_1['kota'] ?>, <span><?php echo format_indo(date($tahun['tgl_raport_kelas3'])); ?></span><br>
                    Wali Kelas, <br>
                    <br>
                    <img src="<?php echo site_url('akademik_walikelas/cetak_rapor_pas/QRcode/' . $footer_1['nip']); ?>" alt="">
                    <br>
                    <u>
                        <p class="font-size: 50%;"><b><?= $footer_1['nama_guru'] ?></b></p>
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
                <td width="7%"></td>
                <td width="20%"></td>
                <td width="25%"></td>
                <!-- <td width="50%" align="center"> -->
                <td width="57%">
                    <!-- <?= $footer_1['kota'] ?>, <span><?php echo format_indo(date($tahun['tgl_raport_kelas3'])); ?></span><br> -->
                    Mengetahui <br>
                    Kepala Sekolah <br>
                    <br>  
                    <img src="<?php echo site_url('akademik_walikelas/cetak_rapor_pas/QRcode/' .  $tahun['nik']); ?>" alt="">
                    <br>
                    <u><b><?= $tahun['nama_kepsek'] ?></b></u>
                </td>
                <td width="2%"></td>
                <td width="36%">
            </tr>
        </tbody>
    </table>
    <br>
    <br>
    <br>
</body>

</html>