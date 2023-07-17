 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <?php $this->load->view('layout/header-page') ?>

     <!-- Main content -->

     <section class="content">
         <div class="container-fluid">
             <!-- About Me Box -->
             <div class="card card-info">
                 <div class="card-header">
                     <h3 class="card-title">About Me</h3>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body">
                     <p class="text-muted">
                         Walikelas : <?= $kelas['nama_lengkap'] ?>
                         Kelas : <?= $kelas['rombel'] ?>
                     </p>
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </div>
     </section>

     <section class="content">
         <div class="container-fluid">
             <!-- About Me Box -->
             <div class="card card-info">
                 <div class="card-header">
                     <h3 class="card-title">HANYA UNTUK JENJANG SD</h3>
                 </div>
             </div>
             <!-- /.card -->
         </div>
     </section>

     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->