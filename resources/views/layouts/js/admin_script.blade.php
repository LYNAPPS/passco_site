<!-- plugins:js -->
<script src="{{ url('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ url('assets/admin/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ url('assets/admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ url('assets/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ url('assets/admin/js/dataTables.select.min.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ url('assets/admin/js/off-canvas.js') }}"></script>
<script src="{{ url('assets/admin/js/hoverable-collapse.js') }}"></script>
<script src="{{ url('assets/admin/js/template.js') }}"></script>
<script src="{{ url('assets/admin/js/settings.js') }}"></script>
<script src="{{ url('assets/admin/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ url('assets/admin/js/dashboard.js') }}"></script>
<script src="{{ url('assets/admin/js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->

@include('layouts.js.custom_script')

@stack('scripts')
