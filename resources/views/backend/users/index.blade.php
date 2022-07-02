<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Utilisateurs') }}
            </h2>
            <a
                href="/backend/users/new"
                class="text-end flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-blue rounded-lg shadow-md hover:bg-zen-blue-600 focus:outline-none focus:ring-2 focus:ring-zen-blue focus:ring-offset-2 focus:ring-offset-zen-blue-200"
            >
                Créer un utilisateur
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="py-8">
                        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                            <h2 class="text-2xl leading-tight">
                                Utilisateurs de la plateforme
                            </h2>
                            <div class="text-end">
                                <form
                                    method="GET"
                                    class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center"
                                >
                                    <div class=" relative ">
                                        <input
                                            name="filter"
                                            type="text"
                                            id="&quot;form-subscribe-Filter"
                                            class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-zen-lightblue-600 focus:border-transparent"
                                            placeholder="Nom/Prénom d'un membre..."
                                            value="{{$filter}}"
                                        />
                                    </div>
                                    <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-blue rounded-lg shadow-md hover:bg-zen-blue-600 focus:outline-none focus:ring-2 focus:ring-zen-blue-500 focus:ring-offset-2 focus:ring-offset-zen-lightblue-200" type="submit">
                                        Filtrer
                                    </button>
                                    <a href="/backend/users" class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-brown-600 rounded-lg shadow-md hover:bg-zen-brown-700 focus:outline-none focus:ring-2 focus:ring-zen-brown-500 focus:ring-offset-2 focus:ring-offset-zen-brown-200" type="submit">
                                        Réinitialiser
                                    </a>
                                </form>
                            </div>
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal" id="datatable">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Nom prénom
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Email
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Lien équipe
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            Dernière modif.
                                        </th>
                                        <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0">
                                                        <a href="#" class="block relative">
                                                            <div class="m-1 mr-2 w-10 h-10 relative flex justify-center items-center rounded-full bg-zen-blue-500 text-xl text-white uppercase">
                                                                {{ $user->name[0] }}
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $user->name }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                @if($user->email)
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        <a href="mailto:{{ $user->email }}" target="_blank">
                                                            {{ $user->email }}
                                                            <sup><i class="fa fa-external-link-alt text-xs"></i></sup>
                                                        </a>
                                                    </p>
                                                @endif
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                @if($user->professionnel)
                                                    <a href="/backend/profs/{{ $user->professionnel_id }}">
                                                        <div class="flex items-center">
                                                            <div class="flex-shrink-0">
                                                                <div class="block relative">
                                                                    @if($user->professionnel->image)
                                                                        <img alt="{{ $user->professionnel->nom }}" src="{{ asset($user->professionnel->image) }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                                                    @else
                                                                        <div class="m-1 mr-2 w-10 h-10 relative flex justify-center items-center rounded-full bg-zen-blue-500 text-xl text-white uppercase">
                                                                            {{ $user->professionnel->nom[0] }}
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="ml-3">
                                                                <p class="text-gray-900 whitespace-no-wrap">
                                                                    {{ $user->professionnel->nom }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @else
                                                    <p>/</p>
                                                @endif
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <span class="text-gray-900 whitespace-no-wrap momentJs description" data-tippy-content="Il y a {{ $user->age }}">
                                                    {{ $user->updated_at }}
                                                </span>
                                            </td>
                                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                <a href="/connectas/{{ $user->id }}" class="text-zen-blue-500 hover:text-zen-blue-900 mx-2">
                                                    <i class="fa fa-sign-in-alt"></i>
                                                </a>
                                                <a href="/backend/users/{{ $user->id }}" class="text-zen-lightblue-600 hover:text-zen-lightblue-900 mx-2">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                @if($user->id !== auth()->user()->id)
                                                    <button
                                                        class="text-zen-brown-600 hover:text-zen-brown-900 mx-2 description"
                                                        type="button"
                                                        data-tippy-content="Supprimer l'utilisateur"
                                                        onclick="toggleModal({{ $user->id }}, '{{ $user->name }}')"
                                                    >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                    <div class="p-2">
                                        {{ $users->links() }}
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                    <x-backend.delete-modal/>
                    @push('scripts')
                        <script type="text/javascript">
                            function toggleModal(id, intitule){
                                document.getElementById('modal-delete').classList.toggle("hidden");
                                document.getElementById("modal-delete-backdrop").classList.toggle("hidden");
                                document.getElementById("modal-delete").classList.toggle("flex");
                                document.getElementById("modal-delete-backdrop").classList.toggle("flex");
                                document.getElementById("delete-modal-intitule").innerHTML = "Suppression " + intitule;
                                document.getElementById("delete-modal-phrase").innerHTML = "Voulez-vous soumettre la suppression de l'utilisateur " + intitule + " ?";
                                $("#delete-modal-link").attr('href', "/users/"+ id +"/delete");
                            }
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
