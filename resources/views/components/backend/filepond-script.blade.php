<input
    type="file"
    class="filepond"
    name="image"
    id="filepond"
    accept="image/png, image/jpeg, image/gif"
>
<h1>{{ $intitule }}</h1>
<p class="text-gray-600 text-xs mt-4">
    Formats acceptés : .png, .jpg, .gif
</p>

@push('styles')
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link
        href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet"/>
    <link
        href="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.css"
        rel="stylesheet"
    />

    <style>
        .filepond--drop-label {
            background-color: #97a7a4 !important;
            color: white !important;
        }
        .filepond--image-preview-overlay-success {
            color:#577377;
        }
    </style>
@endpush

@push('scripts')

<!-- Load FilePond library -->
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
<script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>

<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>

<script>
    // We register the plugins required to do
    // image previews, cropping, resizing, etc.
    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImageExifOrientation,
        FilePondPluginImagePreview,
        FilePondPluginImageCrop,
        FilePondPluginImageResize,
        FilePondPluginImageTransform,
        FilePondPluginImageEdit
    );

    // Select the file input and use
    // create() to turn it into a pond
    FilePond.create(
        document.querySelector('input[id="filepond"]'),
        {
            labelIdle: `Faites glisser votre photo ou <span class="filepond--label-action">Cliquez pour parcourir</span>`,
            imagePreviewHeight: 170,
            imageCropAspectRatio: '1:1',
            imageResizeTargetWidth: 200,
            imageResizeTargetHeight: 200,
            stylePanelLayout: 'compact circle',
            styleLoadIndicatorPosition: 'center bottom',
            styleProgressIndicatorPosition: 'right bottom',
            styleButtonRemoveItemPosition: 'left bottom',
            styleButtonProcessItemPosition: 'right bottom',
        }
    );
    FilePond.setOptions({
        server: {
            url : '/upload',
            headers: {
                'X-CSRF-TOKEN' : '{{ csrf_token() }}'
            }
        },
        @if(isset($source))
            files: [
                {
                    source: '{{ $source }}'
                }
            ]
        @endif
    });

    // How to use with Pintura Image Editor:
    // https://pqina.nl/pintura/docs/latest/getting-started/installation/filepond/
</script>
@endpush
