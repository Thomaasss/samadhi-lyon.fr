@if ($message = Session::get('success'))
    @push('scripts')
        <script>
            $(function() {
                toastr.success("{{ $message }}", "Yeah !", {
                    timeOut: "3000", closeButton: !0
                });
            });
        </script>
    @endpush
@endif
@if ($message = Session::get('info'))
    @push('scripts')
        <script>
            $(function() {
                toastr.info("{{ $message }}", "A savoir :", {
                    timeOut: "10000", closeButton: !0
                });
            });
        </script>
    @endpush
@endif
@if ($message = Session::get('warning'))
    @push('scripts')
        <script>
            $(function() {
                toastr.warning("{{ $message }}", "Attention !", {
                    timeOut: "5000", closeButton: !0
                });
            });
        </script>
    @endpush
@endif
@if ($message = Session::get('error'))
    @push('scripts')
        <script>
            $(function() {
                toastr.error("{{ $message }}", "Oops !", {
                    timeOut: "5000", closeButton: !0
                });
            });
        </script>
    @endpush
@endif
@if ($errors->any() === true)
    @push('scripts')
        @foreach ($errors->all() as $error)
                <script>
                    $(function() {
                        toastr.error("{{ $error }}", "Oops !", {
                            timeOut: "5000", closeButton: !0
                        });
                    });
                </script>
        @endforeach
    @endpush
@endif
