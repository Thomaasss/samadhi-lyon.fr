<x-app-layout>
    @section('title', 'Avis client • ')
    <x-slot name="header">
        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Avis client') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="py-8">
                        <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                            <h2 class="text-2xl leading-tight">
                                Avis client
                            </h2>
                            @if(count($avis))
                                <div class="text-end">
                                    <form
                                        method="GET"
                                        class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center"
                                    >
                                        <div class="relative">
                                            <input
                                                name="filter"
                                                type="text"
                                                id="&quot;form-subscribe-Filter"
                                                class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-zen-lightblue-600 focus:border-transparent"
                                                placeholder="Avis..."
                                                value="{{$filter}}"
                                            />
                                        </div>
                                        <button class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-blue rounded-lg shadow-md hover:bg-zen-blue-600 focus:outline-none focus:ring-2 focus:ring-zen-lightblue-500 focus:ring-offset-2 focus:ring-offset-zen-lightblue-200" type="submit">
                                            Filtrer
                                        </button>
                                        <a href="/backend/reviews" class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-zen-brown-600 rounded-lg shadow-md hover:bg-zen-brown-700 focus:outline-none focus:ring-2 focus:ring-zen-brown-500 focus:ring-offset-2 focus:ring-offset-zen-brown-200" type="submit">
                                            Réinitialiser
                                        </a>
                                    </form>
                                </div>
                            @endif
                        </div>
                        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                            @if(count($avis))
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal" id="datatable">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">

                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                Avis
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                Nom & prénom
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                Discipline
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                Posté le
                                            </th>
                                            <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($avis as $avi)
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <a
                                                        href="{{ route('reviews.backend.switchValidation', $avi->id) }}"
                                                        class="text-gray-900 whitespace-no-wrap flex items-center"
                                                    >
                                                            @if($avi->is_active)
                                                                <span
                                                                    class="mb-1 description"
                                                                    data-tippy-content="Témoignage validé"
                                                                >
                                                                    <i class="fa fa-check-circle text-zen-lightblue"></i>
                                                                </span>
                                                            @else
                                                                <span
                                                                    class="mb-1 description"
                                                                    data-tippy-content="Témoignage en attente"
                                                                >
                                                                    <i class="fa fa-clock text-zen-brown"></i>
                                                                </span>
                                                            @endif
                                                    </a>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <a href="/backend/reviews/{{ $avi->id }}" class="text-gray-900 whitespace-no-wrap flex items-center">
                                                        <span class="mb-1">{{ $avi->message }}</span>
                                                    </a>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $avi->nom }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <div class="ml-3">
                                                        <p class="text-gray-900 whitespace-no-wrap">
                                                            {{ $avi->disciplineObj->intitule }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <span class="text-gray-900 whitespace-no-wrap momentJs description" data-tippy-content="Il y a {{ $avi->age }}">
                                                        {{ $avi->updated_at }}
                                                    </span>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white">
                                                    <div class="flex item-center justify-center">
                                                        <div
                                                            class="w-4 mr-2 transform hover:text-zen-lightblue-500 hover:scale-110 description"
                                                            data-tippy-content="Voir le témoignage"
                                                        >
                                                            <a
                                                                href="/backend/reviews/{{ $avi->id }}"
                                                            >
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        @if($avi->is_active)
                                                            <div
                                                                class="w-4 mr-2 transform hover:text-zen-blue-500 hover:scale-110 description"
                                                                data-tippy-content="Invalider le témoignage"
                                                            >
                                                                <a
                                                                    href="{{ route('reviews.backend.switchValidation', $avi->id) }}"
                                                                >
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        @else
                                                            <div
                                                                class="w-4 mr-2 transform hover:text-zen-blue-500 hover:scale-110 description"
                                                                data-tippy-content="Valider le témoignage"
                                                            >
                                                                <a
                                                                    href="{{ route('reviews.backend.switchValidation', $avi->id) }}"
                                                                >
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        <button
                                                            type="button"
                                                            onclick="toggleModal({{ $avi->id }}, '{{ $avi->nom }}')"
                                                            class="w-4 mr-2 transform hover:text-zen-brown-500 hover:scale-110 description"
                                                            data-tippy-content="Supprimer le témoignage"
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
                                            {{ $avis->links() }}
                                        </div>
                                    </table>
                                </div>
                            @else
                                <p>Aucun avis disponible</p>
                            @endif
                        </div>
                    </div>
                    <x-backend.delete-modal/>
                    @push('scripts')
                        <script type="text/javascript">
                            function toggleModal(id, intitule){
                                console.log(id, intitule)
                                document.getElementById('modal-delete').classList.toggle("hidden");
                                document.getElementById("modal-delete-backdrop").classList.toggle("hidden");
                                document.getElementById("modal-delete").classList.toggle("flex");
                                document.getElementById("modal-delete-backdrop").classList.toggle("flex");
                                document.getElementById("delete-modal-intitule").innerHTML = "Suppression témoignage de " + intitule;
                                document.getElementById("delete-modal-phrase").innerHTML = "Voulez-vous soumettre la suppression du témoignage de " + intitule + " ?";
                                $("#delete-modal-link").attr('href', "/reviews/"+ id +"/delete");
                            }
                        </script>
                    @endpush
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
