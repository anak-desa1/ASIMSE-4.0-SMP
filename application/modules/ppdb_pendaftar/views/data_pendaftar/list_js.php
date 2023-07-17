<!-- jQuery -->
<script src="<?= base_url() ?>panel/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>panel/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>panel/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>panel/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>panel/plugins/jquery-validation/additional-methods.min.js"></script>

<!-- DataTables -->
<script src="<?= base_url() ?>panel/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>panel/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>panel/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>panel/plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>

<script>
  $(document).ready(function() {
    $("#form-pendaftar").submit(function(e) {
      e.preventDefault();
      var tahun = $("#tahun").val();
      var periode = $("#periode").val();
      var jenis = $("#jenis").val();
      // console.log(id);
      var url = "<?= base_url() . $this->uri->segment(1, 0) ?>/cari_pendaftar/"+ tahun + '/' + periode + '/' + jenis;
      $("#pendaftar").load(url);
    })

  });
</script>

<script type="text/javascript">
    //set default swal sweet alert..
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    $('.btn-action').on('click', function() {
        show_loading();

        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/tambah_pendaftar",
            data: "jenis=tambah",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.modal-action').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                // validate_form();
                hide_loading();
            },
            error: function() {

            }
        })
    })

    $('.btn-edit').on('click', function() {
        show_loading();
        id = $(this).data('id');
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) ?>/edit_pendaftar/" + id,
            data: "jenis=edit",
            success: function(response) {
                $('.tampil-modal').html(response);
                $('.modal-edit').modal({
                    backdrop: 'static',
                    keyboard: false
                }, 'show');
                // validate_form();
                hide_loading();
            },
            error: function() {

            }
        })
    })
</script>

<script>
    $(document).ready(function() {
        show_loading();
        $("#tahun").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0).'/add_ajax_periode' ?>/" + $(this).val();
            $('#periode').load(url);
            return false;
        })
    });
</script>

<!-- <script>
    $(document).ready(function() {

        $("#kampus").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . 'add_sekolah' ?>/" + $(this).val();
            $('#sekolah').load(url);
            return false;
        })

        $("#sekolah").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . '/' . 'add_kelas' ?>/" + $(this).val();
            $('#kelas').load(url);
            return false;
        })

    });
</script> -->