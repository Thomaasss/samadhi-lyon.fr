@foreach(App\Models\Therapie::all() as $therapie)
<div class="modal fade" id="therapie_modal_{{ $therapie->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModal1CenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $therapie->intitule }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:15px;">
                <div class="row">
                    <div class="col-md-6 text-justify">
                        <div class="icon d-flex justify-content-center align-items-center heading-section" style="margin-bottom:30px; margin-top:20px;">
                            <h3 class="subheading">{{ $therapie->intitule }}</h3>
                        </div>
                        {!! $therapie->description !!}

                        <img src="{{ $therapie->image }}" style="margin-bottom:20px;" />
                    </div>
                    <div class="col-md-6">
                        <div class="icon d-flex justify-content-center align-items-center heading-section" style="margin-bottom:30px; margin-top:20px;">
                            <h3 class="subheading">A propos de la thérapeute</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="img" style="background-image: url({{ $therapie->prof->image }}); height:100px; width:100px; background-position:100% 20%; border-radius:50%;"></div>
                            </div>
                            <div class="col-md-8" style="line-height:100px;">
                                <p>Dispensé par <strong>{{ $therapie->prof->nom }}</strong></p>
                            </div>
                        </div>
                        {!! $therapie->prof->description !!}
                        <ul>
                            <li><a href="tel:+33{{ $therapie->prof->tel }}"><span class="icon icon-phone"></span>&nbsp&nbsp<span class="text" style="color:black;">+33 {{ $therapie->prof->tel }}</span></a></li>
                            <li><a href="mailto:{{ $therapie->prof->email }}" target="blank"><span class="icon icon-envelope"></span>&nbsp&nbsp<span class="text" style="color:black;">{{ $therapie->prof->email }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>
@endforeach
