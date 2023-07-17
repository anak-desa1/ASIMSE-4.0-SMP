<!DOCTYPE html>
<html>

<head>
    <title><?= $header['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 10pt;
            width: 100%;
        }

        .table {
            border-collapse: collapse;
            /* border: solid 2px #999; */
            width: 100%;
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
            font-size: 10pt;
            /* width: 50% */
        }

        .ctr_des {
            text-align: justify;
            /* text-align: right; */
            /* text-align: center; */
            font-family: arial;
            font-size: 10pt;
            width: 60%;
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
            font-size: 10pt;
        }

        .f {
            padding: 5px 10.1px;
            border: 1px solid black;
        }

        .nilai {
            text-align: center;
            font-family: arial;
            font-size: 10pt;
            width: 7%
        }
    </style>
</head>

<body>
    <!-- PENGETAHUNA -->
    <table class="table">
        <tbody>
            <!--nilai -->
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
									$jum_ph = 0;
									$jum_tg = 0;
									$total_ph = 0;
									$total_tg = 0;
									// $jum_n = 0;
									if (!empty($nilai_p)) {
										foreach ($nilai_p as $n) :
											if ($n['tasm'] == $tasm)
												if ($n['id_siswa'] == $m['id_siswa']) {
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
                                // echo $total_ket = 0;
                            } ?>
                        </td>
                        <td class="ctr_des">
                        <?php
							if (!empty($nilai_p)) {
								$in_kkm = (string)round((100 - $m['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
								$C = $m['kkm'];
								$B = $C + $in_kkm;
								$A = $B + $in_kkm;

								$maxmin = [];
								$desckd = [];
								for ($i = 0; $i < $jum_kd; $i++) {
									$total_n = 0;
									$jum_n = 0;
									if (!empty($nilai_p)) {
										foreach ($nilai_p as $n) :
											if ($n['tasm'] == $tasm)
												if ($n['id_siswa'] == $m['id_siswa']) {
													if (substr($n['jenis'], 0, 2) == 'PH' || substr($n['jenis'], 0, 2) == 'TG') {
														if ($n['no_kd'] == $akd[$i]) {
															$jum_n++;
															$total_n = $total_n + $n['nilai'];
															$kd = $n['nama_kd'];
															//$desckd[] = $n['nama_kd'];
															if (count($desckd) == 0 || $desckd[count($desckd) - 1] != $n['nama_kd']) {
																// $desckd[] = $n['nama_kd'];
																$desckd[] = (str_word_count($n['nama_kd']) > 17 ? substr('<p class="alert alert-danger" role="alert">' . $n['nama_kd'] . '<p>', 0, 115) . " ..." : $n['nama_kd']);
															}
														}
													}
												}
										endforeach;
										$total_all_n = (string)round($total_n / $jum_n, 0, PHP_ROUND_HALF_UP) * 2;
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
									// echo "<div>Memiliki penguasaan pengetahuan yang baik dalam " . $desckd[array_search(max($maxmin), $maxmin)] . " , 
                                    // dan  " . $desckd[array_search(min($maxmin), $maxmin)]  . ' mulai berkembang' . "</div>";
									if ($total_peng >= $A) {
										if (min($maxmin) >= $A) {
											// echo "A";
											// echo $total_all_n;
											echo "<div> Peserta didik memiliki penguasaan pengetahuan yang sangat baik dalam
															" . $desckd[array_search(max($maxmin), $maxmin)] . "</div>";										} else {
											echo "<div> Peserta didik memiliki penguasaan pengetahuan yang sangat baik dalam 
											" . $desckd[array_search(max($maxmin), $maxmin)] . "
											, namun masih perlu bimbingan dalam hal
											" . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
										}
									} elseif ($total_peng >= $B) {
										// echo "B";
										echo "<div> Peserta didik memiliki penguasaan pengetahuan yang baik dalam  
														" . $desckd[array_search(max($maxmin), $maxmin)] . "
														, namun masih perlu bimbingan dalam hal
														" . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
									} elseif ($total_peng >= $C) {
										// echo "C";
										echo "<div> Peserta didik memiliki penguasaan pengetahuan yang cukup dalam  
														" . $desckd[array_search(max($maxmin), $maxmin)] . "
														, namun masih perlu bimbingan dalam hal
														" . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
									} elseif ($total_peng <= $C) {
										// echo "D";
										echo "<div> Peserta didik memiliki penguasaan pengetahuan yang mulai berkembang dalam  
														" . $desckd[array_search(max($maxmin), $maxmin)] . "
														, namun masih perlu bimbingan dalam hal
														" . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
									}
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
</body>

</html>