<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a
                    class="text-gray-500 dark:text-gray-100 hover:text-gray-700 dark:hover:text-white mx-4"
                    href="/backend/yogas"
                >
                    <i class="fa fa-chevron-left"></i>
                </a>
                {{ __($yoga->intitule) }} <small>par <a href="/backend/profs/{{ $yoga->prof->id }}">{{ __($yoga->prof->nom) }}</a></small>
            </h2>
            <div class="flex items-center">
                <a href="/yogas/{{ $yoga->id }}" target="_blank">
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('yogas.update', $yoga) }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                @method('PUT')
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="relative">
                        <div class="flex items-center gap-4">
                            <div class="w-4/12">
                                <label for="name-with-label" class="text-gray-700 required">
                                    Intitulé
                                </label>
                                <input
                                    type="text"
                                    id="name-with-label"
                                    class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    name="intitule"
                                    placeholder="ex : viniyoga"
                                    value="{{ $yoga->intitule }}"
                                />
                            </div>
                            <div class="w-4/12">
                                <label class="text-gray-700 mr-6" for="animals">
                                    Professeur
                                    <select
                                        id="professionnel"
                                        class="w-full select2 my-2 block w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                                        name="professionnel"
                                        data-select2-id="Prof"
                                    >
                                        <option value="0">Aucun professeur</option>
                                        @foreach(App\Models\Professionnel::all()->sortBy('nom') as $prof)
                                            <option value="{{ $prof->id }}" {{ $yoga->professionnel_id == $prof->id ? 'selected' : '' }}>
                                                {{ $prof->nom }}
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
                                            <option value="{{ $tag->id }}" {{ $yoga->tags->contains($tag->id) ? 'selected' : '' }}>
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
                                    <x-backend.filepond-script intitule="Image du cours" source="{{ asset($yoga->image) }}" />
                                </div>
                            </div>

                            <div class="w-8/12">
                                <label for="name-with-label" class="text-gray-700">
                                    Description
                                </label>
                                <textarea class="editable-tiny" name="description" style="width:100%;">
                                    {!! $yoga->description !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="mx-24 mt-4">
                            <label

                                for="toogleA"
                                class="flex items-center cursor-pointer"
                                <!-- toggle -->
                                <div class="relative">
                                    <!-- input -->
                                    <input id="toogleA" type="checkbox" name="for_children" class="sr-only" {{ $yoga->is_for_children ? 'checked' : '' }}/>
                                    <!-- line -->
                                    <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                    <!-- dot -->
                                    <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                </div>
                                <!-- label -->
                                <div class="ml-3 text-gray-700 font-medium">
                                    Pour enfants
                                </div>
                            </label>
                        </div>
                        <div class="p-8 bg-white dark:bg-gray-800 rounded-lg">
                            <p class="text-center text-3xl font-bold text-gray-800 dark:text-white">
                                Icone
                            </p>
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-8 gap-4">
                                <input type="text" id="iconInput" name="icon" value="{{ $yoga->icon_id }}" hidden>
                                @foreach(\App\Models\Icone::all() as $icone)
                                    <div class="p-4 iconSelector" iconId="{{ $icone->id }}" style="cursor:pointer;">
                                        <div class="flex-col  flex justify-center items-center">
                                            <div class="flex-shrink-0">
                                                <a class="block relative rounded-full py-5 px-6 shadow iconSelectedContainer" style="background-color:#d8e4e7;">
                                                    <span class="text-5xl {{ $icone->intitule }}" style="color:#577377;"></span>
                                                    @if($yoga->icon_id === $icone->id)
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
                        </div>

                        <div class="flex flex-nowrap">
                            <x-backend.form-button type="save" />
                            <x-backend.form-button type="delete" />
                        </div>
                    </div>
                </div>
                <x-backend.edit-modal :intitule="$yoga->intitule" objet="yogas" :id="$yoga->id" />
            </form>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(function() {
                $(".iconSelector").click(function() {
                    $('#iconSelected').remove();
                    $(this).find('.iconSelectedContainer').append("<i id='iconSelected' class='fa fa-check absolute rounded-full hover:bg-zen-lightblue-600 bg-zen-lightblue-500 text-white p-1 right-2 -top-2'></i>")
                    $('#iconInput').val($(this).attr('iconId'));
                });
            });
        </script>
    @endpush

</x-app-layout>
