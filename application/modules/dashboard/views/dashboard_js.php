<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>panel/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- ChartJS -->
<script src="<?= base_url() ?>panel/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>panel/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url() ?>panel/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>panel/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>panel/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>panel/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>panel/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>panel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>panel/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>panel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url() ?>panel/dist/js/pages/dashboard.js"></script>

<script type="text/javascript">
  //set default swal sweet alert..
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

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
          "data": "nama_lengkap"
        },
        {
          "data": "tema_content"
        },
        {
          "data": "fiel_content"
        },
        {
          "data": "create_date"
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