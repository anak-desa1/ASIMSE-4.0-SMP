<?php defined('BASEPATH') or die("ip anda sudah tercatat oleh sistem kami") ?>\
<!-- /.content-wrapper -->
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
       
      <div class="col-12">
            <div class="card" style="border-top: 8px solid #035AA6;border-bottom: 8px solid #035AA6;border-right: 4px solid #035AA6;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
                <div class="tampil-modal"></div>
                <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                <div class="card-body">
                    <div class="panel-body">
                        <?php
                        if (function_exists('date_default_timezone_set'))
                            date_default_timezone_set('Asia/Jakarta');
                        ?>
                        <span id="clock">&nbsp;</span>
                        <div class='box'>
                            <div class='box-header'>
                            </div>
                            <div class='box-body'>
                                <?php
                                $attributes = array('id' => 'button');
                                echo form_open('siswa_qrcode/scan/cek_id', $attributes); ?>
                                <div id="sourceSelectPanel" style="display:none">
                                    <label for="sourceSelect">Change video source:</label>
                                    <select id="sourceSelect" style="max-width:400px"></select>
                                </div>
                                <div>
                                    <video id="video" width="500" height="400" style="border: 1px solid gray"></video>
                                </div>
                                <textarea hidden="" name="id_siswa" id="result" readonly></textarea>
                                <span> <input type="submit" id="button" class="btn btn-success btn-md" value="Cek Kehadiran"></span>
                                <?php echo form_close(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>

<script type="text/javascript" src="<?php echo base_url() ?>panel/plugins/zxing/zxing.min.js"></script>
<script type="text/javascript">
    window.addEventListener('load', function() {
        let selectedDeviceId;
        let audio = new Audio("<?= base_url() ?>panel/assets/audio/beep.mp3");
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