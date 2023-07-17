<!DOCTYPE html>
<html>

<head>
	<title>Cetak Nilai Pengetahuan</title>
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
			text-align: middle;
		}
	</style>
</head>

<body>

	<?php
	echo '<p align="left"><b>REKAP NILAI PENGETAHUAN</b>
                <br><div class="card-body">
                     <p class="text-muted">' . $data['nama'] . '</p>
                     <p class="text-muted">' . $data['mapel_id'] . ' | ' . $data['id_mapel'] . ' | ' . $data['nama_lengkap'] .' | ' . $data['rombel'] .' | ' .  $data['id_kelas'] . '</p>
                     <hr style="border: solid 1px #000; margin-top: -10px">
                 </div>';
	?>
	<table class="table table-striped table table-sm">
		<thead></thead>
		<tbody>
			<tr>
				<td rowspan="2" colspan="4" class="ctr"><b>DATA SISWA</b></td>
				<td colspan="19" class="ctr"><b>KI-3 PENGETAHUAN</b></td>
				<!-- <?php echo $ta ?> -->
			</tr>
			<?php foreach ($siswa as $s) :
			endforeach ?>
			<tr>
				<?php if (!empty($nilai)) { ?>
					<?php foreach ($nilai as $n) : ?>
					<?php endforeach ?>
					<?php if ($ta == 1) { ?>
						<td colspan="2" class="ctr">Tes_Tertulis</td>
						<td colspan="2" class="ctr">Penugasan</td>
					<?php } ?>
					<?php if ($ta == 2) { ?>
						<td colspan="2" class="ctr">Tes_Tertulis</td>
						<td colspan="2" class="ctr">Penugasan</td>
					<?php } ?>
					<td colspan="12" class="ctr">REKAP NILAI</td>
			</tr>
			<tr>
				<td class="ctr">NO</td>
				<td class="ctr">NIS</td>
				<td class="ctr">Nama Siswa</td>
				<td class="ctr">KKM</td>
				<?php if ($ta == 1) { ?>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
					<td class="ctr">KD</td>
					<td class="ctr">TG</td>
				<?php } ?>
				<?php if ($ta == 2) { ?>
					<td class="ctr">KD</td>
					<td class="ctr">PH</td>
					<td class="ctr">KD</td>
					<td class="ctr">TG</td>
				<?php } ?>
			<?php } ?>
			<td class="ctr">KD</td>
			<td class="ctr">NILAI KD</td>
			<td class="ctr">NPH</td>
			<td class="ctr">NPTS</td>
			<td class="ctr">NPAS</td>
			<td class="ctr">NILAI RAPOR</td>
			<td class="ctr">Deskripsi</td>			
			<td class="ctr">Predikat</td>
			<td class="ctr">Ketuntasan</td>
			</tr>
			<?php $no = 1;  ?>
			<?php if (!empty($nilai)) { ?>
				<?php foreach ($siswa as $s) : ?>
					<tr>
						<td class="ctr"><?= $no; ?></td>
						<td class="ctr"><?= $s['nis']; ?></td>
						<td><?= $s['nama']; ?></td>
						<td class="ctr">
							<?php
							foreach ($kkm as $k) :
								if ($k['id_mapel'] == $data['id_mapel'])
									if ($k['kelas'] == $data['id_kelas'])
									if ($k['ta'] == $tahun){
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
							<td class="ctr">
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
							<td class="ctr">
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
							<td class="ctr">
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
							<td class="ctr">
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
							<td class="ctr">
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
							<td class="ctr">
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
							<td class="ctr">
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
							<td class="ctr">
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
						<td class="ctr">
							<?php
							for ($i = 0; $i < $jum_kd; $i++) {
								echo '<div>' . $akd[$i] . '</div>';
							}
							?>
						</td>
						<td class="ctr">
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
						<td class="ctr">
							<?php if (!empty($total_all_n)) { ?>
								<?php $nilai_n =  (string)round($total_na / count($akd), 0, PHP_ROUND_HALF_UP);  ?>
								<?php echo '<div>' .  $nilai_n . '</div>'; ?>
							<?php
							} else {
								echo $total_all_n = 0;
							} ?>
						</td>
						<td class="ctr">
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
						<td class="ctr">
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
						<td class="ctr">
							<?php if (!empty($total_all_n)) {
								$total_nph = round(((2 * $nilai_n) + (1 * $nilai_pts) + (1 * $nilai_pas)) / 4, 0, PHP_ROUND_HALF_UP);
								echo '<div>' .  $total_nph . '</div>';
							} else {
								echo $total_all_n = 0;
							} ?>							
						</td>
						<td class="ctr">
						<?php
							if (!empty($nilai)) {
								$in_kkm = (string)round((100 - $s['kkm']) / 3, 0, PHP_ROUND_HALF_UP);
								$C = $s['kkm'];
								$B = $C + $in_kkm;
								$A = $B + $in_kkm;

								$maxmin = [];
								$desckd = [];
								for ($i = 0; $i < $jum_kd; $i++) {
									$total_n = 0;
									$jum_n = 0;
									if (!empty($nilai)) {
										foreach ($nilai as $n) :
											if ($n['tasm'] == $tasm)
												if ($n['id_siswa'] == $s['id_siswa']) {
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
									if ($total_nph >= $A) {
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
									} elseif ($total_nph >= $B) {
										// echo "B";
										echo "<div> Peserta didik memiliki penguasaan pengetahuan yang baik dalam  
														" . $desckd[array_search(max($maxmin), $maxmin)] . "
														, namun masih perlu bimbingan dalam hal
														" . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
									} elseif ($total_nph >= $C) {
										// echo "C";
										echo "<div> Peserta didik memiliki penguasaan pengetahuan yang cukup dalam  
														" . $desckd[array_search(max($maxmin), $maxmin)] . "
														, namun masih perlu bimbingan dalam hal
														" . $desckd[array_search(min($maxmin), $maxmin)]  . "</div>";
									} elseif ($total_nph <= $C) {
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
												if ($k['ta'] == $tahun)
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