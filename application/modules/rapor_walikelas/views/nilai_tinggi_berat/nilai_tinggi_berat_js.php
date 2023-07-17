<!-- overlayScrollbars -->
<script src="<?= base_url() ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- jQuery -->
<script src="<?= base_url() ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url() ?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url() ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url() ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Datepicker -->
<script src="<?= base_url() ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url() ?>plugins/select2/js/select2.full.min.js"></script>

<script type="text/javascript">
    $(document).on("ready", function() {

        $("#<?= base_url() ?><?php echo $url; ?>").on("submit", function() {

            var data = $(this).serialize();

            $.ajax({
                type: "POST",
                data: data,
                url: "<?= base_url() ?><?php echo $url; ?>/simpan",
                beforeSend: function() {
                    $("#tbsimpan").attr("disabled", true);
                },
                success: function(r) {
                    $("#tbsimpan").attr("disabled", false);
                    if (r.status == "ok") {
                        noti("success", r.data);
                    } else {
                        noti("danger", r.data);
                    }
                }
            });

            return false;
        });
    });
</script>