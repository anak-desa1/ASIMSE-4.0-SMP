<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>

<!-- <script>
    $(document).ready(function() {
        $("#FormTingkat").submit(function(e) {
            e.preventDefault();
            var id = $("#tingkat").val();
            // console.log(id);
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'tabel' ?>/" + id;
            $("#mapel").load(url);
        })

    });
</script> -->

<script>
    $(document).ready(function() {
        $("#FormPTS").submit(function(e) {
            e.preventDefault();
            var id = $("#tingkat").val();
            // console.log(id);
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'tabel_pts' ?>/" + id;
            $("#mapel").load(url);
        })

    });
</script>

<script>
    $(document).ready(function() {
        $("#FormPAS").submit(function(e) {
            e.preventDefault();
            var id = $("#tingkat").val();
            // console.log(id);
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'tabel_pas' ?>/" + id;
            $("#mapel").load(url);
        })

    });
</script>