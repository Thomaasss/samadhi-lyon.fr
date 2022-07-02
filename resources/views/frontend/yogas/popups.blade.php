<!------------ VINIYOGA ------------>
@foreach(App\Models\Yoga::all()->shuffle() as $yoga)
<div class="modal fade" id="yoga_modal_{{ $yoga->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ $yoga->intitule }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="font-size:15px;">
                <div class="row">
                    <div class="col-md-6 text-justify">
                        <div class="icon d-flex justify-content-center align-items-center heading-section" style="margin-bottom:30px; margin-top:20px;">
                            <h3 class="subheading">{{ $yoga->intitule }}</h3>
                        </div>
                        {!! $yoga->description !!}
                        <img src="{{ $yoga->image }}" style="margin-bottom:20px;" />
                        <a href="galerie.php?section=viniyoga"><button type="button" class="btn btn-primary p-3 px-2 py-1 mr-md-2">Photos</button></a>
                        <a href="yoga.php"><button type="button" class="btn btn-outline-primary p-3 px-2 py-1 mr-md-2">Planning</button></a>
                    </div>
                    <div class="col-md-6">
                        <div class="icon d-flex justify-content-center align-items-center heading-section" style="margin-bottom:30px; margin-top:20px;">
                            <h3 class="subheading">A propos de la professeur</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="img" style="background-image: url({{ $yoga->prof->image }}); height:100px; width:100px; background-position:100% 20%; border-radius:50%;"></div>
                            </div>
                            <div class="col-md-8" style="line-height:100px;">
                                <p>Dispensé par <strong>{{ $yoga->prof->nom }}</strong></p>
                            </div>
                        </div>
                        {!! $yoga->prof->description !!}
                        <ul>
                            <li><a href="tel:+33{{ $yoga->prof->tel }}"><span class="icon icon-phone"></span>&nbsp&nbsp<span class="text" style="color:black;">+33 {{ $yoga->prof->tel }}</span></a></li>
                            <li><a href="mailto:{{ $yoga->prof->email }}" target="blank"><span class="icon icon-envelope"></span>&nbsp&nbsp<span class="text" style="color:black;">{{ $yoga->prof->email }}</span></a></li>
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
