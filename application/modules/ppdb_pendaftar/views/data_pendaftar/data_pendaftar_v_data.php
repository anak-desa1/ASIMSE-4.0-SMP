<div class="card-body">
<div class="table-responsive">
    <table class="table datatable table-striped table-sm" style="font-size: 14px">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>No Daftar</th>
                <th>Password</th>
                <th>Nama Pendaftar</th>
                <th>Asal Sekolah</th>
                <th>No Hp</th>
                <!-- <th>Bayar</th> -->
                <th>Status</th>                
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                foreach ($daftar as $daftar) :
                $no++ 
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $daftar['no_daftar'] ?></td>
                <td><?= $daftar['password_x'] ?></td>
                <td><?= $daftar['nama'] ?></td>
                <td><?= $daftar['asal_sekolah'] ?></td>
                <td>
                    <?php foreach ($sch as $s) : ?>
                    <i class="fab fa-whatsapp text-success   "></i>
                    <a target="_blank" href="https://api.whatsapp.com/send?phone=62<?= $daftar['no_hp'] ?>&text=<?= $s['nolivechat'] ?>.%0AInfo%20lebih%20lanjut%20silahkan%20kunjungi%20website%20<?= $s['web'] ?>%0ASilahkan%20login%20dan%20lengkapi%20data%20formulirnya.%20%0Ausername%20%3A%20%2A<?= $daftar['no_daftar'] ?>%2A%0Apassword%20%3A%20%2A<?= $daftar['password_x'] ?>%2A">
                    <?= $daftar['no_hp'] ?></a>
                    <?php endforeach ?>
                </td>
                <!-- <td>
                    <?php
                        foreach ($bayar as $bayar) :
                        if ($bayar['id_daftar'] == $daftar['id_daftar']) { ?>
                        <a target="_blank" href="<?= base_url() ?>ppdb_pendaftar/cetak_pembayaran/<?= $daftar['id_daftar'] ?>">Rp <?= number_format($bayar['total'], 0, ",", "."); ?></a>
                        <?php  } else { ?>
                        <a target="_blank" href="<?= base_url() ?>ppdb_pendaftar/cetak_pembayaran/<?= $daftar['id_daftar'] ?>" type="button" class="badge badge-danger">belum</a>
                    <?php }
                    endforeach ?>
                </td> -->
                <td>
                    <?php if ($daftar['status'] == 1) { ?>
                    <span class="badge bg-success">diterima</span>
                    <?php } elseif ($daftar['status'] == 2) { ?>
                    <span class="badge bg-danger">Cadang </span>
                    <?php } else { ?>
                    <span class="badge bg-warning">pending</span>
                    <?php } ?>
                </td>               
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>
