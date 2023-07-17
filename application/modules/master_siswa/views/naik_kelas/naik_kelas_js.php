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

<!-- <script>
    $(document).ready(function() {
        show_loading();
        $("#campus").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_sekolah' ?>/" + $(this).val();
            $('#sekolah').load(url);
            return false;
        })
    });

    $(document).ready(function() {
        show_loading();
        $("#sekolah").change(function() {
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') . 'add_ajax_kelas' ?>/" + $(this).val();
            $('#tingkat').load(url);
            return false;
        })
    });
</script> -->

<script>
    $(document).ready(function() {
        $("#FormTingkat-1").submit(function(e) {
            e.preventDefault();
            var id = $("#tingkat").val();
            // console.log(id);
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>tabel_baru/" + id;
            $("#siswa").load(url);
        })
    });
</script>

<script>
    $(document).ready(function() {
        $("#FormTingkat-2").submit(function(e) {
            e.preventDefault();
            var id = $("#tingkat").val();
            // console.log(id);
            var url = "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>tabel_naik/" + id;
            $("#siswa").load(url);
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

    $('.btn-action-1').on('click', function() {
        show_loading();
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>tambah_baru",
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
            error: function() {}
        })
    })

    $('.btn-action-2').on('click', function() {
        show_loading();
        xhr = $.ajax({
            method: "POST",
            url: "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'both') ?>tambah_naik",
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
            error: function() {}
        })
    })

    // function detail_table(d) {
    //     return 'Tema: ' + d.tema_info + ', catatan: ' + d.catatan + 'Terkhir Login: ' + d.last_login + '<br>' + d.action;
    // }

    $(document).ready(function() {
        table_data = $('#example1').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?= base_url() . $this->uri->segment(1, 0) . $this->uri->slash_segment(2, 'leading') . "/tampildata"; ?>",
                "type": "POST"
            },

            "columns": [{
                    // "class": "details-control",
                    // "orderable": false,
                    // "data": null,
                    // "defaultContent": ""
                    "data": "no"
                },
                {
                    "data": "nis"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "kelas"
                },
                {
                    "data": "tahun"
                },
                {
                    "data": "status"
                },
                {
                    "data": "action"
                },
            ],
        });
        var detailRows = [];
        $('#example1 tbody').on('click', 'tr td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table_data.row(tr);
            var idx = $.inArray(tr.attr('id'), detailRows);
            if (row.child.isShown()) {
                tr.removeClass('details');
                row.child.hide();
                // Remove from the 'open' array
                detailRows.splice(idx, 1);
            } else {
                tr.addClass('details');
                row.child(detail_table(row.data())).show();
                // Add to the 'open' array
                if (idx === -1) {
                    detailRows.push(tr.attr('id'));
                }
            }

        });



        // action edit dan delete

        $('#example1 tbody').on('click', '.btn-edit', function(e) {

            // alert(e.data);

            console.log('id', e.target.dataset.id);

            console.log('jenis action', e.target.dataset.jenis_action);

        })



        $('#example1 tbody').on('click', '.btn-delete', function(e) {

            // alert(e.data);

            console.log('id', e.target.dataset.id);

            console.log('jenis action', e.target.dataset.jenis_action);

        })



    });



    function reload_table() {

        table_data.ajax.reload(null, false); //reload datatable ajax 

    }
</script>