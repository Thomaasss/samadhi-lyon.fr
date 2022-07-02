<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Création d\'un utilisateur ') }}
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
            <form method="POST" action="{{ route('users.store') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @csrf
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-nowrap">
                        @if(auth()->user()->is_admin)
                            <div class="overflow-hidden shadow-lg rounded-2xl w-3/12 m-auto">
                                <div class="bg-white w-full p-4 relative">
                                    <!-- label -->
                                    <div class="ml-3 text-gray-700 font-medium">
                                        Administrateur ?
                                    </div>
                                    <p class="text-gray-600 text-xs mt-4 mb-5">
                                        Attention : l'administrateur a accès à l'intégralité de la plateforme.
                                    </p>
                                    <label
                                        for="toogleA"
                                        class="flex items-center cursor-pointer"
                                    >
                                        <!-- toggle -->
                                        <div class="relative">
                                            <!-- input -->
                                            <input id="toogleA" type="checkbox" name="is_admin" class="sr-only" />
                                            <!-- line -->
                                            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                            <!-- dot -->
                                            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        @endif

                        <div class="w-8/12">
                            <div class="relative flex flex-row gap-2">
                                <div class="w-4/12">
                                    <label for="nom" class="required text-gray-700">
                                        Nom
                                    </label>
                                    <input
                                        type="text"
                                        id="nom"
                                        required
                                        class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        name="nom"
                                        value=""
                                    />
                                </div>

                                <div class="w-4/12">
                                    <label for="email" class="required text-gray-700">
                                        Email
                                    </label>
                                    <input
                                        type="email"
                                        id="email"
                                        required
                                        class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        name="email"
                                        value=""
                                    />
                                </div>

                                <label class="w-4/12 text-gray-700" for="professionnel">
                                    Membre de l'équipe
                                    <select
                                        id="professionnel"
                                        class="cursor-pointer my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        name="professionnel"
                                        data-select2-id="Prof"
                                    >
                                        <option value="0" selected>
                                            __
                                        </option>
                                        @foreach(App\Models\Professionnel::all()->sortBy('nom') as $prof)
                                            <option value="{{ $prof->id }}">
                                                {{ $prof->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="relative flex flex-row gap-2">
                                <div class="w-6/12">
                                    <label for="password" class="text-gray-700 required">
                                        Mot de passe
                                    </label>
                                    <input
                                        type="password"
                                        id="password"
                                        autocomplete="new-password"
                                        class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        name="password"
                                    />
                                </div>

                                <div class="w-6/12">
                                    <label for="password_confirmation" class="text-gray-700 required">
                                        Confirmation
                                    </label>
                                    <input
                                        type="password"
                                        id="password_confirmation"
                                        autocomplete="new-password"
                                        class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        name="password_confirmation"
                                    />
                                </div>
                            </div>
                            <p class="text-gray-600 text-xs mb-5">
                                Pour changer de mot de passe, remplissez les deux champs ci-dessus.
                            </p>
                        </div>
                    </div>
                    <div class="flex flex-nowrap">
                        <x-backend.form-button type="save" />
                    </div>
                </div>
                <x-backend.create-modal intitule="un nouvel utilisateur" />
            </form>
        </div>
    </div>

</x-app-layout>
