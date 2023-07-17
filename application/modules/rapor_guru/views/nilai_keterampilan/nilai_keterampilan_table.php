<form method="post" action="<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'nilai_simpan' ?>" role="form" id="form-action" enctype="multipart/form-data">

    <div class="card-header">
        <h3 class="card-title">Penilaian Keterampilan</h3>
    </div>
    <div class="card-body">
        <input type="hidden" name="id_guru_mapel" value="<?= $mapel['mapel_id'] ?>">
        <input type="hidden" name="mapel_id" value="<?= $mapel['mapel_id'] ?>">
        <input type="hidden" name="tasm" value="<?= $tasm ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label>Penilaian<span class="symbol required"> </span></label>
                        <?php echo form_dropdown('penilaian', $p_penilaian, '', 'class="form-control" id="penilaian" required'); ?>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>KD<span class="symbol required"> </span></label>
                        <select class="form-control select2" style="width: 100%;" id="id_mapel_kd" name="id_mapel_kd" required>
                            <option value="">Pilih KD</option>
                            <?php foreach ($kd as $kel) {
                                echo '<option value="' . $kel->kd_id . '">' . $kel->tema . '-' . $kel->no_kd . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="col-md-3 form-group">
                        <label>PH/TG<span class="symbol required"> </span></label>
                        <?php echo form_dropdown('jenis', $p_jenis, '', 'class="form-control" id="jenis" required'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1 ?>
            <?php foreach ($siswa as $s) : ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $s['nis'] ?></td>
                    <td><?= $s['nama'] ?></td>
                    <td>
                        <div class="col-md-8 form-group">
                            <input type="number" name="nilai[]" class="form-control" id="nilai">
                            <input type="hidden" name="id_siswa[]" value="<?= $s['nis'] ?>">
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <div class="modal-footer justify-content-between">
        <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
    </div>
</form>