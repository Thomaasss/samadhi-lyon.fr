<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Modification de {{ __($prof->nom) }}
            </h2>
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('profs.update', $prof->id) }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($prof->users->first())
                    <div class="bg-zen-brown-100 border-t-4 border-zen-brown-500 rounded-b text-zen-brown-900 px-4 py-3 shadow-md" role="alert">
                        <div class="flex">
                            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                            <div>
                                <p class="font-bold">Vous êtes sur la page d'un(e) professionnel(le)</p>
                                <p class="text-sm">Pour modifier les informations relatives à l'utilisateur <strong>{{ $prof->users->first()->nom }}</strong> (login, mot de passe etc), <a
                                        href="/backend/users/{{ $prof->users->first()->id }}"><strong>cliquez ici</strong></a></p>
                            </div>
                        </div>
                    </div>
                @endif
                @method('PUT')
                @csrf
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" relative ">
                        <label for="nom" class="text-gray-700">
                            Nom
                        </label>
                        <input
                            type="text"
                            id="nom"
                            class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                            name="nom"
                            placeholder="ex : viniyoga"
                            value="{{ $prof->nom }}"
                        />
                        <div class="flex flex-nowrap">
                            <div class="shadow-lg rounded-2xl m-auto w-3/12 pl-2">
                                <div class="p-8">
                                    <x-backend.filepond-script intitule="Image du membre" source="{{ asset($prof->image) }}" />
                                </div>
                            </div>

                            <div class="w-8/12">
                                <label for="name-with-label" class="text-gray-700">
                                    Description
                                </label>
                                <textarea class="editable-tiny" name="description" style="width:100%;">
                                    {!! $prof->description !!}
                                </textarea>
                            </div>
                        </div>
                        <div class="relative flex flex-row gap-2">
                            <div class="w-4/12">
                                <label for="email" class="text-gray-700">
                                    Email
                                </label>
                                <input
                                    type="email"
                                    id="email"
                                    class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    name="email"
                                    value="{{ $prof->email }}"
                                />
                            </div>

                            <div class="w-4/12">
                                <label for="tel" class="text-gray-700">
                                    Tél.
                                </label>
                                <input
                                    type="tel"
                                    id="tel"
                                    class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    name="tel"
                                    value="{{ $prof->tel }}"
                                />
                            </div>

                            <div class="w-4/12">
                                <label for="website" class="text-gray-700">
                                    Site web
                                </label>
                                <input
                                    type="text"
                                    id="website"
                                    class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    name="website"
                                    value="{{ $prof->website }}"
                                />
                            </div>
                        </div>
                        <p class="text-center mt-8 text-3xl font-bold text-gray-800 dark:text-white">
                            Les disciplines de {{ $prof->nom }}
                        </p>
                        <p class="text-center mb-8 text-xl font-normal text-gray-500 dark:text-gray-300">
                            Thérapies et cours de yoga
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-12">
                            @foreach($prof->yogas as $yoga)
                                <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5">
                                    <a href="/backend/yogas/{{ $yoga->id }}">
                                        <img class="rounded-t-lg" src="{{ asset( $yoga->image ) }}" alt="">
                                    </a>
                                    <div class="p-5">
                                        <a href="#">
                                            <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">{{ $yoga->intitule }}</h5>
                                        </a>
                                        <div style="overflow: hidden; text-overflow:ellipsis ellipsis; height:150px;">
                                            <p
                                                class="font-normal text-gray-700"
                                            >
                                                {!! $yoga->description !!}
                                            </p>
                                        </div>
                                        <a
                                            class="mt-3 text-white bg-zen-lightblue-700 hover:bg-zen-lightblue-800 focus:ring-4 focus:ring-zen-lightblue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center"
                                            href="/backend/yogas/{{ $yoga->id }}"
                                        >
                                            Voir la fiche
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                                @foreach($prof->therapies as $yoga)
                                    <div class="bg-white shadow-md border border-gray-200 rounded-lg max-w-sm mb-5">
                                        <a href="/backend/yogas/{{ $yoga->id }}">
                                            <img class="rounded-t-lg" src="{{ asset( $yoga->image ) }}" alt="">
                                        </a>
                                        <div class="p-5">
                                            <a href="#">
                                                <h5 class="text-gray-900 font-bold text-2xl tracking-tight mb-2">{{ $yoga->intitule }}</h5>
                                            </a>
                                            <div style="overflow: hidden; text-overflow:ellipsis ellipsis; height:150px;">
                yo                                <p
                                                    class="font-normal text-gray-700"
                                                >
                                                    {!! $yoga->description !!}
                                                </p>
                                            </div>
                                            <a
                                                class="mt-3 text-white bg-zen-lightblue-700 hover:bg-zen-lightblue-800 focus:ring-4 focus:ring-zen-lightblue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center"
                                                href="/backend/therapies/{{ $yoga->id }}"
                                            >
                                                Voir la fiche
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                        <div class="flex flex-nowrap">
                            <x-backend.form-button type="save" />
                            <x-backend.form-button type="delete" />
                        </div>
                    </div>
                </div>
                <x-backend.edit-modal :intitule="$prof->nom" objet="profs" :id="$prof->id" />
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $( ".iconSelector").click(function() {
                    $('#iconSelected').remove();
                    $(this).find('.iconSelectedContainer').append("<i id='iconSelected' class='fa fa-check absolute rounded-full hover:bg-zen-lightblue-600 bg-zen-lightblue-500 text-white p-1 right-2 -top-2'></i>")
                    $('#iconInput').val($(this).attr('iconId'));
                });

            });
        </script>
    @endpush

</x-app-layout>
