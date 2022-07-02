<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __("Création d'un nouveau membre") }}
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('profs.store') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class=" relative ">
                        <div class="relative flex flex-row gap-2">
                            <div class="form-group w-6/12">
                                <label for="name-with-label" class="text-gray-700 required">
                                    Nom
                                </label>
                                <input
                                    type="text"
                                    id="name-with-label"
                                    required
                                    class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    name="nom"
                                    placeholder="ex : Valérie Fenet"
                                />
                            </div>
                            <label class="w-6/12 text-gray-700" for="user">
                                Utilisateur associé
                                <select
                                    id="user"
                                    class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    name="user"
                                    data-select2-id="Prof"
                                >
                                    <option value="0" selected>
                                        __
                                    </option>
                                    @foreach(App\Models\User::all()->sortBy('name') as $user)
                                        <option value="{{ $user->id }}">
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="flex flex-nowrap">
                            <div class="shadow-lg rounded-2xl m-auto w-3/12 pl-2">
                                <div class="p-8">
                                    <x-backend.filepond-script intitule="Image du membre" />
                                </div>
                            </div>

                            <div class="w-8/12">
                                <label for="name-with-label" class="text-gray-700">
                                    Description
                                </label>
                                <textarea class="editable-tiny" name="description" style="width:100%;">
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
                                />
                            </div>
                        </div>

                        <div class="flex flex-nowrap">
                            <x-backend.form-button type="save" />
                        </div>
                    </div>
                </div>
                <x-backend.create-modal intitule="un nouveau membre" />
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                $( ".iconSelector" ).click(function() {
                    $('#iconSelected').remove();
                    $(this).find('.iconSelectedContainer').append("<i id='iconSelected' class='fa fa-check absolute rounded-full hover:bg-zen-lightblue-600 bg-zen-lightblue-500 text-white p-1 right-2 -top-2'></i>")
                    $('#iconInput').val($(this).attr('iconId'));
                });

            });
        </script>
    @endpush

</x-app-layout>
