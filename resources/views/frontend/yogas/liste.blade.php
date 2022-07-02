<div class="container-fluid px-md-5">
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-12 heading-section ftco-animate text-center">
            <h3 class="subheading">Cliquez pour voir plus</h3>
            <h2 class="mb-1">Yoga et Qi Gong</h2>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="col-lg-8 container-fluid">
            <div class="row no-gutters mx-auto d-flex justify-content-center">
                @foreach($yogas->where('is_for_children', 0) as $yoga)
                    <div
                        data-tippy-content="Par {{ $yoga->prof->nom }}"
                        class="d-flex align-items-stretch description"
                        style="margin:1.6%; height:150px; width:150px;"
                    >
                        <a href="/yogas/{{ $yoga->id }}" class="treatment w-100 text-center ftco-animate border p-3 py-4 block-7 rounded-circle">
                            <div class="icon d-flex justify-content-center align-items-center">
                                <span class="{{ $yoga->icone->intitule }}"></span>
                            </div>
                            <div class="text mt-2">
                                <h3 style="font-size:0.80em;">{{ $yoga->intitule }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if(count($yogas->where('is_for_children', 1)))
        <div class="row justify-content-center mb-4 mt-5 pb-3">
            <div class="col-md-12 heading-section ftco-animate text-center">
                <h3 class="subheading">Pour vos enfants</h3>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-8 container-fluid">
                <div class="row no-gutters mx-auto d-flex justify-content-center">
                    @foreach($yogas->where('is_for_children', 1) as $yoga)
                        <div
                            data-tippy-content="Par {{ $yoga->prof->nom }}"
                            class="d-flex align-items-stretch description"
                            style="margin:1.6%; height:150px; width:150px;"
                        >
                            <a href="/yogas/{{ $yoga->id }}" class="treatment w-100 text-center ftco-animate border p-3 py-4 block-7 rounded-circle">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="{{ $yoga->icone->intitule }}"></span>
                                </div>
                                <div class="text mt-2">
                                    <h3 style="font-size:0.80em;">{{ $yoga->intitule }}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
