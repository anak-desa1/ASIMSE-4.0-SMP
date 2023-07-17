<!DOCTYPE html>
<html>

<head>
    <title><?= $siswa['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 9.2pt;
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
            font-size: 9.3pt;

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
            width: "10%";
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

        .ki {
            font-size: 10pt;
            text-align: center;
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
                <td colspan="7"></td>
                <td>Nama Sekolah</td>
                <td>: <?= $sekolah['nama_sekolah'] ?></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>

                <td>Kelas</td>
                <td>: <?= $kelas['rombel'] ?>
                <td></td>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td>Alamat Sekolah</td>
                <td>: <?= $sekolah['alamat'] ?>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>

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
                <td colspan="7"></td>
                <td>Nama Siswa</td>
                <td>: <?= $siswa['nama'] ?></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>
                <td colspan="7"></td>

                <td>Tahun Pelajaran</td>
                <td>: <?= $tahun['th_pelajaran'] ?></td>
            </tr>
            <tr>
                <td colspan="7"></td>
                <td>NIS / NISN</td>
                <td>: <?= $siswa['nis'] ?>/<?= $siswa['nisn'] ?></td>
                <td colspan="7"></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div>
        <br>
        <b>SIKAP</b> <br>
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
                    <p style="font-size:12px">
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
                    <p style="font-size:12px">
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
    <table class="table" width="100%">
        <thead> </thead>
        <tbody>
            <!--nilai -->
            <?php foreach ($mapel as $m) : ?>
            <?php endforeach ?>
            <tr>
                <td rowspan="2" colspan="3" class="e" width="10%"><b>MATA PELAJARAN</b></td>
                <td colspan="5" class="e" width="15%"><b>KI-3 PENGETAHUAN</b></td>
                <td colspan="8" class="e" width="15%"><b>KI-4 KETERAMPILAN</b></td>
            </tr>
            <tr>
                <?php if (!empty($nilai_p)) { ?>
                    <?php foreach ($nilai_p as $p) : ?>
                    <?php endforeach ?>
                    <?php if ($ta == 1) { ?>
                        <td colspan="2" class="e" width="5%">Tes Tertulis</td>
                        <td colspan="2" class="e" width="5%">Penugasan</td>
                        <td colspan="" class="e" width="5%"><b>PTS</b></td>
                        <td colspan="2" class="e" width="5%">Prak</td>
                        <td colspan="2" class="e" width="5%">Prod</td>
                        <td colspan="2" class="e" width="5%">Proj</td>
                        <td colspan="2" class="e" width="5%">Port</td>
                    <?php } ?>
                    <?php if ($ta == 2) { ?>
                        <td colspan="2" class="e" width="5%">Tes Tertulis</td>
                        <td colspan="2" class="e" width="5%">Penugasan</td>
                        <td colspan="" class="e" width="5%"><b>PTS</b></td>
                        <td colspan="2" class="e" width="5%">Prak</td>
                        <td colspan="2" class="e" width="5%">Prod</td>
                        <td colspan="2" class="e" width="5%">Proj</td>
                        <td colspan="2" class="e" width="5%">Port</td>
                    <?php } ?>
            </tr>
            <tr>
                <td class="e">NO</td>
                <td class="e">Nama Mata Pelajaran</td>
                <td class="e">KKM</td>
                <?php if ($ta == 1) { ?>
                    <td class="e" width="5%">KD</td>
                    <td class="e" width="5%">Nilai</td>
                    <td class="e" width="5%">KD</td>
                    <td class="e" width="5%">Nilai</td>
                    <td class="e" width="5%">Nilai</td>
                <?php } ?>
                <?php if ($ta == 2) { ?>
                    <td class="e" width="5%">KD</td>
                    <td class="e" width="5%">Nilai</td>
                    <td class="e" width="5%">KD</td>
                    <td class="e" width="5%">Nilai</td>
                    <td class="e" width="5%">Nilai</td>
                <?php } ?>
            <?php } ?>
            <td class="e" width="5%">KD</td>
            <td class="e" width="5%">Nilai</td>
            <td class="e" width="5%">KD</td>
            <td class="e" width="5%">Nilai</td>
            <td class="e" width="5%">KD</td>
            <td class="e" width="5%">Nilai</td>
            <td class="e" width="5%">KD</td>
            <td class="e" width="5%">Nilai</td>
            </tr>
            <tr>
                <td colspan="16">Kelompok (A)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'A') {
            ?>
                    <tr>
                        <td width="4%" class="ctr_a"><?= $no; ?></td>
                        <td width="15%" class="ctr_b"> <?= $m['nama']; ?> </td>
                        <td width="5%" class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
                                <?php
                                $nilai_npts = 0;
                                foreach ($nilai_pts as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel']) {
                                            if ($n['jenis'] == 'PTS') {
                                                $nilai_npts = $n['nilai'];
                                                echo '<div><b>' . $nilai_npts . '</b></div>';
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
                        <td class="ctr_a">
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
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['nilai']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <!-- Praktik -->
                        <!-- Produk -->
                        <td class="ctr_a">
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
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['nilai']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <!-- Produk -->
                        <!-- Projek -->
                        <td class="ctr_a">
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
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['nilai']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <!-- Projek -->
                        <!-- Portofolio -->
                        <td class="ctr_a">
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
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['nilai']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <!-- Portofolio -->
                        <!-- end nilai keterampilan -->
                    </tr>
                    <?php $no++ ?>
            <?php }
            endforeach ?>
            <tr>
                <td colspan="16">Kelompok (B)</td>
            </tr>
            <?php $no = 1; ?>
            <?php foreach ($mapel as $m) :
                if ($m['kelompok'] == 'B') {
            ?>
                    <tr>
                        <td width="4%" class="ctr_a"><?= $no; ?></td>
                        <td width="25%" class="ctr_b"> <?= $m['nama']; ?> </td>
                        <td width="5%" class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
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
                            <td class="ctr_a">
                                <?php
                                $nilai_npts = 0;
                                foreach ($nilai_pts as $n) :
                                    if ($n['tasm'] == $tasm)
                                        if ($n['id_mapel'] == $m['id_mapel']) {
                                            if ($n['jenis'] == 'PTS') {
                                                $nilai_npts = $n['nilai'];
                                                echo '<div><b>' . $nilai_npts . '</b></div>';
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
                        <td class="ctr_a">
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
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 7) == 'Praktik') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['nilai']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <!-- Praktik -->
                        <!-- Produk -->
                        <td class="ctr_a">
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
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 6) == 'Produk') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['nilai']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <!-- Produk -->
                        <!-- Projek -->
                        <td class="ctr_a">
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
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 6) == 'Projek') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['nilai']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
                        </td>
                        <!-- Projek -->
                        <!-- Portofolio -->
                        <td class="ctr_a">
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
                        <td class="ctr_a">
                            <?php
                            $kdprd = [];
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel']) { ?>
                                    <?php if (substr($n['jenis'], 0, 10) == 'Portofolio') : ?>
                                        <?php if (count($kdprd) == 0 || $kdprd[count($kdprd) - 1] != $n['no_kd']) {
                                                $kdprd[] = $n['no_kd'];
                                            } ?>
                                        <div><?= $n['nilai']; ?></div>
                                    <?php endif ?>
                            <?php }
                            endforeach ?>
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

</body>

</html>