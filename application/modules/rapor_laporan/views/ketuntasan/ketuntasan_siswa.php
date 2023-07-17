 <div class="content-wrapper">
     <?php $this->load->view('layout/header-page') ?>

     <div class="card-body">
         <div class="card card-primary card-outline">
             <div class="card-header">
                 <h3 class="card-title">
                     <i class="fas fa-print"></i>
                     <?= $subtitle ?>
                     <!-- <?= $sekolah['nama_sekolah'] ?> -->
                 </h3>
             </div>
             <!-- Default box -->
             <div class="card-body p-0" style="display: block;">
                 <div class="tampil-modal"></div>
                 <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                 <div class="flash-data" data-flashdata=""><?= $this->session->flashdata('message'); ?></div>
                 <div class="card-header">
                     <h3 class="card-title">
                         <a class="btn btn-info mb-3" href="<?= site_url('akademik_rekapnilai/ketuntasan/') ?>"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                         <!-- <?php if ($cek_akses['role_id'] == 1) : ?>
                            <button type="button" class="btn btn-primary mb-3 btn-action">
                                <span class="fa fa-plus"></span> Tambah Data
                            </button>
                        <?php endif ?> -->
                     </h3>
                 </div>
                 <div class="panel-body">
                     <div class="table-responsive">
                         <table class="table table-striped projects table table-sm">
                             <thead>
                                 <tr>
                                     <th>
                                         #
                                     </th>
                                     <th>
                                         Nama Siswa
                                     </th>
                                     <th>
                                         Kelas
                                     </th>
                                     <th>
                                         Action
                                     </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($data as $t) :
                                    ?>
                                     <tr>
                                         <td>
                                             <a>
                                                 <?= $i ?>
                                             </a>
                                         </td>
                                         <td>
                                             <a>
                                                 <?= $t['nama'] ?>
                                             </a>
                                         </td>
                                         <td>
                                             <a>
                                                 <?= $t['rombel'] ?>
                                             </a>
                                         </td>
                                         <td class="project-actions">
                                             <a target="_blank" class="btn btn-info btn-sm" href="<?= base_url() ?>akademik_rekapnilai/ketuntasan/detail/<?= $t['rombel']; ?>/<?= $t['id_siswa']; ?>">
                                                 <i class="fas fa-folder">
                                                 </i>
                                                 Cek Rapor
                                             </a>
                                         </td>
                                         <td class="project-actions">
                                             <a target="_blank" class="btn btn-danger btn-sm" href="<?= base_url() ?>akademik_rekapnilai/ketuntasan/mpdf/<?= $t['rombel']; ?>/<?= $t['id_siswa']; ?>">
                                                 <i class="fas fa-file">
                                                 </i>
                                                 Cetak PDF
                                             </a>
                                         </td>
                                     </tr>
                                     <?php $i++; ?>
                                 <?php endforeach ?>
                             </tbody>
                         </table>
                     </div>
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </div>
     </div>
 </div>
 <!-- /.content-wrapper -->