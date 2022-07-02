@extends('frontend.layout.app')

@section('content')
    <div class="topSpacement"></div>
    <section class="ftco-counter img" id="section-counter" style="background-image: url(images/yoga3.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="row"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section contact-section" style="padding-top:1em !important;">
        <div class="container">
            <div class="row block-9">
                <div class="col-md-4 contact-info ftco-animate bg-light p-4">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <h2 class="h4">Au plus près de vous</h2>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p>
                                <strong style="color:#bf867c; font-size:15px;"><i class="fas fa-street-view mr-2"></i>ADRESSE :</strong><br>
                                27 Rue Sainte-Barbe (ZA Le Plan du Loup)<br>69110 Sainte-Foy-lès-Lyon<br>Rhône, France
                            </p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p>
                                <strong style="color:#bf867c; font-size:15px;"><i class="fas fa-bus mr-2"></i>ACCES TCL :</strong><br>
                                Bus C19, arrêt Plan du loup (Les razes)</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <p>
                                @if(App\Models\Setting::first()->tel_princ)
                                    <span>Tel principal : </span>
                                    <a href="tel:+33{{ App\Models\Setting::first()->tel_princ }}" target="_blank">
                                        {{ App\Models\Setting::first()->tel_princ }}
                                    </a> <br>
                                @endif
                                @if(App\Models\Setting::first()->tel_sec)
                                    <span>Tel secondaire : </span>
                                    <a href="tel:+33{{ App\Models\Setting::first()->tel_sec }}" target="_blank">
                                        {{ App\Models\Setting::first()->tel_sec }}
                                    </a>
                                @endif
                            </p>
                            <p>
                                @if(App\Models\Setting::first()->email)
                                    <span>Email : </span>
                                    <a href="mailto:{{ App\Models\Setting::first()->email }}" target="_blank">
                                        {{ App\Models\Setting::first()->email }}
                                    </a>
                                @endif
                            </p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <ul class="ftco-footer-social list-unstyled float-lft mt-3">
                                <li class="ftco-animate"><a href="https://www.facebook.com/yogaenmoi" target="blank"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="https://www.instagram.com/samadhi_yoga_lyon/" target="blank"><span class="icon-instagram"></span></a></li>
                                <li class=""><a href="https://www.linkedin.com/in/valerie-fenet-1953621aa/" target="blank"><span class="icon-linkedin"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 ftco-animate">
                    @if ($message = Session::get('success'))
                        <div class="layer">
                            <div class="floater">
                                <h2>Message envoyé <i class="fa fa-check"></i></h2>
                                <p>Vous recevrez une réponse dans 24 à 48h.</p>
                            </div>
                        </div>
                        @push('styles')
                            <style>
                                .layer {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    z-index:2;
                                }
                                .layer .floater {
                                    text-align:center;
                                    position:absolute;
                                    top:42%;
                                    width:100%;
                                }
                                .layer h2 {
                                    color:#bf867d;
                                }
                                .layer p {
                                    color:#6c8487;
                                }
                            </style>
                        @endpush
                    @else
                        <form action="/contact" method="POST" class="contact-form mt-3">
                            <h2 class="h4 col-12 px-0">Contactez-nous</h2>
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Votre nom" required name="nom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Email" required name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel" name="tel" class="form-control" placeholder="Tél." required>
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <p class="h6">Temps de réponse moyen : 1 jour ouvré</p>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Envoyer" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-gallery ftco-section" style="padding:0 !important">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section ftco-animate text-center">
                    <h3 class="subheading">Cliquez pour agrandir</h3>
                    <h2 class="mb-1">Plan</h2>
                </div>
            </div>
            <div class="row planDiv1">
                <div class="col-md-6 ftco-animate">
                    <a href="images/plan.png" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/plan.png); height:100% !important;">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-add"></span>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 ftco-animate">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2784.9909690585896!2d4.785760915790249!3d45.731275923603086!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ebfc40f5b8f7%3A0x67bc88a079ecc16d!2s27%20Rue%20Sainte-Barbe%2C%2069110%20Sainte-Foy-l%C3%A8s-Lyon!5e0!3m2!1sfr!2sfr!4v1599401090867!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            <div class="row planDiv2">
                <div class="col-md-12 ftco-animate">
                    <a href="images/plan.png" class="planImg gallery image-popup img d-flex align-items-center" style="background-image: url(images/plan.png);">
                        <div class="icon mb-4 d-flex align-items-center justify-content-center">
                            <span class="icon-add"></span>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row planDiv2">
                <div class="col-md-12 ftco-animate hiddenOnMobile" style="padding:0 !important;">
                    <div class="planIFrame">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2784.991155779862!2d4.785755551665393!3d45.73127217900253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ebfc40f5b8f7%3A0x67bc88a079ecc16d!2s27%20Rue%20Sainte-Barbe%2C%2069110%20Sainte-Foy-l%C3%A8s-Lyon!5e0!3m2!1sfr!2sfr!4v1598922904923!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                <div class="ftco-animate shownOnMobile mt-4 mx-auto" style="display:none; padding:0 !important;">
                    <div class="planIFrame">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2784.991155779862!2d4.785755551665393!3d45.73127217900253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ebfc40f5b8f7%3A0x67bc88a079ecc16d!2s27%20Rue%20Sainte-Barbe%2C%2069110%20Sainte-Foy-l%C3%A8s-Lyon!5e0!3m2!1sfr!2sfr!4v1598922904923!5m2!1sfr!2sfr" width="400" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('js/google-map.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6Le4U7UZAAAAAM153d6t_FeTBX3_ArwFhO11hfKU"></script>
@endpush
