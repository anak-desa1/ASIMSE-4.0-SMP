<!-- overlayScrollbars -->
<script src="<?= base_url() ?>panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
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

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    });
</script>

<script>
    $(document).ready(function() {
        show_loading();
        $("#departemen").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_jabatan' ?>/" + $(this).val();
            $('#jabatan').load(url);
            return false;
        })

        $("#jabatan").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_tempat' ?>/" + $(this).val();
            $('#tempat').load(url);
            return false;
        })

    });
</script>