@extends('frontend.layout.app')
@section('title', 'Yogas • ')

@push('scripts')
    <script>
        if (!sessionStorage.getItem("yogaIntro")) {

            introJs().setOption('nextLabel', 'Suivant').setOption('prevLabel', 'Retour').setOption('doneLabel', 'Fin').start();
            sessionStorage.setItem("yogaIntro", true);
        }
        $(document).ready(function(){
            $(this).scrollTop(0);
        });
    </script>
@endpush

@section('content')
<div class="topSpacement"></div>
<section class="ftco-counter img" id="section-counter" style="background-position:-27.5px 0; background-image: url('images/yoga111.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                </div>
            </div>
        </div>
    </div>
</section>
<div data-intro="Bienvenue sur la page des Yogas :) 👋" class="m-portlet__body">
    <ul class="nav justify-content-center nav-tabs" id="myTab"  role="tablist">
        <li
            data-intro="Vous retrouverez ici le planning des cours de yoga"
            class="nav-item"
            style="cursor:pointer;"
        >
            <a
                class="nav-link pricingLink"
                href="#reservation"
                id="reservation-tab"
                role="tab"
                aria-controls="entretien"
                aria-selected="true"
                data-toggle="tab"
                data-title="Mais pas que !" data-intro="Vous pouvez également réserver et payer votre séance en ligne"
            >
                Réservation et paiement
            </a>
        </li>
        <li class="nav-item" style="cursor:pointer;">
            <a
                data-title="Parcourez les yogas" data-intro="Explications, professeur & contact. Bonne visite !"
                class="nav-link courseLink"
                href="#disciplines"
                id="disciplines-tab"
                role="tab"
                aria-controls="disciplines"
                aria-selected="true"
                data-toggle="tab"
            >
                Disciplines
            </a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active" id="reservation" role="tabpanel" aria-labelledby="general-tab">
            @include("frontend.yogas.eversport")
        </div>
        <div class="tab-pane fade" id="disciplines" role="tabpanel" aria-labelledby="general-tab">
            <section class="ftco-section py-5">
                @include("frontend.yogas.liste")
            </section>
        </div>
    </div>

    <script src="js/utilCalendar.js"></script> <!-- util functions included in the CodyHouse framework -->
    <script src="js/mainCalendar.js"></script>

</div>
@endsection
