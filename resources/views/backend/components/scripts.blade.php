<script src="{{ asset('dashboard/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/vendorscripts.bundle.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/c3.bundle.js') }}"></script>
<script src="{{ asset('dashboard/assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/index.js') }}"></script>

@yield('javascript')

<script src="{{ asset('dashboard/assets/vendor/sweetalert/sweetalert.min.js') }}"></script><!-- SweetAlert Plugin Js -->

@if (Session::has('success'))
    <script>
        swal("{{ transWord('Success') }}", "{{ transWord('Process is done') }}", "success");
    </script>
@endif

@if (Session::has('failed'))
    <script>
        swal("{{ transWord('Failed') }}", "{{ transWord('Process is failed') }}", "error");
    </script>
@endif

