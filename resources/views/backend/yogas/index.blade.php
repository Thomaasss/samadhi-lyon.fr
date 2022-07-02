<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Cours de Yoga') }}
            </h2>
            @if(auth()->user()->is_admin)
                <a
                    href="/backend/yogas/new"
                    class="text-end flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-blue rounded-lg shadow-md hover:bg-zen-blue-600 focus:outline-none focus:ring-2 focus:ring-zen-lightblue-500 focus:ring-offset-2 focus:ring-offset-zen-lightblue-200"
                    type="submit"
                >
                    Créer un cours de yoga
                </a>
            @endif
        </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                        <div class="py-8">
                            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                                <h2 class="text-2xl leading-tight">
                                    Cours de Yoga
                                </h2>
                                @if(count($yogas))
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
                                                    placeholder="Intitulé d'un cours..."
                                                    value="{{$filter}}"
                                                />
                                            </div>
                                            <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-blue rounded-lg shadow-md hover:bg-zen-blue-600 focus:outline-none focus:ring-2 focus:ring-zen-blue-400 focus:ring-offset-2 focus:ring-offset-zen-blue-200" type="submit">
                                                Filtrer
                                            </button>
                                            <a href="/backend/yogas" class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-brown-600 rounded-lg shadow-md hover:bg-zen-brown-700 focus:outline-none focus:ring-2 focus:ring-zen-brown-500 focus:ring-offset-2 focus:ring-offset-zen-brown-200" type="submit">
                                                Réinitialiser
                                            </a>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                @if(count($yogas))
                                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                        <table class="min-w-full leading-normal" id="datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                        Cours
                                                    </th>
                                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                        Professeur
                                                    </th>
                                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                        Dernière modif.
                                                    </th>
                                                    <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($yogas as $yoga)
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <a href="/backend/yogas/{{ $yoga->id }}" class="text-gray-900 whitespace-no-wrap flex items-center">
                                                        <span class="relative inline-block px-3 py-1 font-semibold text-zen-lightblue-900 leading-tight py-2 mr-4">
                                                            <span
                                                                aria-hidden="true"
                                                                class="absolute inset-0 opacity-50 rounded-full"
                                                                style="background-color:#d8e4e7;"
                                                            >
                                                            </span>
                                                            <span class="relative">
                                                                <span class="text-3xl {{ $yoga->icone->intitule }}" style="color:#577377;"></span>
                                                            </span>
                                                        </span>
                                                        <span class="mb-1">{{ $yoga->intitule }}</span>
                                                    </a>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <a class="flex items-center" href="/backend/profs/{{ $yoga->professionnel_id }}">
                                                        <div class="flex-shrink-0">
                                                            <div class="block relative">
                                                                @if($yoga->prof->image)
                                                                    <img alt="profil" src="{{ asset($yoga->prof->image) }}" class="mx-auto object-cover rounded-full h-10 w-10 "/>
                                                                @else
                                                                    <div class="m-1 mr-2 w-10 h-10 relative flex justify-center items-center rounded-full bg-blue-500 text-xl text-white uppercase">
                                                                        {{ $yoga->prof->nom[0] }}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="ml-3">
                                                            <p class="text-gray-900 whitespace-no-wrap">
                                                                {{ $yoga->prof->nom }}
                                                            </p>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <span class="text-gray-900 whitespace-no-wrap momentJs description" data-tippy-content="Il y a {{ $yoga->age }}">
                                                        {{ $yoga->updated_at }}
                                                    </span>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="flex item-center justify-center">
                                                        <div
                                                            class="w-4 mr-2 transform hover:text-zen-lightblue-500 hover:scale-110"
                                                        >
                                                            <a
                                                                class="description"
                                                                data-tippy-content="Editer la fiche"
                                                                href="/backend/yogas/{{ $yoga->id }}"
                                                            >
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <button
                                                            type="button"
                                                            data-tippy-content="Supprimer la fiche"
                                                            onclick="toggleModal({{ $yoga->id }}, '{{ $yoga->intitule }}')"
                                                            class="description w-4 mr-2 transform hover:text-zen-brown-500 hover:scale-110"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            <div class="p-2">
                                                {{ $yogas->links() }}
                                            </div>
                                        </table>
                                    </div>
                                @else
                                    <p>Aucune thérapie disponible</p>
                                @endif
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
                                    document.getElementById("delete-modal-phrase").innerHTML = "Voulez-vous soumettre la suppression du cours de yoga " + intitule + " ?";
                                    $("#delete-modal-link").attr('href', "/yogas/"+ id +"/delete");
                                }
                            </script>
                        @endpush
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
