<h1 class="text-algoe-blue font-bold text-2xl my-3">
    Tarifs rattachés
</h1>
<div wire:loading wire:target="addTarif, removeTarif" class="animate-pulse flex w-6/12" style="position:absolute;">
    <div class="flex-1">
        <div class="h-1">
            <div class="h-1 bg-zen-brown rounded"></div>
        </div>
    </div>
</div>
<div class="flex flex-wrap items-center gap-4 mt-5">
    @foreach($tarifsList as $key => $tarif)
        <x-formations.document :key="$key" :tarifsList="$tarifsList"></x-formations.document>
    @endforeach
    <button
        class="hover:bg-zen-blue-400 bg-zen-blue text-white font-bold uppercase text-xs px-3 py-2 rounded-full shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 transition-all"
        type="button"
        wire:click="addTarif"
    >
        <i class="fas fa-plus"></i>
    </button>
</div>
