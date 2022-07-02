<div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer">
    <div class="bg-gray-50 dark:bg-gray-800 w-full p-4 relative">
        <button
            class="absolute right-0 hover:bg-algoe-orange-400 bg-algoe-orange text-white font-bold uppercase text-xs px-3 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 transition-all"
            type="button"
            wire:click="removeQuestion({{ $chapKey }}, {{ $key }})"
        >
            <i class="fas fa-minus"></i>
        </button>
        <div class="w-full mb-3 mt-3">
            <label class="required block uppercase tracking-wide text-algoe-blue text-xs font-bold mb-2" for="chap_{{ $chapKey }}_libelle_{{ $key }}">
                Libellé
            </label>
            <input
                class="appearance-none block w-full bg-white text-algoe-blue border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="chap_{{ $chapKey }}_libelle_{{ $key }}"
                type="text"
                required
                placeholder="Question..."
                wire:model.lazy="chapitreList.{{ $chapKey }}.questionList.{{ $key }}.libelle"
            >
        </div>
        <div class="flex flex-row mb-3">
            <div class="w-6/12">
                <label class="required block uppercase tracking-wide text-algoe-blue text-xs font-bold mb-2">
                    Echelle
                </label>
                <div class="mt-2">
                    <label class="inline-flex items-center" for="chap_{{ $chapKey }}_echelle_{{ $key }}_avec">
                        <input
                            type="radio"
                            class="form-radio"
                            value="avec"
                            id="chap_{{ $chapKey }}_echelle_{{ $key }}_avec"
                            wire:model.lazy="chapitreList.{{ $chapKey }}.questionList.{{ $key }}.echelle"
                        >
                        <span class="ml-2">Avec</span>
                    </label>
                    <label class="inline-flex items-center ml-2" for="chap_{{ $chapKey }}_echelle_{{ $key }}_sans">
                        <input
                            type="radio"
                            class="form-radio"
                            id="chap_{{ $chapKey }}_echelle_{{ $key }}_sans"
                            value="sans"
                            wire:model.lazy="chapitreList.{{ $chapKey }}.questionList.{{ $key }}.echelle"
                        >
                        <span class="ml-2">Sans</span>
                    </label>
                </div>
            </div>
            <div class="w-6/12">
                <label class="required block uppercase tracking-wide text-algoe-blue text-xs font-bold mb-2" for="chap_{{ $chapKey }}_commentaires_{{ $key }}">
                    Commentaires
                </label>
                <div class="mt-2">
                    <label class="inline-flex items-center" for="chap_{{ $chapKey }}_commentaires_{{ $key }}_avec">
                        <input
                            type="radio"
                            class="form-radio"
                            value="avec"
                            id="chap_{{ $chapKey }}_commentaires_{{ $key }}_avec"
                            wire:model.lazy="chapitreList.{{ $chapKey }}.questionList.{{ $key }}.commentaires"
                        >
                        <span class="ml-2">Avec</span>
                    </label>
                    <label class="inline-flex items-center ml-2" for="chap_{{ $chapKey }}_commentaires_{{ $key }}_sans">
                        <input
                            type="radio"
                            class="form-radio"
                            id="chap_{{ $chapKey }}_commentaires_{{ $key }}_sans"
                            value="sans"
                            wire:model.lazy="chapitreList.{{ $chapKey }}.questionList.{{ $key }}.commentaires"
                        >
                        <span class="ml-2">Sans</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="w-full">
            <label class="block uppercase tracking-wide text-algoe-blue text-xs font-bold mb-2" for="chap_{{ $chapKey }}_description_{{ $key }}">
                Description
            </label>
            <textarea
                wire:model.lazy="chapitreList.{{ $chapKey }}.questionList.{{ $key }}.description"
                class="appearance-none block w-full bg-white text-algoe-blue border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="chap_{{ $chapKey }}_description_{{ $key }}"
                placeholder=""
                rows="6"
            ></textarea>
        </div>
    </div>
</div>
