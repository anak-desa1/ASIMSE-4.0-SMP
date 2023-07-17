 <div class="content-wrapper">
     <?php $this->load->view('layout/header-page') ?>

     <div class="card-body">
         <div class="card card-primary card-outline">
             <div class="card-header">
                 <h3 class="card-title">
                     <i class="fas fa-edit"></i>
                     <?= $subtitle ?>                    
                 </h3>
             </div>
             <!-- Default box -->
             <div class="card-body p-0" style="display: block;">
                 <div class="tampil-modal"></div>
                 <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                 <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                 <div class="card-header">
                     <h3 class="card-title">
                     </h3>
                 </div>
                 <div class="col-md-12">
                     <div class="card card-warning">
                         <div class="card-header">
                             <h3 class="card-title">Lihat Data</h3>
                         </div>
                         <div class="row">
                             <div class="col-md-4">
                                 <div class="card-body">
                                     <ul class="list-group">
                                         <li class="list-group-item">
                                             <div class="pull-right">
                                                 <a>
                                                     <form action="" id="FormKI1">
                                                         <input type="hidden" name="tingkat" id="tingkat" value="<?= $kelas['tingkat'] ?>" class="form-control" data-live-search="true">
                                                         <button type="submit" class="btn"><i class="fa fa-chevron-right"></i> <b>Rekap Nilai KI-1</b> </button>
                                                     </form>
                                                 </a>
                                             </div>
                                         </li>
                                         <li class="list-group-item">
                                             <div class="pull-right">
                                                 <a>
                                                     <form action="" id="FormKI2">
                                                         <input type="hidden" name="tingkat" id="tingkat" value="<?= $pegawai['kd_sekolah'] ?>" class="form-control" data-live-search="true">
                                                         <button type="submit" class="btn"><i class="fa fa-chevron-right"></i> <b>Rekap Nilai KI-2</b> </button>
                                                     </form>
                                                 </a>
                                             </div>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                             <div class="col-md-8">
                                 <div class="card-body">
                                     <ul class="list-group">
                                         <li class="list-group-item">
                                             <div class="pull-right">
                                             <h3> <?= $pegawai['nama_pegawai'] ?> </h3>                                               
                                                                                             </div>
                                         </li>
                                          <li class="list-group-item">
                                             <div class="pull-right">
                                                        <h3 class="card-title">Untuk melihat Rekap Nilai KI1 - KI2 klik menu disamping </h3>                                           
                                             </div>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
                 <div class="col-sm-12">
                     <div class="card card-danger">
                         <div class="card-header">
                             <h3 class="card-title">Rekap Nilai KI1 - KI2</h3>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-md-12">
                                     <div class="table-responsive" id="mapel">

                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- </div> -->
                         <!-- </form> -->
                     </div>
                 </div>
             </div>
             <!-- /.card -->
         </div>
     </div>
 </div>
 <!-- /.content-wrapper -->
 <!-- <?php if ($cek_akses['role_id'] == 1) : ?>
 <?php endif ?> -->