@extends('frontend.layout.app')

@section('content')
<div class="topSpacement"></div>
<section class="ftco-counter img" id="section-counter" style="background-image: url(images/profs/merci.jpg);" data-stellar-background-ratio="0.5">
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

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-10 heading-section ftco-animate text-center">
                <h3 class="subheading">Témoignages Facebook</h3>
                <h2 class=""></span>UN GRAND MERCI !</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="testimony-wrap col-md-12 pb-3 text-center">
                <p>
                    <a href="https://www.facebook.com/yogaenmoi/reviews" target="blank">
                        <button class="btn" style="background-color:#3B5998 !important; color:white; margin:0 auto !important; text-align:center !important;">
                            <span style="color:white;" class="icon-facebook"></span>&nbsp&nbsp&nbsp Laisser un avis
                        </button>
                    </a>
                    <a href="https://g.page/r/CQICMO3jmQcEEAI/review" target="blank">
                        <button class="btn" style="background-color:#4082ed !important; color:white; margin:0 auto !important; text-align:center !important;">
                            <span style="color:white;" class="icon-google"></span>&nbsp&nbsp&nbsp Laisser un avis
                        </button>
                    </a>
                </p>
            </div>
        </div>

        <div data-romw-token="sZGF1NfCFVoxEbY0XNrv4st02K7R2ObJmbpqONi2LHpBN5kHcM"></div>
        @push('scripts')
            <script src="https://reviewsonmywebsite.com/js/v2/embed.js?id=fd1f59fcc8467fb2938d" type="text/javascript"></script>
        @endpush
    </div>
</section>
@endsection
