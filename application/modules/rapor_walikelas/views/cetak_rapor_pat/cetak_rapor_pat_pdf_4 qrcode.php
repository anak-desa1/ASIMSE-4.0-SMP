<!DOCTYPE html>
<html>

<head>
    <title><?= $header['nama'] ?></title>
    <link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon_1.ico" />
    <style type="text/css">
        body {
            font-family: arial;
            font-size: 11pt;
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
            font-size: 11pt;
            /* width: 50% */
        }

        .ctr_des {
            /* text-align: justify; */
            /* text-align: right; */
            text-align: center;
            font-family: arial;
            font-size: 11pt;
            width: 58%;
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
            font-family: arial;
            font-size: 10.5pt;
        }

        .d {
            color: white;
        }

        .e {
            background: #92a8d1;
            text-align: center;
            font-family: arial;
            font-size: 11pt;
        }

        .f {
            padding: 5px 11px;
            border: 1px solid black;
        }

        .nilai {
            text-align: center;
            font-family: arial;
            font-size: 11pt;
        }
    </style>
</head>

<body>
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
    <?php if ($naik_kelas['naik'] == 'Y') {
        echo '                                              
            <div style="border: solid 1px #000; padding: 20px 10px; height: 50px; width: 100%"> 
                Keputusan: <br>
                Berdasarkan pencapaian seluruh kompetensi, peserta didik dinyatakan <br>
                Naik Kelas ' . $naik_kelas['kelas'] . ' *) 
            </div>
            ';
    } else {
        echo ' ';
    }
    ?>
    <?php if ($naik_kelas['naik'] == 'N') {
        echo ' 
         <div style="border: solid 1px #000; padding: 10px 10px; height: 40px; width: 100%"> 
                Keputusan: <br>
                Berdasarkan pencapaian seluruh kompetensi, peserta didik dinyatakan <br>
                Tetap di Kelas ' . $naik_kelas['kelas'] . ' *) 
            </div>
            ';
    } else {
        echo ' ';
    }
    ?>
    <?php if ($naik_kelas['naik'] == 'L') {
        echo ' 
         <div style="border: solid 1px #000; padding: 30px 10px; width: 100%"> 
                Keputusan: <br>
                Berdasarkan pencapaian seluruh kompetensi, peserta didik dinyatakan <br>
                Lulus*)
            </div>
            ';
    } else {
        echo ' ';
    }
    ?>
    <?php if ($naik_kelas['naik'] == 'T') {
        echo ' 
         <div style="border: solid 1px #000; padding: 30px 10px; width: 100%"> 
                Keputusan: <br>
                Berdasarkan pencapaian seluruh kompetensi, peserta didik dinyatakan <br>
                Tidak Lulus*)
            </div>
            ';
    } else {
        echo ' ';
    }
    ?>
    <br />
    <table>
        <thead> </thead>
        <tbody>
            <tr>
                <td width="2%"></td>
                <td width="50%">
                    Mengetahui : <br>
                    Orang Tua/Wali, <br>
                    <br><br><br><br><br><br><br><br><br><br><br>
                    <u>...........................................</u>
                </td>
                <td width="2%"></td>
                <td width="15%">
                </td>
                <td width="7%"></td>
                <td width="70%">
                <?= $kota['kota'] ?>, <span><?php echo format_indo(date($tahun['tgl_raport_pat'])); ?></span><br>
                    Wali Kelas, <br>
                    <br><img style="width:150px;height:150px;" class="img-responsive" src="<?php echo base_url('panel/assets/img/qrcode/') . $footer_1['nip'] . 'code.png'; ?>" /><br><br>
                    <u>
                        <p class="p"><b><?= $footer_1['nama_guru'] ?></b></p>
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
                <td width="10%"></td>
                <td width="20%"></td>
                <td width="25%"></td>
                <!-- <td width="50%" align="center"> -->
                <td width="57%">
                    <!-- <?= $footer_1['kota'] ?>, <span><?php echo format_indo(date($tahun['tgl_raport_kelas3'])); ?></span><br> -->
                    Mengetahui <br>
                    Kepala Sekolah <br>
                    <br><img style="width:150px;height:150px;" class="img-responsive" src="<?php echo base_url('panel/assets/img/qrcode/') . $tahun['nik'] . 'code.png'; ?>" /><br><br>
                    <u><b class="p"><?= $tahun['nama_kepsek'] ?></b></u>
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