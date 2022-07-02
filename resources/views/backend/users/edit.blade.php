<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Modification de l\'utilisateur '. $user->name) }}
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
            <form method="POST" action="{{ route('users.update', $user->id) }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if($user->professionnel)
                    @if(auth()->user()->is_admin || $user->id == auth()->user()->id)
                        <div class="bg-zen-brown-100 border-t-4 border-zen-brown-500 rounded-b text-zen-brown-900 px-4 py-3 shadow-md" role="alert">
                            <div class="flex">
                                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                                <div>
                                    <p class="font-bold">Vous êtes sur la page d'un(e) utilisateur</p>
                                    <p class="text-sm">Pour modifier les informations relatives à {{ $user->professionnel->nom }} visibles sur le site web, <a
                                            href="/backend/profs/{{ $user->professionnel_id }}"><strong>cliquez ici</strong></a></p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                @csrf
                @method('PUT')
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex flex-nowrap">
                        @if(auth()->user()->is_admin && $user->id !== auth()->user()->id)
                            <div class="overflow-hidden shadow-lg rounded w-3/12 m-auto mr-4">
                                <div class="bg-gray-100 w-full p-4 relative">
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
                                            <input id="toogleA" type="checkbox" name="is_admin" {{ $user->is_admin == 1 ? 'checked' : '' }} class="sr-only" />
                                            <!-- line -->
                                            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                            <!-- dot -->
                                            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        @endif

                        <div class="w-8/12 flex-grow">
                            <div class="relative flex flex-row gap-2">
                                <div class="w-4/12">
                                    <label for="nom" class="text-gray-700">
                                        Nom
                                    </label>
                                    <input
                                        type="text"
                                        id="nom"
                                        required
                                        class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        name="nom"
                                        value="{{ $user->name }}"
                                    />
                                </div>

                                <div class="w-4/12">
                                    <label for="email" class="text-gray-700">
                                        Email
                                    </label>
                                    <input
                                        disabled
                                        type="email"
                                        id="email"
                                        required
                                        class="my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-gray-200 text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        name="email"
                                        value="{{ $user->email }}"
                                    />
                                </div>
                                <label class="w-4/12 text-gray-700" for="professionnel">
                                    Membre de l'équipe
                                    <select
                                        id="professionnel"
                                        {{ auth()->user()->is_admin ? '' : 'disabled' }}
                                        class="cursor-pointer my-2 rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                        name="professionnel"
                                        data-select2-id="Prof"
                                    >
                                        <option value="0" selected>
                                            __
                                        </option>
                                        @foreach(App\Models\Professionnel::all()->sortBy('nom') as $prof)
                                            <option value="{{ $prof->id }}" {{ $user->professionnel_id == $prof->id ? 'selected' : '' }}>
                                                {{ $prof->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="relative flex flex-row gap-2">
                                <div class="w-6/12">
                                    <label for="password" class="text-gray-700">
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
                                    <label for="password_confirmation" class="text-gray-700">
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
                        <x-backend.form-button type="delete" />
                    </div>
                </div>
                <x-backend.edit-modal :intitule="$user->name" objet="users" :id="$user->id" />
            </form>
        </div>
    </div>
</x-app-layout>
