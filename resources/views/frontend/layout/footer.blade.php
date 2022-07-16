<footer class="ftco-footer ftco-section" style="padding-bottom:30px;">
    <div class="container">
        <div class="row d-flex footerSection">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2"><img src="{{asset('images/logo.png')}}" alt="Samadhi Logo"></h2>
                    <p>Samādhi est un centre de disciplines et thérapies douces de 180 mètres carrés situé à Sainte-Foy les Lyon. Les maître-mots sont le bien-être, la santé naturelle et l'équilibre.</p>
                    <p><a href="/login"><i class="fa fa-lock"></i>&nbsp; Accès privé</a></p>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    @foreach(\App\Models\TherapieCategorie::all()->shuffle() as $categorie)
                        <h2 class="ftco-heading-2 my-0 py-0">{{ $categorie->title }}</h2>
                        <ul class="list-unstyled my-0 py-0">
                            @foreach($categorie->therapies as $therapie)
                                <li class="ml-2"><a href="/therapies/{{ $therapie->id }}">{{ $therapie->intitule }}</a></li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Yoga et Qi Gong</h2>
                    <ul class="list-unstyled">
                        @foreach(\App\Models\Yoga::all()->where('is_for_children', 0) as $yoga)
                            <li><a href="/yogas/{{ $yoga->id }}">{{ $yoga->intitule }}</a></li>
                        @endforeach
                        @if(count(\App\Models\Yoga::all()->where('is_for_children', 1)))
                            <li>Pour enfants</li>
                            @foreach(\App\Models\Yoga::all()->where('is_for_children', 1) as $yoga)
                                <li><a href="/yogas/{{ $yoga->id }}">{{ $yoga->intitule }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 text-center">
                    <h2 class="ftco-heading-2">Une question ?</h2>
                    <div class="mb-3">
                        <ul>
                            <li class="text-center"><span class="icon icon-map-marker mr-2"></span><span class="text">27 Rue Sainte-Barbe (ZA Le Plan du Loup)<br>69110 Sainte-Foy-lès-Lyon<br>Rhône, France</span></li>
                            @if(App\Models\Setting::first()->tel_princ)
                                <li class="text-center">
                                    <a href="tel:+33{{ App\Models\Setting::first()->tel_princ }}"><span class="icon icon-phone mr-2"></span><span class="text">+33 {{ App\Models\Setting::first()->tel_princ }}</span></a>
                                </li>
                            @endif
                            @if(App\Models\Setting::first()->tel_sec)
                                <li class="text-center">
                                    <a href="tel:+33{{ App\Models\Setting::first()->tel_sec }}"><span class="icon icon-phone mr-2"></span><span class="text">+33 {{ App\Models\Setting::first()->tel_sec }}</span></a>
                                </li>
                            @endif
                            @if(App\Models\Setting::first()->email)
                                <li class="text-center"><a href="mailto:{{ App\Models\Setting::first()->email }}" target="blank"><span class="icon icon-envelope mr-2"></span><span class="text">{{ App\Models\Setting::first()->email }}</span></a></li>
                            @endif
                            <ul class="ftco-footer-social list-unstyled float-lft mt-5">
                                <li class=""><a href="https://www.facebook.com/yogaenmoi" target="blank"><span class="icon-facebook"></span></a></li>
                                <li class=""><a href="https://www.instagram.com/samadhi_yoga_lyon/" target="blank"><span class="icon-instagram"></span></a></li>
                                <li class=""><a href="https://www.linkedin.com/in/valerie-fenet-1953621aa/" target="blank"><span class="icon-linkedin"></span></a></li>
                            </ul>
                            <a href="/contact" class="btn btn-outline-primary p-3 px-5 py-1 ml-md-2 mt-3">Contact</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p class="mb-0">
                    Copyright &copy;

                    <script>
                        document.write(new Date().getFullYear());
                    </script>

                    Tous droits réservés • Créé avec <i class="icon-heart" aria-hidden="true"></i> par <a href="https://www.thomasfenet.fr" target="_blank"> Thomas FENET </a> et <a href="https://www.linkedin.com/in/aur%C3%A9lien-clement-0524001a2/" target="_blank"> Aurélien CLEMENT </a>
                    <br/><br/><a href="/legales" target="_blank">Mentions légales & RGPD</a>

                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
