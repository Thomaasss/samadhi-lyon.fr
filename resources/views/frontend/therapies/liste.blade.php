<div class="container-fluid px-md-5">
    <div class="row justify-content-center mb-5 pb-3">
        <div class="col-md-12 heading-section ftco-animate text-center">
            <h3 class="subheading">Cliquez pour voir plus</h3>
            <h2 class="mb-1">Thérapies douces</h2>
        </div>
    </div>
    <div class="col-lg-8 container-fluid">
        @foreach(\App\Models\TherapieCategorie::all()->shuffle() as $categorie)
            <div class="row justify-content-center my-2">
                <div class="col-md-12 heading-section ftco-animate text-center">
                    <h3 class="subheading">{{ $categorie->title }}</h3>
                </div>
            </div>
            <div class="row no-gutters mx-auto d-flex justify-content-center">
                @foreach($categorie->therapies as $therapie)
                    @if($therapie->intitule == 'Ostéopathie')
                        @if($therapie->id == 18)
                            <div
                                data-tippy-content="Par
                                    @foreach(\App\Models\Therapie::where('intitule', 'Ostéopathie')->get() as $key=>$el)
                                        {{ $key != 0 ? ' et ' : '' }}{{ $el->prof->nom }}
                                    @endforeach
                                "
                                class="d-flex align-items-stretch description dropdown"
                                style="margin:1.6%; height:150px; width:150px;"
                            >
                                <button
                                    class="dropdown-toggle treatment w-100 text-center ftco-animate border p-3 py-4 block-7 rounded-circle"
                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                >
                                    <div class="icon d-flex justify-content-center align-items-center">
                                        <span class="{{ $therapie->icone->intitule }}"></span>
                                    </div>
                                    <div class="text mt-2">
                                        <h3 style="font-size:0.80em;">{{ $therapie->intitule }}</h3>
                                    </div>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach(\App\Models\Therapie::where('intitule', 'Ostéopathie')->get() as $key=>$el)
                                        <a class="dropdown-item" href="/therapies/{{ $el->id }}">{{ $el->intitule }} par {{ $el->prof->nom }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @else
                        <div
                            data-tippy-content="Par {{ $therapie->prof->nom }}"
                            class="d-flex align-items-stretch description"
                            style="margin:1.6%; height:150px; width:150px;"
                        >
                            <a href="/therapies/{{ $therapie->id }}" class="treatment w-100 text-center ftco-animate border p-3 py-4 block-7 rounded-circle">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="{{ $therapie->icone->intitule }}"></span>
                                </div>
                                <div class="text mt-2">
                                    <h3 style="font-size:0.80em;">{{ $therapie->intitule }}</h3>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
</div>
