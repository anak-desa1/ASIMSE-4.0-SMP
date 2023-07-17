<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>
<style media="screen">
    .btn-md {
        padding: 1rem 2.4rem;
        font-size: .94rem;
        display: none;
    }

    .swal2-popup {
        font-family: inherit;
        font-size: 1.2rem;
    }
</style>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $title; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
              <li class="breadcrumb-item active"><?= $subtitle; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      <div class='row'>
            <div class='col-xs-12'>
                <div class='box'>
                    <div class='box-header'></div>
                    <div class='box-body'>
                        <?php
                        if (function_exists('date_default_timezone_set'))
                            date_default_timezone_set('Asia/Jakarta');
                        ?>
                        <?php
                        $attributes = array('id' => 'button');
                        echo form_open('siswa_qrcode/scan/cek_id', $attributes); ?>
                        <div id="sourceSelectPanel" style="display:none">
                            <label for="sourceSelect">Change video source:</label>
                            <select id="sourceSelect" style="max-width:400px"></select>
                        </div>
                        <div>
                            <video id="video" width="100%" height="100%" style="border: 1px solid gray"></video>
                        </div>
                        <textarea hidden="" name="id_karyawan" id="result" readonly></textarea>
                        <span> <input type="submit" id="button" class="btn btn-success btn-md" value="Cek Kehadiran"></span>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="<?php echo base_url() ?>panel/plugins/zxing/zxing.min.js"></script>
<script type="text/javascript">
    window.addEventListener('load', function() {
        let selectedDeviceId;
        let audio = new Audio("panel/assets/audio/beep.mp3");
        const codeReader = new ZXing.BrowserQRCodeReader()
        console.log('ZXing code reader initialized')
        codeReader.getVideoInputDevices()
            .then((videoInputDevices) => {
                const sourceSelect = document.getElementById('sourceSelect')
                selectedDeviceId = videoInputDevices[0].deviceId
                if (videoInputDevices.length >= 1) {
                    videoInputDevices.forEach((element) => {
                        const sourceOption = document.createElement('option')
                        sourceOption.text = element.label
                        sourceOption.value = element.deviceId
                        sourceSelect.appendChild(sourceOption)
                    })
                    sourceSelect.onchange = () => {
                        selectedDeviceId = sourceSelect.value;
                    };
                    const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                    sourceSelectPanel.style.display = 'block'
                }
                codeReader.decodeFromInputVideoDevice(selectedDeviceId, 'video').then((result) => {
                    console.log(result)
                    document.getElementById('result').textContent = result.text
                    if (result != null) {
                        audio.play();
                    }
                    $('#button').submit();
                }).catch((err) => {
                    console.error(err)
                    document.getElementById('result').textContent = err
                })
                console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
            })
            .catch((err) => {
                console.error(err)
            })
    })
</script>