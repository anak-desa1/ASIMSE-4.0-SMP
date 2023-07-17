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
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="tampil-modal"></div>               
                <br>
                <div class="card-body">                
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-info">
                                <div class="card-body">                           
                                    <div class="card-responsive">
                                        <form action="" id="form-pendaftar">
                                            <div class="row">
                                            <div class="col-lg-3 mt-4 mt-lg-0">
                                                <div class="">
                                                <select class="form-control" aria-label="Default select example" name="tahun" id="tahun" required>
                                                    <option value="" disabled selected>Pilih Tahun</option>
                                                    <?php foreach ($tahun as $tahun) : ?>
                                                        <option value="<?= $tahun['tahun'] ?>"><?= $tahun['tahun'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mt-4 mt-lg-0">
                                                <div class="">
                                                <select class="form-control" aria-label="Default select example" name="periode" id="periode" required>
                                                    <option value="" disabled selected>Pilih Periode</option>
                                                    
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mt-4 mt-lg-0">
                                                <div class="">
                                                <select class="form-control" aria-label="Default select example" name="jenis" id="jenis" required>
                                                    <option value="" disabled selected>Jenis Daftaran</option>
                                                    <?php foreach ($jenis as $jenis) : ?>
                                                        <option value="<?= $jenis['nama_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 mt-4 mt-lg-0">
                                                <button type="submit" class="btn btn-primary">Cari Data</button>                                    
                                            </div>
                
                                            </div>
                                        </form>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->          
            
            <div class="card" id="pendaftar">
                <div class="card-body"> 
                <button type="button" class="btn btn-primary mb-3 btn-action">
                    <span class="fa fa-plus"></span> Tambah Data
                </button>
                <a class="btn btn-success mb-3" href="<?= base_url() . $this->uri->segment(1, 0) ?>/export_excel_pendaftaran"><i class="fa fa-download"></i> Export Excel</a>
                
                    <div class="table-responsive">
                        <table class="table datatable table-striped table-sm" id="myTable" style="font-size: 14px">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>No Daftar</th>
                                    <th>Password</th>
                                    <th>Nama Pendaftar</th>
                                    <th>Asal Sekolah</th>
                                    <th>No Hp</th>
                                    <!-- <th>Bayar</th> -->
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 0;
                                foreach ($daftar as $daftar) :
                                    $no++ ?>
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
                                        <td>
                                            <button type="button" class="btn btn-sm btn-warning btn-edit" data-id="<?= $daftar['id_daftar'] ?>">
                                                <i class=" fas fa-edit"></i>
                                            </button>
                                            <a target="_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="detail siswa" href="<?= base_url() . $this->uri->segment(1, 0) ?>/mpdf_cetak/<?= $daftar['id_daftar'] ?>" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                                            <a href="<?= base_url() . $this->uri->segment(1, 0) ?>/deldata_pendaftar/<?= $daftar['id_daftar'] ?>" class="btn btn-sm btn-danger btn-hapus"><i class="fa fa-trash-alt"></i> </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                
                  
                </div>                
            </div>           
               
        </div>
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

 </div>
