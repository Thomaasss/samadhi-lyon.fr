<!DOCTYPE html>
<html lang="en">
    <head>
        @include('frontend.layout.head')
        <link rel="stylesheet" href="{{asset('css/custom/index.css')}}">
        @stack('styles')
    </head>
    <body>
    @include('frontend.layout.header')

    @yield('content')

    @include('layout.scripts')
    @stack('scripts')
    @include('layout.cookieBanner')
    @include('layout.session-message')
    @include('frontend.layout.footer')
    @if ($message = Session::get('success'))
        <script>
            $(function() {
                toastr.success("{{ $message }}", "Yeah !", {
                    timeOut: "3000", closeButton: !0
                });
            });
        </script>
    @endif
    @if ($message = Session::get('info'))
        <script>
            $(function() {
                toastr.info("{{ $message }}", "A savoir :", {
                    timeOut: "10000", closeButton: !0
                });
            });
        </script>
    @endif
    @if ($message = Session::get('warning'))
        <script>
            $(function() {
                toastr.warning("{{ $message }}", "Attention !", {
                    timeOut: "5000", closeButton: !0
                });
            });
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            $(function() {
                toastr.error("{{ $message }}", "Oops !", {
                    timeOut: "5000", closeButton: !0
                });
            });
        </script>
    @endif
    @if ($errors->any() === true)
        @foreach ($errors->all() as $error)
            <script>
                $(function() {
                    toastr.error("{{ $error }}", "Oops !", {
                        timeOut: "5000", closeButton: !0
                    });
                });
            </script>
        @endforeach
    @endif
    </body>
</html>

