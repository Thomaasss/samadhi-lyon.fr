@extends('frontend.layout.app')
@section('title', $therapie->intitule .' • ')

@section('content')
    <section
        class="hero-wrap hero-wrap-2"
        style="
            background-position:100% 20%;
            @if($therapie->image && !str_contains($therapie->image, '/white.png'))
                background-image: url('{{ asset($therapie->image) }}');
            @elseif($therapie->prof->image && !str_contains($therapie->image, '/white.png'))
                background-image: url('{{ asset($therapie->prof->image) }}');
            @else
                background-color:#dfe8ea;
            @endif
        "
    >
        <div class="overlay"></div>
        <div class="" style="margin:0 !important; width:100% !important; background-color:rgba(255, 255, 255, 0.5);">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">{{ $therapie->intitule }}</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Accueil</a></span>•
                        <span class="mr-2"><a href="/therapies">Thérapies</a></span>•
                        <span>{{ $therapie->intitule }}</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $therapie->intitule }}</h2>
                    <div class="row">
                        <div class="col-md-3">
                            @if($therapie->image)
                                @if(str_contains($therapie->image, '/white.png'))
                                    <p style="background-color:#dfe8ea; border-radius:10%" class="text-center text-xxxl">
                                        <span class="{{ $therapie->icone->intitule }}" style="color:#597579; width:100%; font-size:1.3em;"></span>
                                    </p>
                                @else
                                    <img style="border-radius:10%;" src="{{ asset($therapie->image) }}" alt="" class="img-fluid mb-2">
                                @endif
                            @elseif($therapie->prof->image)
                                <img style="border-radius:10%;" src="{{ asset($therapie->prof->image) }}" alt="" class="img-fluid mb-2">
                            @endif
                        </div>
                        <div class="col-md-9">
                            {!! $therapie->description !!}
                        </div>
                    </div>
                    @if($therapie->tarifs->count())
                        <section class="ftco-section section3-1 bg-light my-2" style="padding:10px !important;">
                            <div class="container">
                                <div class="row justify-content-center mt-1">
                                    <h2 class="mb-3">Tarifs</h2>
                                </div>
                                <div class="row">
                                    @foreach($therapie->tarifs as $tarif)
                                        <div class="col-md-4 my-2">
                                            <div class="block-7">
                                                <div class="text-center">
                                                    <h2 class="heading">{{ $tarif->intitule }}</h2>
                                                    @if($tarif->is_devis == 1)
                                                        <p class="my-5">Sur devis</p>
                                                    @else
                                                        <span class="price"><span class="number">{{ $tarif->prix_ttc }}</span><sup>€</sup>TTC</span>
                                                    @endif
                                                    @if($therapie->prof->tel)
                                                        <a href="tel:+33{{ $therapie->prof->tel }}" class="btn btn-primary d-block px-2 py-3" style="font-size:13px;">
                                                            <i class="fa fa-phone"></i> {{ $therapie->prof->tel }}
                                                        </a>
                                                    @else
                                                        <a href="mailto:{{ $therapie->prof->email }}" target="_blank" class="btn btn-primary d-block px-2 py-3" style="font-size:10px;">
                                                            <i class="fa fa-envelope"></i> Réserver par email
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    @endif
                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            @foreach($therapie->tags as $tag)
                                <a href="#" class="tag-cloud-link">{{ $tag->intitule }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="about-author d-flex flex-wrap">
                        <div class="bio align-self-md-center d-flex col-12 flex-wrap justify-content-start">
                            <img
                                style="border-radius:100%; width:120px; height:120px;"
                                src="{{ asset($therapie->prof->image) }}"
                                alt="{{ $therapie->prof->nom }}"
                                class="img-fluid mb-4 mr-3"
                            >
                            <div>
                                <h3 class="mr-3">{{ $therapie->prof->nom }}</h3>
                                <ul class="align-self-center">
                                    @if($therapie->prof->tel)
                                        <li><a href="tel:+33{{ $therapie->prof->tel }}"><span class="icon icon-phone"></span>&nbsp&nbsp<span class="text" style="color:black;">+33 {{ $therapie->prof->tel }}</span></a></li>
                                    @endif
                                    @if($therapie->prof->email)
                                        <li><a href="mailto:{{ $therapie->prof->email }}" target="blank"><span class="icon icon-envelope"></span>&nbsp&nbsp<span class="text" style="color:black;">{{ $therapie->prof->email }}</span></a></li>
                                    @endif
                                    @if($therapie->prof->website)
                                        <li><a href="https://{{ $therapie->prof->website }}" target="blank"><i class="fas fa-desktop"></i>&nbsp&nbsp<span class="text" style="color:black;">{{ $therapie->prof->website }}</span></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="desc align-self-md-center">
                            <p style="text-align:justify;">{!! $therapie->prof->description !!}</p>
                        </div>
                    </div>


                    <div>
                        @if(count($therapie->avisActive))
                            <h3 class="mb-5">{{ count($therapie->avisActive) ? count($therapie->avisActive) : 'Aucun' }} avis</h3>
                            <ul class="comment-list">
                                @foreach($therapie->avisActive as $avis)
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <i class="fa fa-3x fa-user" style="color:#587478;" alt="Image placeholder"></i>
                                        </div>
                                        <div class="comment-body">
                                            <h3>{{ $avis->nom }}</h3>
                                            <div class="meta fromNowMomentJs">{{ $avis->created_at }}</div>
                                            <p>{{ $avis->message }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Laissez un avis</h3>
                            <form action="{{ route('therapies.avis', array($therapie->id, 'therapie')) }}" method="POST" class="bg-light p-4">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nom *</label>
                                    <input name="nom" type="text" class="form-control bg-white" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message *</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <small>Pour éviter les abus, votre témoignage sera validé par l'équipe Samadhi avant d'être publié</small>
                                <div class="form-group mt-2">
                                    <input type="submit" value="Poster" class="btn py-3 px-4 btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>

                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-2">Tags</h3>
                        <div class="tagcloud">
                            @if(count($therapie->tags))
                                @foreach($therapie->tags as $tag)
                                    <a class="tag-cloud-link">{{ $tag->intitule }}</a>
                                @endforeach
                            @else
                                <small>Aucun tag</small>
                            @endif
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-2">Autres thérapies</h3>
                        @foreach(App\Models\Therapie::where('id', '<>', $therapie->id)->get()->shuffle()->take('6') as $therapieList)
                            <div class="block-21 mb-4 d-flex">
                                <a
                                    class="blog-img mr-4"
                                    href="/therapies/{{ $therapieList->id }}"
                                >


                                    @if($therapieList->image)
                                        @if(str_contains($therapieList->image, 'white.png'))
                                            <p style="background-color:#dfe8ea; border-radius:10%" class="text-center text-xxxl">
                                                <span class="{{ $therapieList->icone->intitule }}" style="color:#597579; width:100%;"></span>
                                            </p>
                                        @else
                                            <img
                                                src="{{ asset($therapieList->image) }}"
                                                alt="" style="width:100%; height:100%; border-radius:10%"
                                            >
                                        @endif
                                    @elseif($therapieList->prof->image)
                                        <img
                                            src="{{ asset($therapieList->prof->image) }}"
                                            alt="" style="width:100%; height:100%; border-radius:10%"
                                        >
                                    @endif
                                </a>
                                <div class="text">
                                    <h3 class="heading"><a href="/therapies/{{ $therapieList->id }}">{{ $therapieList->intitule }}</a></h3>
                                    <div class="meta">
                                        <div><a href="/therapies/{{ $therapieList->id }}"><span class="icon-person"></span> {{ $therapieList->prof->nom }}</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{--<div class="sidebar-box ftco-animate">
                        <h3 class="heading-2">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>--}}
                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
