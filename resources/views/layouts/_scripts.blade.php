<!-- REQUIRED JS SCRIPTS -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!--untuk data table -->
<script src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<!--End untuk data table -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/selectize.min.js') }}"></script>
<script src="{{ asset('js/apps.js') }}"></script>
@yield('scripts')
<script src="{{asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('js/sweetalert2.min.js') }}"></script>
{{-- <script src="{{ asset('js/marquee.js') }}"></script> --}}
<!-- page script -->
@stack('req-scripts')
@stack('custom-scripts')