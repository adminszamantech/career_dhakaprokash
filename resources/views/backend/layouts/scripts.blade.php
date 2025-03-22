<script src="{{ asset('/storage/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('/storage/assets/vendors/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('/storage/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('/storage/assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('/storage/assets/js/misc.js') }}"></script>
<script src="{{ asset('/storage/assets/js/settings.js') }}"></script>
<script src="{{ asset('/storage/assets/js/todolist.js') }}"></script>
<script src="{{ asset('/storage/assets/js/jquery.cookie.js') }}"></script>
<script src="{{ asset('/storage/assets/js/dashboard.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif
</script>
@stack('admin_js')
