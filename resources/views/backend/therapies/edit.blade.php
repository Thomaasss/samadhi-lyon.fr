<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a
                    class="text-gray-500 dark:text-gray-100 hover:text-gray-700 dark:hover:text-white mx-4"
                    href="/backend/therapies"
                >
                    <i class="fa fa-chevron-left"></i>
                </a>
                {{ __($therapie->intitule) }} <a href="/backend/profs/{{ $therapie->professionnel_id }}"><small>par {{ __($therapie->prof->nom) }}</small></a>
            </h2>
            <div class="flex items-center">
                <a href="/therapies/{{ $therapie->id }}" target="_blank">
                    <button type="button" class="border py-2 px-4 flex justify-center items-center bg-white hover:bg-gray-100 text-black w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md rounded-lg ">
                        <i class="fa fa-eye"></i>&nbsp
                        Voir sur Samadhi
                    </button>
                </a>
            </div>
        </div>
    </x-slot>
    @push('styles')
        <style>
            /* Toggle A */
            input:checked ~ .dot {
                transform: translateX(100%);
                background-color: #48bb78;
            }
        </style>
    @endpush
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" enctype="multipart/form-data" action="{{ route('therapies.update', $therapie->id) }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @method('PUT')
                @csrf
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" relative ">
                        <div class="flex items-center gap-4">
                            <div class="w-4/12">
                                <label for="name-with-label" class="text-gray-700">
                                    Intitulé
                                </label>
                                <input
                                    type="text"
                                    id="name-with-label"
                                    class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    name="intitule"
                                    placeholder="ex : viniyoga"
                                    value="{{ $therapie->intitule }}"
                                />
                            </div>
                            <div class="w-4/12">
                                <label class="text-gray-700 mr-6" for="animals">
                                    Thérapeute
                                    <select
                                        id="professionnel"
                                        {{ auth()->user()->is_admin ? '' : 'disabled' }}
                                        class="w-full select2 my-2 block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                        name="professionnel"
                                        data-select2-id="Prof"
                                    >
                                        @foreach(App\Models\Professionnel::all()->sortBy('nom') as $prof)
                                            <option value="{{ $prof->id }}" {{ $therapie->professionnel_id == $prof->id ? 'selected' : '' }}>
                                                {{ $prof->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="w-4/12">
                                <label class="text-gray-700 mr-6" for="categorie">
                                    Catégorie
                                    <select
                                        id="categorie"
                                        {{ auth()->user()->is_admin ? '' : 'disabled' }}
                                        class="w-full select2 my-2 block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                        name="categorie"
                                        data-select2-id="Categorie"
                                    >
                                        <option value="0">
                                            Aucune catégorie
                                        </option>
                                        @foreach(App\Models\TherapieCategorie::all()->sortBy('title') as $categorie)
                                            <option value="{{ $categorie->id }}" {{ $therapie->categorie_id == $categorie->id ? 'selected' : '' }}>
                                                {{ $categorie->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="w-4/12">
                                <label class="text-gray-700 mr-6" for="tags">
                                    Tags
                                    <select
                                        id="tags"
                                        multiple
                                        class="w-full select2 my-2 block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                        name="tags[]"
                                        data-select2-id="tags"
                                    >
                                        @foreach(\App\Models\Tag::all() as $tag)
                                            <option value="{{ $tag->id }}" {{ $therapie->tags->contains($tag->id) ? 'selected' : '' }}>
                                                {{ $tag->intitule }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="flex flex-nowrap">
                            <div class="shadow-lg rounded-2xl m-auto w-3/12 pl-2">
                                <div class="p-8">
                                    <x-backend.filepond-script intitule="Image de la thérapie" source="{{ asset($therapie->image) }}" />
                                </div>
                            </div>

                            <div class="w-8/12">
                                <label for="name-with-label" class="text-gray-700">
                                    Description
                                </label>
                                <div class="mx-auto my-2">
                                    <textarea class="editable-tiny" name="description" style="width:100%;">
                                        {!! $therapie->description !!}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="p-8 bg-white dark:bg-gray-800 rounded-lg">
                            <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                                Icone
                            </p>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-8 gap-4">
                                <input type="text" id="iconInput" name="icon" value="{{ $therapie->icon_id }}" hidden>
                                @foreach(\App\Models\Icone::all() as $icone)
                                    <div class="p-4 iconSelector cursor-pointer" iconId="{{ $icone->id }}">
                                        <div class="flex-col  flex justify-center items-center">
                                            <div class="flex-shrink-0">
                                                <a class="block relative rounded-full py-5 px-6 shadow iconSelectedContainer" style="background-color:#d8e4e7;">
                                                    <span class="text-5xl {{ $icone->intitule }}" style="color:#577377;"></span>
                                                    @if($therapie->icon_id === $icone->id)
                                                        <i
                                                            id="iconSelected"
                                                            class="fa fa-check absolute rounded-full hover:bg-zen-blue-600 bg-zen-blue-500 text-white p-1 right-2 -top-2"
                                                        ></i>
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="mt-2 text-center flex flex-col">
                                                    <span class="text-gray-600 dark:text-white text-lg font-medium">
                                                        {{ $icone->intitule }}
                                                    </span>
                                                <span class="text-gray-400 text-xs">
                                                        {{ $icone->pack }}
                                                    </span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="p-8 bg-white dark:bg-gray-800 rounded-lg relative">
                                <button
                                    aria-label="Ajouter un tarif"
                                    type="button"
                                    class="absolute addTarif rounded-full hover:bg-zen-blue-600 bg-zen-blue-500 text-white w-12 h-12"
                                    id="addTarif"
                                    style="right:35px; top:30px;"
                                >
                                    <i class="fa fa-plus"></i>
                                </button>
                                <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                                    Tarifs
                                </p>
                                <div id="tarifsContainer" class="grid grid-cols-2 mt-4">
                                    @foreach($therapie->tarifs as $tarif)
                                            <div id="tarifCard-{{ $loop->index }}" class="tarifCard relative m-2 flex flex-col px-4 py-6 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
                                                <div class="mt-8">
                                                    <div class="flex flex-col mb-2">
                                                        <div class="flex relative ">
                                                            <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                                                                <i class="fas fa-tag"></i>
                                                            </span>
                                                            <input
                                                                type="text"
                                                                id="tarif_intitule_{{ $loop->index }}"
                                                                name="tarif_intitule_{{ $loop->index }}"
                                                                key="{{ $loop->index }}"
                                                                id="sign-in-email"
                                                                class="rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                                placeholder="Intitulé"
                                                                value="{{ $tarif->intitule }}"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col mb-2">
                                                        <div class="flex relative ">
                                                            <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                                                                <i class="far fa-clock"></i>
                                                            </span>
                                                            <input
                                                                type="text"
                                                                id="tarif_duree_{{ $loop->index }}"
                                                                name="tarif_duree_{{ $loop->index }}"
                                                                key="{{ $loop->index }}"
                                                                class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                                placeholder="Durée"
                                                                value="{{ $tarif->duree }}"
                                                            />
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col mb-4">
                                                        <div class="flex relative ">
                                                            <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                                                                <i class="fas fa-euro-sign"></i> &nbsp; TTC
                                                            </span>
                                                            <input
                                                                type="text"
                                                                id="tarif_prix_{{ $loop->index }}"
                                                                name="tarif_prix_{{ $loop->index }}"
                                                                key="{{ $loop->index }}"
                                                                class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                                                placeholder="Prix TTC"
                                                                value="{{ $tarif->prix_ttc }}"
                                                            />
                                                        </div>
                                                    </div>
                                                    <label
                                                        for="toogleA_{{ $loop->index }}"
                                                        class="flex items-center cursor-pointer"
                                                    >
                                                        <!-- toggle -->
                                                        <div class="relative">
                                                            <!-- input -->
                                                            <input
                                                                id="toogleA_{{ $loop->index }}"
                                                                type="checkbox"
                                                                name="is_devis_{{ $loop->index }}"
                                                                class="sr-only"
                                                                {{ $tarif->is_devis == 1 ? 'checked' : '' }}
                                                            />
                                                            <!-- line -->
                                                            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                                            <!-- dot -->
                                                            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                                        </div>
                                                        <!-- label -->
                                                        <div class="ml-3 text-gray-700 font-medium">
                                                            Sur devis
                                                        </div>
                                                    </label>
                                                    <button
                                                        aria-label="Supprimer le tarif"
                                                        type="button"
                                                        class="removeTarif absolute rounded-full hover:bg-zen-brown-600 bg-zen-brown-500 text-white w-12 h-12"
                                                        style="right:50px; bottom:-15px;"
                                                        cardId="{{ $loop->index }}"
                                                    >
                                                        <svg
                                                            cardId="{{ $loop->index }}"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            class="h-6 w-6 text-white mx-auto"
                                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path cardId="{{ $loop->index }}"stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-nowrap">
                            <x-backend.form-button type="save" />
                            <x-backend.form-button type="delete" />
                        </div>
                    </div>
                </div>
                <x-backend.edit-modal :intitule="$therapie->intitule" objet="therapies" :id="$therapie->id" />
            </form>
        </div>
    </div>

    @push('scripts')
         <script>
            $(function() {
                let foo = {{ count($therapie->tarifs) == 0 ? 0 : count($therapie->tarifs) }};
                $( ".iconSelector" ).click(function() {
                    $('#iconSelected').remove();
                    $(this).find('.iconSelectedContainer').append("<i id='iconSelected' class='fa fa-check absolute rounded-full hover:bg-zen-blue-600 bg-zen-blue-500 text-white p-1 right-2 -top-2'></i>")
                    $('#iconInput').val($(this).attr('iconId'));
                });

                $( "#addTarif").click(function() {
                    if (foo < 10) {
                        $('#tarif_nb').val(foo)
                        $('#tarifsContainer').append('<div id="tarifCard-' + foo + '" class="tarifCard relative m-2 flex flex-col px-4 py-6 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">\n' +
                            '                                                <div class="mt-8">\n' +
                            '                                                    <div class="flex flex-col mb-2">\n' +
                            '                                                        <div class="flex relative ">\n' +
                            '                                                            <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">\n' +
                            '                                                                <i class="fas fa-tag"></i>\n' +
                            '                                                            </span>\n' +
                            '                                                            <input\n' +
                            '                                                                type="text"\n' +
                            '                                                                id="tarif_intitule_' + foo + '"\n' +
                            '                                                                name="tarif_intitule_' + foo + '"\n' +
                            '                                                                key="' + foo + '"\n' +
                            '                                                                class="tarifInput rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"\n' +
                            '                                                                placeholder="Intitulé"\n' +
                            '                                                                value=""\n' +
                            '                                                            />\n' +
                            '                                                        </div>\n' +
                            '                                                    </div>\n' +
                            '                                                    <div class="flex flex-col mb-2">\n' +
                            '                                                        <div class="flex relative ">\n' +
                            '                                                            <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">\n' +
                            '                                                                <i class="far fa-clock"></i>\n' +
                            '                                                            </span>\n' +
                            '                                                            <input\n' +
                            '                                                                type="text"\n' +
                            '                                                                id="tarif_duree_' + foo + '"\n' +
                            '                                                                name="tarif_duree_' + foo + '"\n' +
                            '                                                                key="' + foo + '"\n' +
                            '                                                                class="tarifInput rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"\n' +
                            '                                                                placeholder="Durée"\n' +
                            '                                                                value=""\n' +
                            '                                                            />\n' +
                            '                                                        </div>\n' +
                            '                                                    </div>\n' +
                            '                                                    <div class="flex flex-col mb-4">\n' +
                            '                                                        <div class="flex relative ">\n' +
                            '                                                            <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">\n' +
                            '                                                                <i class="fas fa-euro-sign"></i> &nbsp; TTC\n' +
                            '                                                            </span>\n' +
                            '                                                            <input\n' +
                            '                                                                type="text"\n' +
                            '                                                                id="tarif_prix_' + foo + '"\n' +
                            '                                                                name="tarif_prix_' + foo + '"\n' +
                            '                                                                key="' + foo + '"\n' +
                            '                                                                class="tarifInput rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"\n' +
                            '                                                                placeholder="Prix TTC"\n' +
                            '                                                                value=""\n' +
                            '                                                            />\n' +
                            '                                                        </div>\n' +
                            '                                                    </div>\n' +
                            '                                                    <label\n' +
                            '\n' +
                            '                                                        for="toogleA_' + foo + '"\n' +
                            '                                                        class="flex items-center cursor-pointer"\n' +
                            '                                                    >\n' +
                            '                                                        <!-- toggle -->\n' +
                            '                                                        <div class="relative">\n' +
                            '                                                            <!-- input -->\n' +
                            '                                                            <input id="toogleA_' + foo + '" type="checkbox" name="is_devis_' + foo + '" class="sr-only" />\n' +
                            '                                                            <!-- line -->\n' +
                            '                                                            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>\n' +
                            '                                                            <!-- dot -->\n' +
                            '                                                            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>\n' +
                            '                                                        </div>\n' +
                            '                                                        <!-- label -->\n' +
                            '                                                        <div class="ml-3 text-gray-700 font-medium">\n' +
                            '                                                            Sur devis\n' +
                            '                                                        </div>\n' +
                            '                                                    </label>\n' +
                            '                                                    <button\n' +
                            '                                                        aria-label="Supprimer le tarif"\n' +
                            '                                                        type="button"\n' +
                            '                                                        class="removeTarif absolute rounded-full hover:bg-zen-brown-600 bg-zen-brown-500 text-white w-12 h-12"\n' +
                            '                                                        style="right:50px; bottom:-15px;"\n' +
                            '                                                        cardId="' + foo + '"\n' +
                            '                                                    >\n' +
                            '                                                        <svg ' +
                            '                                                            cardId="' + foo + '"\n' +
'                                                                                        xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">\n' +
                            '                                                            <path cardId="' + foo + '" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />\n' +
                            '                                                        </svg>\n' +
                            '                                                    </button>\n' +
                            '                                                </div>\n' +
                            '                                            </div>')
                        foo = foo + 1
                    }
                });
            });

            $(document).on('click', $(".removeTarif"), function(e) {
                $('#tarifCard-'+e.target.attributes.cardid.value).remove();
            });
        </script>
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
                files: [
                    {
                        source: '{{ asset($therapie->image) }}'
                    }
                ]
            });

            // How to use with Pintura Image Editor:
            // https://pqina.nl/pintura/docs/latest/getting-started/installation/filepond/
        </script>
    @endpush

</x-app-layout>
