<!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 Pharmacy Management .</strong>

    <div class="float-right d-none d-sm-inline-block">
      All rights reserved | Design and Developer by
      <a href="">Pharmacy</a>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('/') }}back-end/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('/') }}back-end/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


<!-- DataTables  & Plugins -->
<script src="{{ asset('/') }}back-end/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/jszip/jszip.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{ asset('/') }}back-end/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>


<!-- Select2 -->
<script src="{{ asset('/') }}back-end/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('/') }}back-end/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<!-- Bootstrap Switch -->
<script src="{{ asset('/') }}back-end/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="{{ asset('/') }}back-end/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{ asset('/') }}back-end/plugins/dropzone/min/dropzone.min.js"></script>

<script src="{{ asset('/') }}back-end/data/jquery.dataTables.min.js"></script>
<script src="{{ asset('/') }}back-end/data/dataTables.bootstrap4.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/') }}back-end/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{ asset('/') }}back-end/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{ asset('/') }}back-end/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ asset('/') }}back-end/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('/') }}back-end/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ asset('/') }}back-end/plugins/moment/moment.min.js"></script>
<script src="{{ asset('/') }}back-end/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('/') }}back-end/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{ asset('/') }}back-end/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/') }}back-end/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/') }}back-end/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/') }}back-end/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/') }}back-end/dist/js/pages/dashboard.js"></script>
<script src="{{ asset('/') }}back-end/data/myscript.js"></script>
@stack('scripts')

<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );

   //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

</script>

</body>
</html>
