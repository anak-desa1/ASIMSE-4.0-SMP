<!DOCTYPE html>
<html>

<head>
    <title>Leger</title>
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 12pt
        }

        .table {
            border-collapse: collapse;
            border: solid 1px #999;
            width: 100%;
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
            text-align: middle;
            /* width: 5%; */
        }

        .r {
            text-align: center;
            text-align: middle;
            font-family: 'Times New Roman', Times, serif;
            background-color: DarkGray;
        }
    </style>
</head>

<body>
    <?php
    echo '<p align="left"><b>LEGER</b>
                <div class="card-body">
                     <p class="text-muted">' . $data['nama_lengkap'] . ' | '. $data['rombel'] . '</p>
                     <hr style="border: solid 1px #000; margin-top: -10px">
                 </div>';
    ?>
    <table id="leger" class="table table-striped table table-sm">
        <thead></thead>
        <tbody>
            <tr>
                <td colspan="3" class="ctr"><b>DATA SISWA</b></td>
                <?php foreach ($mapel as $m) : ?>
                    <td colspan="3" class="ctr"><?= $m['kd_singkat'] ?></td>
                <?php endforeach ?>
                <td rowspan="2" class="ctr">Jumlah</td>
                <td rowspan="2" class="ctr">Ranking</td>
                <td colspan="3" class="ctr">Kehadiran</td>
            </tr>
            <tr>
                <td class="ctr">NO</td>
                <td class="ctr">NIS</td>
                <td class="ctr">Nama Siswa</td>
                <!-- <td class="ctr">KKM</td> -->
                <?php foreach ($mapel as $m) : ?>
                    <td class="ctr">KI-3</td>
                    <td class="ctr">KI-4</td>
                    <td class="r">R2</td>
                <?php endforeach ?>
                <td class="ctr">S</td>
                <td class="ctr">I</td>
                <td class="ctr">A</td>
            </tr>
            <?php
            $no = 1;
            $rangking = [];
            ?>
            <?php foreach ($siswa as $s) : ?>
                <tr>
                    <td class="ctr"><?= $no; ?></td>
                    <td class="ctr"><?= $s['nis']; ?></td>
                    <td><?= $s['nama']; ?></td>
                    <!-- hitung nilai -->
                    <?php
                    $total_r = 0;
                    foreach ($mapel as $m) : ?>
                        <!-- hitung nilai KI3-->
                        <td class="ctr">
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
                                    if ($n['id_mapel'] == $m['id_mapel'])
                                        // if ($n['mapel_id'] == $s['mapel_id'])
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
										// echo '<div>' .  $total_all_n . '</div>';
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
                            <?php if (!empty($total_all_n)) { ?>
                                <?php $nilai_n =  (string)round($total_na / count($akd), 0, PHP_ROUND_HALF_UP);  ?>
                            <?php
                            } ?>
                            <?php
                            $nilai_pts = 0;
                            foreach ($nilai as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel'])
                                        // if ($n['mapel_id'] == $s['mapel_id'])
                                        if ($n['id_siswa'] == $s['id_siswa']) {
                                            if ($n['jenis'] == 'PTS') {
                                                $nilai_pts = $n['nilai'];
                                            }
                                        }
                            endforeach;
                            ?>
                            <?php
                            $nilai_pas = 0;
                            foreach ($nilai as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel'])
                                        // if ($n['mapel_id'] == $s['mapel_id'])
                                        if ($n['id_siswa'] == $s['id_siswa']) {
                                            if ($n['jenis'] == 'PAS') {
                                                $nilai_pas = $n['nilai'];
                                            }
                                        }
                            endforeach;
                            ?>
                            <?php if (!empty($total_all_n)) {
                                $total_peng = ($nilai_n != 0) ? round(((2 * $nilai_n) + (1 * $nilai_pts) + (1 * $nilai_pas)) / 4, 0, PHP_ROUND_HALF_UP) : 0;
                                echo '<div>' .  $total_peng . '</div>';
                            } else {
                                echo $total_all_n = 0;
                            } ?>
                        </td>
                        <td class="ctr">
                            <?php
                            $akd = array();
                            $all_kd = "";
                            $jum_kd = 0;
                            foreach ($nilai_k as $n) :
                                if ($n['tasm'] == $tasm)
                                    if ($n['id_mapel'] == $m['id_mapel'])
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
                                        if ($n['id_mapel'] == $m['id_mapel'] && $n['no_kd'] == $akd[$i])
                                            if ($n['id_siswa'] == $s['id_siswa']) {
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
                        <td class="r">
                            <?php
                            $rerata = 0;
                            $rerata = ($total_all_n != 0 || $total_all_k != 0) ? round(($total_peng + $total_ket) / 2, 0, PHP_ROUND_HALF_UP) : 0;
                            $total_r += $rerata;
                            ?>
                            <?= $rerata ?>
                        </td>
                    <?php endforeach ?>
                    <?php $rangking[] = array('id_siswa' => $s['id_siswa'], 'total_r' => $total_r); ?>
                    <td class="ctr"><?= $total_r ?></td>

                    <?php
                    //foreach ($absen_siswa as $as) :
                    // if ($as['id_siswa'] == $s['id_siswa']) { 
                    ?>
                    <!--<td class="ctr"><?= $as['s'] ?></td>
                            <td class="ctr"><?= $as['i'] ?></td>
                            <td class="ctr"><?= $as['a'] ?></td>-->
                    <?php
                    //}
                    //endforeach 
                    ?>
                </tr>

                <?php $no++ ?>

            <?php endforeach ?>


        </tbody>
    </table>

    <?php
    if ($total_r == 0) {
        //print_r($rangking);
        //echo "===========================";
        0;
        //print_r($rangking);
    } else {
        $keys = array_column($rangking, 'total_r');
        array_multisort($keys, SORT_DESC, $rangking);
    }
    ?>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var table = document.getElementById("leger");
            var rangking = <?php echo json_encode($rangking); ?>;
            var siswa = <?php echo json_encode($siswa); ?>;
            var absen_siswa = <?php echo json_encode($absen_siswa); ?>;
            //console.log(siswa);
            var i = 0;
            for (i = 0; i < siswa.length; i++) {
                console.log(siswa[i].id_siswa);
                var j = 0;
                for (j = 0; j < rangking.length; j++) {
                    if (siswa[i].id_siswa == rangking[j].id_siswa) {
                        var x = table.rows[2 + i].insertCell(-1);
                        x.innerHTML = '<div style="text-align:center">' + String(j + 1) + '</div>';
                    }
                }
                var k = 0;
                for (k = 0; k < absen_siswa.length; k++) {
                    if (siswa[i].id_siswa == absen_siswa[k].id_siswa) {
                        var x = table.rows[2 + i].insertCell(-1);
                        x.innerHTML = '<div style="text-align:center">' + String(absen_siswa[k].s) + '</div>';
                        var x = table.rows[2 + i].insertCell(-1);
                        x.innerHTML = '<div style="text-align:center">' + String(absen_siswa[k].i) + '</div>';
                        var x = table.rows[2 + i].insertCell(-1);
                        x.innerHTML = '<div style="text-align:center">' + String(absen_siswa[k].a) + '</div>';
                    }
                }

            }
        });
    </script>


</body>





</html>