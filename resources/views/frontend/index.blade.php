@extends('frontend.layout.app')

@section('content')
    <section class="hero-wrap" style="background-image: url('images/yoga1.jpg'); background-position:20% 0%;" data-stellar-background-ratio="0.5">
    <div class="blurContainer">
        <div class="overlay"></div>
        <div class="container">
            <div class="headerDiv row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-10 ftco-animate text-center">
                    <h1 class="headerText my-10">Entrez en harmonie avec vous-même</h1>
                    <p class="btns">
                        <a href="/yogas/reservation" class="headerBtns1 btn btn-primary p-3 px-5 py-4 mr-md-2">Réservation <span class="hiddenOnMobile">Yoga</span></a>
                        <a href="/contact" class="headerBtns2 btn btn-outline-primary p-3 px-5 py-4 ml-md-2">Contact</a>
                    </p>
                    <div class="row justify-content-center">
                        <div class="col-md-8 mb-3 mainDescrH">
                            <p style="text-transform:uppercase; letter-spacing:1px; color:#567276;">Les soins physiques, émotionnels et énergétiques nous permettent d'accéder à la complétude. <br><br> <strong>L'aboutissement à l'état de</strong></p>
                            <img
                                class="mainLogoH"
                                src="images/logo1.png"
                                style="width:200px; height:auto; padding-bottom:5px; border-bottom:2px solid #567276;"
                            >
                            </img>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container px-0">
        <div class="row no-gutters">
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="offer-deal text-center px-2 px-lg-5">
                    <div class="img" style="background-image: url(images/yoga4.jpg);"></div>
                    <div class="text mt-4">
                        <h3 class="mb-4" id="demo">Cours de Yoga</h3>
                        <p class="mb-5">Nos professeurs vous accueillent pour des cours de Yoga adaptés à tous les âges et à toutes les morphologies</p>
                        <p><a href="/yogas" class="btn btn-white px-4 py-3"> Yoga &nbsp<span class="ion-ios-arrow-round-forward"></span></a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="offer-deal active text-center px-2 px-lg-5">
                    <div class="img" style="background-image: url('images/custom/5.jpg');"></div>
                    <div class="text mt-4">
                        <h3 class="mb-4">Thérapies douces</h3>
                        <p class="mb-5">
                            Prenez rendez-vous avec thérapeutes pour vous offrir un soin d'une grande sérénité, pour votre esprit et votre corps
                        </p>
                        <p>
                            <a href="/therapies" class="btn btn-white px-4 py-3"> Thérapies &nbsp
                                <span class="ion-ios-arrow-round-forward"></span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
                <div class="offer-deal text-center px-2 px-lg-5">
                    <div class="img" style="background-image: url(images/yoga5.jpg);"></div>
                    <div class="text mt-4">
                        <h3 class="mb-4">Ateliers &amp; Evénements</h3>
                        <p class="mb-5">Participez et conviez votre famille à des événements et ateliers lucratifs et ressourcant. Planning des ateliers disponible ci-dessous</p>
                        <p><a href="/ateliers" class="btn btn-white px-4 py-3"> Participer &nbsp<span class="ion-ios-arrow-round-forward"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-counter img" id="section-counter" style="background-image: url('images/gallery/all/photo (118).jpg');" data-stellar-background-ratio="0.1">
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
<section class="ftco-section py-5" id="section1">
    @include('frontend.yogas.liste')
    <p class=" ftco-animate" style="text-align:center; margin-top:50px;"><a href="/yogas">Consulter le planning et les tarifs</a></p>
</section>

<section class="ftco-section py-5" id="section1">
    @include('frontend.therapies.liste')
    <p class=" ftco-animate" style="text-align:center; margin-top:50px;"><a href="/therapies">Consulter les tarifs</a></p>
</section>
@endsection
