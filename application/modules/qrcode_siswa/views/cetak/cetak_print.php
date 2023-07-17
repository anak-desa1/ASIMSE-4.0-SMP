<?php foreach ($siswa as $s) : ?>
    <div style="width: 850px;height: 260px;margin-bottom: -12px;padding:; background-image: url('<?= base_url() ?>panel/assets/img/blangko/<?= $blangko["gambar"]; ?>');">
        <!--foto siswa -->
        <img style="margin-left: 300px; border-radius: 6px; border: 1px solid #222; position: absolute; margin-top: 120px; width: 90px; height: 110px; overflow: hidden;" class="img-responsive img" src="<?= base_url() ?>panel/assets/img/foto/<?= $s->nis; ?>.jpeg">
        <!--logo sekolah -->
        <img style="position: absolute; margin-left: 45px; margin-top: 20px; width: 48px;" src="<?= base_url() ?>panel/dist/upload/logo/<?= $sekolah["logo"]; ?>">
        <!--nama yayasan -->
        <p style="color: #fff; position: absolute; padding-left: 45px; padding-top: 5px; width:380px; height: 45px; text-transform: uppercase;text-align: center;letter-spacing: 2px;"><b><u><?= $sekolah["nama_sekolah"]; ?></u></b></p>
        <p style="color: #090910; position: absolute;padding-left: 105px; padding-top: 33px; width:605px; height: 70px;text-transform: capitalize; text-align: left;letter-spacing: 2px;font-size: 10px"><?= $sekolah["alamat"]; ?></p>
        <!--nama sekolah -->
        <p style="color: #090910; position: absolute;padding-left: 105px; padding-top: 43px; width:405px; height: 70px;text-transform: capitalize; text-align: left;letter-spacing: 2px;font-size: 10px">Telp : <?= $sekolah["telp"]; ?> Kode Pos : <?= $sekolah["kodepos"]; ?></p>
        <p style="color: #090910; position: absolute;padding-left: 105px; padding-top: 53px; width:405px; height: 70px;text-transform: capitalize; text-align: left;letter-spacing: 2px;font-size: 10px"></p>
        <!--batas waktu -->
        <p style="letter-spacing: 2px;margin-left: 145px;padding-top: 90px; width: 240px; text-align: left; font-size: 15px"><b>KARTU PELAJAR</b></p>
        <p style="letter-spacing: 2px; margin-left: 150px; padding-top: 100px;width: 240px; text-align: left; font-size: 15px"></p>
        <!--web site -->
        <p style="color: #fff;font-family: arial;font-size: 11px; position: absolute; margin-left: 300px; margin-top: 112px; width: 83px; height:30px; text-align:center; position: center; float: center"><b></b></p>
        <!--qrcode siswa -->
        <img style="margin-left: 225px; border:2px solid #fff;position: absolute; margin-top: -103px; width: 70px; height: 70px;" src="<?= base_url() ?>panel/assets/img/qrcode/<?= $s->nis; ?>code.png">
        <!-- <table cellspacing="0em" style="margin-left: 28px; margin-top: -23px;  padding-left: 0px; position: relative; font-family: arial; font-size: 11px; transition-property: 2px; width: 275px; height: 130px;"> -->
        <table cellspacing="0em" style="margin-left: 28px; margin-top: -128px; padding-left: 0px; position: relative; transition-property: 2px; font-family: arial; font-size: 11px; height: 120px;">
            <tr>
                <td><b>Nama</b></td>
                <td>:</td>
                <td><b><?= $s->nama; ?></b></td>
            </tr>
            <tr>
                <td><b>NIS</b></td>
                <td>:</td>
                <td>
                    <?= $s->nis; ?>
                </td>
            </tr>
            <tr>
                <td><b>NISN</b></td>
                <td>:</td>
                <td>
                    <?= $s->nisn; ?>
                </td>
            </tr>
            <tr>
                <td><b>Tempat, Tgl Lahir</b></td>
                <td>:</td>
                <td><?= $s->tmp_lahir; ?>, <?= format_indo(date($s->tgl_lahir)); ?></td>
            </tr>

        </table>
        <!--hieder belakang -->
        <p style="margin-top: -230px; padding-left: 560px; padding-top: 45px;font-size: 11px;"> <b style="font-size: 12px;">TATA TERTIB SEKOLAH</b> </p>
        <!--isi belakang -->
        <ol style="padding-left: 480px;font-family: arial;font-size: 11px;text-align: justify;padding-right: 25px;margin-top: -8px;">
            <li>Kartu ini berlaku untuk masuk ke perpustakaan dan meminjam buku</a></li>
            <li>Kartu ini berlaku selama yang bersangkutan menjadi pelajar di <?= $sekolah["nama_sekolah"]; ?></li>
            <li>Bagi yang menemukan kartu ini mohon mengembalikan ke alamat <?= $sekolah["nama_sekolah"]; ?></li>
        </ol>
        <!--ttd belakang -->
        <p style="margin-left: 495px;font-family: arial;font-size: 11px;text-align: center;padding-right: 45px;width: 35%;margin-top: 15px;"><?= $blangko['kota'] ?>, <?= format_indo(date($blangko['ttd_date'])); ?><br><b>Kepala Sekolah</b><br><br><br><br><b><?= $blangko["kepsek"]; ?></b></p>
        <img style="margin-left: 490px;font-family: arial;padding-right: 25px;width: 20%;margin-top: -85px;position: absolute;" src="<?= base_url() ?>panel/assets/img/tandatangan/<?= $blangko['ttd'] ?>">
        <!-- <img style="border-radius: 2px;border:4px solid #fff;margin-left: 500px;font-family: arial;font-size: 10px;text-align: justify;width: 70px;margin-top: -90px;position: absolute;" src="<?= base_url() ?>assets/img/qrcode/"> -->
        <!--footer belakang -->
        <!-- <p style="color: #fff; margin-left: 400px; font-family: arial; font-size: 11px; text-align: center; padding-right: 25px; width: 55%;"><b></b></p> -->
    </div>


<?php
endforeach ?>