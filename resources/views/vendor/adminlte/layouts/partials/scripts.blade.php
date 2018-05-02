<!-- REQUIRED JS SCRIPTS -->
<link rel="stylesheet" href="https://almsaeedstudio.com/themes/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>
<script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="https://almsaeedstudio.com/themes/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="/js/jquery.table2excel.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!}};
</script>

<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>

<script>
    $("#btnExport").click(function (e) {
        $("#example1").table2excel({
            exclude: ".noExl",
            name: "Tickets",
            filename: "GrillaTickets"
        });

    });
</script>

<script>
    $( function() {
        $("#estado_js").change( function() {
            if ($(this).val() === "3") {
                document.getElementById("mes_js").disabled = true;
            } else {
                document.getElementById("mes_js").disabled = false;
            }
        });
    });
</script>
