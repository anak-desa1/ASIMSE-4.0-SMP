 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1><?= $title; ?></h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#"><?= $home; ?></a></li>
                         <li class="breadcrumb-item active"><?= $subtitle; ?></li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="col-12">
             <!-- Default box -->
             <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
             <?= $this->session->flashdata('message'); ?>
             <div class="tampil-modal"></div>
             <?php if ($cek_akses['role_id'] == 1) : ?>
                 <div class="card-toolbar">
                     <a href="" class="btn btn-primary mb-3 font-weight-bolder font-size-sm mr-3" data-toggle="modal" data-target="#newMenuModal">
                         <span class="fa fa-plus"></span> Tambah Data
                     </a>
                 </div>
             <?php endif ?>

             <div class="card">
                 <div class="card-header">
                     <h3 class="card-title"><?= $subtitle; ?></h3>
                     <div class="card-tools">
                         <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                             <i class="fas fa-minus"></i></button>
                         <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                             <i class="fas fa-times"></i></button>
                     </div>
                 </div>
                 <div class="card-body p-0">
                     <!--begin::Table-->
                     <div class="table-responsive">
                         <table class="table table-striped" id="mytable" style="font-size: 14px;">
                             <thead>
                                 <tr class="text-left">
                                     <th scope="col">#</th>
                                     <th scope="col">Menu</th>
                                     <th scope="col">Url</th>
                                     <th scope="col">Icon</th>
                                     <th scope="col">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php $i = 1; ?>
                                 <?php foreach ($menu as $m) : ?>
                                     <tr>
                                         <td scope="row"><?= $i; ?></td>
                                         <td><?= $m['nama_menu']; ?></td>
                                         <td><?= $m['url']; ?></td>
                                         <td><?= $m['m_icon']; ?></td>
                                         <td>
                                             <a class="btn btn-icon btn-light btn-hover-primary btn-sm" href="" title="Edit" data-m_icon="<?= $m['m_icon']; ?>" data-menu="<?= $m['nama_menu']; ?>" data-url="<?= $m['url'] ?>" data-id="<?= $m['id']; ?>" data-toggle="modal" data-target="#editModal" title="edit">
                                                 <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                     <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Design/Edit.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                             <rect x="0" y="0" width="24" height="24" />
                                                             <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) " />
                                                             <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1" />
                                                         </g>
                                                     </svg>
                                                     <!--end::Svg Icon-->
                                                 </span>
                                             </a>
                                             <a class="btn btn-icon btn-light btn-hover-primary btn-sm" href="<?= base_url('data_menu/delmenu/') . $m['id'] ?>" title="Delete">
                                                 <span class="svg-icon svg-icon-primary svg-icon-2x">
                                                     <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-09-29-132851/theme/html/demo1/dist/../src/media/svg/icons/Home/Trash.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                         <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                             <rect x="0" y="0" width="24" height="24" />
                                                             <path d="M6,8 L18,8 L17.106535,19.6150447 C17.04642,20.3965405 16.3947578,21 15.6109533,21 L8.38904671,21 C7.60524225,21 6.95358004,20.3965405 6.89346498,19.6150447 L6,8 Z M8,10 L8.45438229,14.0894406 L15.5517885,14.0339036 L16,10 L8,10 Z" fill="#000000" fill-rule="nonzero" />
                                                             <path d="M14,4.5 L14,3.5 C14,3.22385763 13.7761424,3 13.5,3 L10.5,3 C10.2238576,3 10,3.22385763 10,3.5 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3" />
                                                         </g>
                                                     </svg>
                                                     <!--end::Svg Icon-->
                                                 </span>
                                             </a>
                                         </td>
                                     </tr>
                                     <?php $i++; ?>
                                 <?php endforeach; ?>
                             </tbody>
                         </table>
                     </div>
                     <!--end::Table-->
                 </div>
                 <!-- /.card-body -->
             </div>
             <!-- /.card -->
         </div>
     </section>
     <br>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!--modal add-->
 <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="<?= base_url('data_menu/create_menu'); ?>" method="post">
                 <div class=" modal-body">
                     <div class="form-group">
                         <input type="text" class="form-control" id="menu" name="nama_menu" placeholder="Menu name">
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control" id="url" name="url" placeholder="Link Menu">
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control" id="m_icon" name="m_icon" placeholder="Icon">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Add</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!--end modal add-->
 <!--modal edit-->
 <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="editModalLabel">Edit Menu</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="<?= base_url('data_menu/editmenu'); ?>" method="post">
                 <div class=" modal-body">
                     <input type="hidden" class="form-control" id="ed_id" name="ed_id">
                     <div class="form-group">
                         <input type="text" class="form-control" id="ed_menu" name="ed_menu" placeholder="Menu name">
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control" id="ed_url" name="ed_url" placeholder="Link Menu">
                     </div>
                     <div class="form-group">
                         <input type="text" class="form-control" id="ed_icon" name="ed_icon" placeholder="Icon Menu">
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
 <!--end modal edit-->

 <!-- jQuery -->
 <script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap 4 -->
 <script src="<?= base_url() ?>panel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

 <script>
     $(function() {
         $('#editModal').on('show.bs.modal', function(e) {
             let btn = $(e.relatedTarget);
             let id = btn.data('id');
             let name = btn.data('menu');
             let url = btn.data('url');
             let m_icon = btn.data('m_icon');
             $("#ed_id").val(id);
             $("#ed_menu").val(name);
             $("#ed_url").val(url);
             $("#ed_icon").val(m_icon);
         });
     });
 </script>