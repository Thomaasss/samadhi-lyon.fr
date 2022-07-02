<div id="tarifCard-{{ $key }}" class="tarifCard relative m-2 flex flex-col px-4 py-6 bg-white rounded-lg shadow dark:bg-gray-800 sm:px-6 md:px-8 lg:px-10">
    <div class="mt-8">
        <div class="flex flex-col mb-2">
            <div class="flex relative ">
                <span class="rounded-l-md inline-flex  items-center px-3 border-t bg-white border-l border-b  border-gray-300 text-gray-500 shadow-sm text-sm">
                    <i class="fas fa-tag"></i>
                </span>
                <input
                    type="text"
                    id="tarif_intitule_{{ $tarifsList[$key]['intitule'] }}"
                    name="tarif_intitule_{{ $key }}"
                    class="rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    placeholder="Intitulé"
                    value="{{ $tarifsList[$key]['intitule'] }}"
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
                    id="tarif_duree_{{ $key }}"
                    name="tarif_duree_{{ $key }}"
                    class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    placeholder="Durée"
                    value="{{ $tarifsList[$key]['duree'] }}"
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
                    id="tarif_prix_{{ $key }}"
                    name="tarif_prix_{{ $key }}"
                    class=" rounded-r-lg flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                    placeholder="Prix TTC"
                    value="{{ $tarifsList[$key]['prix_ttc'] }}"
                />
            </div>
        </div>
        <label

            for="toogleA_' + foo + '"
            class="flex items-center cursor-pointer"
        >
            <!-- toggle -->
            <div class="relative">
                <!-- input -->
                <input
                    id="toogleA_{{ $key }}"
                    type="checkbox"
                    name="is_devis_{{ $key }}"
                    class="sr-only"
                    {{ $tarifsList[$key]['is_devis'] }}
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
            wire:click="removeTarif($key)"
            class="removeTarif absolute rounded-full hover:bg-zen-brown-600 bg-zen-brown-500 text-white w-12 h-12"
            style="right:50px; bottom:-15px;"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 text-white mx-auto"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>
    </div>
</div>
