@extends('frontend.layout.app')

@section('content')
    <div class="topSpacement"></div>
    <section class="ftco-counter img" id="section-counter" style="background-image: url(images/yoga6.jpg);" data-stellar-background-ratio="0.5">
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
    <section class="ftco-section" style="padding-bottom:3em !important;">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-12 heading-section ftco-animate text-center">
                    <h3 class="subheading">
                        Accédez au planning des ateliers
                        <script>
                            var dAujourdhui = new Date();
                            var options = {month: 'short'};
                            var month = dAujourdhui.toLocaleDateString('fr-FR', options);
                            var firstL = month.charAt(0)
                            if (isVowel(firstL)) {
                                document.write("d'" + month);
                            } else {
                                document.write("de " + month);
                            }

                            function isVowel(char) {
                                if (char.length == 1) {
                                    var vowels = new Array("a", "e", "i", "o", "u");
                                    var isVowel = false;

                                    for (e in vowels) {
                                        if (vowels[e] == char) {
                                            isVowel = true;
                                        }
                                    }

                                    return isVowel;
                                }
                            }
                        </script>
                    </h3>
                    <h2 class="mb-1">Ateliers</h2>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-8 container-fluid">
                    <div class="testimony-wrap col-md-12 pb-3 text-center">
                        <p><a href="https://www.facebook.com/yogaenmoi/events/" target="blank"><button class="btn" style="background-color:#3B5998 !important; color:white; margin:0 auto !important; text-align:center !important;"><span style="color:white;" class="icon-facebook"></span>&nbsp&nbsp&nbsp Évènements à venir</button></a></p>
                    </div>
                </div>
            </div>
    </section>
    <hr>
    <section class="ftco-section" style="padding-top:0 !important">
        <div class="container-fluid px-md-5">
            <div class="row justify-content-center mb-3 pb-0">
                <div class="col-md-12 heading-section ftco-animate text-center">
                    <h3 class="subheading">
                        Prix et conditions
                    </h3>
                    <h2 class="mb-1">Location Salle Ajna - 70 m²</h2>
                    <div class="alert alert-info col-md-6 mx-auto">
                        <i class="fa fa-info"></i> &nbsp&nbsp&nbsp Cette salle est réservée aux événements sur le yoga, pilates, coaching individuel, developpement personnel, spiritualité, écologie, santé naturelle, thérapies hollistiques
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12 container">
                    <div class="row">
                        <div class="col-lg-6 text-justify">
                            <div class="icon d-flex justify-content-center align-items-center heading-section" style="margin-bottom:30px; margin-top:20px;">
                                <h3 class="subheading text-center" style="line-height: 1.8;">Location pour une durée d'<strong>une 1/2 journée</strong></h3>
                            </div>
                            <ul>
                                <div class="block-7 row active offer-deal pt-0">
                                    <div class="col-12 text-center">
                                        <span class="price"><br><span class="number" style="font-size:40px;">40</span><sup>€</sup>TTC</span>
                                    </div>
                                    <a href="{{ route('frontend.contact') }}" class="headerBtns2 btn btn-outline-primary p-3 px-5 py-4 mx-auto my-3">Déposer une demande</a>
                                </div>
                            </ul>
                        </div>
                        <div class="col-lg-6 text-justify">
                            <div class="icon d-flex justify-content-center align-items-center heading-section" style="margin-bottom:30px; margin-top:20px;">
                                <h3 class="subheading text-center" style="line-height: 1.8;">Location pour une durée d'<strong>une journée complète</strong></h3>
                            </div>
                            <ul>
                                <div class="block-7 row active offer-deal pt-0">
                                    <div class="col-12 text-center">
                                        <span class="price"><br><span class="number" style="font-size:40px;">80</span><sup>€</sup>TTC</span>
                                    </div>
                                    <a href="{{ route('frontend.contact') }}" class="headerBtns2 btn btn-outline-primary p-3 px-5 py-4 mx-auto my-3">Déposer une demande</a>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <!--<div class="col-lg-6 text-justify"></div>
                        <div class="col-lg-6 text-justify">
                            <div class="icon d-flex justify-content-center align-items-center heading-section" style="margin-bottom:30px; margin-top:20px;">
                                <h2>En week-end</h2><br>
                            </div>
                            <div class="icon d-flex justify-content-center align-items-center heading-section" style="margin-bottom:30px; margin-top:20px;">
                                <h3 class="subheading text-center" style="line-height: 1.8;">Forfait <strong>avec communication Samadhi</strong> <br> (mailing, newsletter, facebook, instagram, site internet)</h3>
                            </div>
                            <ul>
                                <div class="block-7 row active offer-deal">
                                    <div class="col-4">
                                        <span class="price text-left">Heure :<br><span class="number" style="font-size:40px;">60</span><sup>€</sup>TTC</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="price text-center">1/2 journée :<br><span class="number" style="font-size:40px;">150</span><sup>€</sup>TTC</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="price text-right">Journée :<br><span class="number" style="font-size:40px;">250</span><sup>€</sup>TTC</span>
                                    </div>
                                    <a href="contact.php" class="headerBtns2 btn btn-outline-primary p-3 px-5 py-4 mx-auto my-3">Déposer une demande</a>
                                </div>
                            </ul>
                            <div class="icon d-flex justify-content-center align-items-center heading-section" style="margin-bottom:30px; margin-top:20px;">
                                <h3 class="subheading text-center" style="line-height: 1.8;">Forfait <strong>hors communication</strong></h3>
                            </div>
                            <ul>
                                <div class="block-7 row active offer-deal">
                                <div class="col-4">
                                        <span class="price text-left">Heure : <br><span class="number" style="font-size:40px;">50</span><sup>€</sup>TTC</span>
                                    </div>
                                    <div class="col-4">
                                        <span class="price text-center">1/2 journée : <br><span class="number" style="font-size:40px;">120</span><sup>€</sup>TTC</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="price text-right">Journée : <br><span class="number" style="font-size:40px;">200</span><sup>€</sup>TTC</span>
                                    </div>
                                    <a href="contact.php" class="headerBtns2 btn btn-outline-primary p-3 px-5 py-4 mx-auto my-3">Déposer une demande</a>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="text-justify">
                        <ul>
                            <div class="block-7 row active offer-deal col-md-6 mx-auto">
                                <div class="text-center mx-auto" style="margin-top:10px;">
                                    <h2 class="text-center">Sur devis</h2>
                                    <a href="contact.php" class="headerBtns2 btn btn-outline-primary p-3 px-5 py-4 mx-auto my-3">Déposer une demande</a>
                                </div>
                            </div>
                        </ul>
                    </div>-->
                    <div class="text-justify">
                        <ul>
                            <div class="block-7 row active offer-deal col-md-6 mx-auto">
                                <div class="text-center mx-auto" style="margin-bottom:30px; margin-top:10px;">
                                    <h2 class="text-center">La salle comporte</h2>
                                </div>
                                <ul class="text-center w-100">
                                    <li><i class="fas fa-fire"></i> chauffage et climatisation</li>
                                    <li><i class="fas fa-spa"></i> 15 tapis de yoga</li>
                                    <li><i class="fas fa-cube"></i> 15 briques</li>
                                    <li><i class="far fa-clipboard"></i> 15 pochettes pour les yeux</li>
                                    <li><i class="fas fa-slash"></i> 15 sangles</li>
                                    <li><i class="fas fa-drum"></i> matériel de musique</li>
                                    <li><i class="far fa-sticky-note"></i> paperboard</li>
                                    <li><i class="fas fa-shapes"></i> coussins</li>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
