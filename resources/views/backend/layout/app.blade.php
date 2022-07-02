<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title'){{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="{{asset('/plugin/font-awesome/css/fontawesome-all.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('css/icomoon.css')}}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src='https://cdn.tiny.cloud/1/vjb4zbcznrs89cin16v07i37xumvi6933dwfh87opon1dsbm/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
        <script>
            tinymce.init({
                selector: '.editable-tiny',
                language:"fr_FR",
                height: 500,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
        </script>

        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('css/libs/toastr.css') }}" media="all">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <link rel="icon" type="image/png" href="{{asset('images/logo3.png')}}" />

        @stack('styles')
        <style>
            .select2-selection {
                height:40px !important;
                border-color:rgba(209,213,219, 1) !important;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height:40px !important;
            }
            .select2-selection__choice {
                padding-left:35px !important
            }
            .select2-selection__choice__remove {
                top:-5px !important;
            }
            .required:after {
                content:" *";
                color: #C7988D;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('backend.layout.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
                @include('layout.scripts')
                @stack('scripts')
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
            </main>
        </div>
    </body>
</html>
