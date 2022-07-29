@extends('frontend.layout.app')
@section('title', $formation->title .' • ')

@section('content')
    <section
        class="hero-wrap hero-wrap-2"
        style="
            background-position:100% 20%;
            @if($formation->image && !str_contains($formation->image, '/white.png'))
                background-image: url('{{ asset($formation->image) }}');
            @elseif($formation->formateur->image && !str_contains($formation->image, '/white.png'))
                background-image: url('{{ asset($formation->formateur->image) }}');
            @else
                background-color:#dfe8ea;
            @endif
        "
    >
        <div class="overlay"></div>
        <div class="" style="margin:0 !important; width:100% !important; background-color:rgba(255, 255, 255, 0.5);">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">{{ $formation->title }}</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Accueil</a></span>•
                        <span class="mr-2"><a href="/formations">Formations</a></span>•
                        <span>{{ $formation->title }}</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $formation->title }}</h2>
                    <div class="row">
                        <div class="col-md-3">
                            @if($formation->image)
                                @if(str_contains($formation->image, '/white.png'))
                                    <p style="background-color:#dfe8ea; border-radius:10%" class="text-center text-xxxl">
                                        <span class="{{ $formation->icone->title }}" style="color:#597579; width:100%; font-size:1.3em;"></span>
                                    </p>
                                @else
                                    <img style="border-radius:10%;" src="{{ asset($formation->image) }}" alt="" class="img-fluid mb-2">
                                @endif
                            @elseif($formation->formateur->image)
                                <img style="border-radius:10%;" src="{{ asset($formation->formateur->image) }}" alt="" class="img-fluid mb-2">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <div>
                                <p>
                                    {{ $formation->objectifs }}
                                </p>
                                {!! $formation->description !!}
                            </div>
                        </div>
                    </div>

                    <div id="accordion" class="myaccordion w-100 text-center py-4 px-1 px-md-3 my-4">
                        <h3>Télécharger le programme PDF &nbsp;⬇️</h3>
                        <div  class="m-auto col-md-7 ftco-animate fadeInUp ftco-animated">
                            <a target="_blank" href="{{ asset($formation->pdf) }}" class="gallery img d-flex align-items-center" style="cursor:pointer; background-repeat:none; background-position:center; background-image:url({{ asset($formation->pdf_image) }}); background-size:80%;">
                                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-file-pdf text-white"></i>
                                </div>
                            </a>
                        </div>
                        <h3>Tarifs : </h3>
                        <div  class="ftco-animate fadeInUp ftco-animated">
                            <ul>
                                @foreach($formation->tarifs as $tarif)
                                    <li @if(!$tarif->tarif) class="text-sm" @endif>{{ $tarif->title }} @if($tarif->tarif) : <span class="price"><span class="number" style="color:#d9bf77; font-size:40px;">{{ $tarif->tarif }}</span><sup style="color:#d9bf77;">€</sup>TTC</span> @endif</li>
                                @endforeach
                            </ul>
                        </div>
                        <h3 class="mt-2">Dates clés</h3>
                        @foreach($formation->dates as $date)
                            <div class="card" style="width:100%;">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="d-flex align-items-center justify-content-between btn btn-link collapsed" data-toggle="collapse" data-target="#collapse_{{ $date->id  }}" aria-expanded="false" aria-controls="collapse_{{ $date->id  }}">
                                            <span style="color:#2b2b2b; overflow:hidden; text-overflow:ellipsis;">{!! $date->title !!}</span>
                                            <i class="fa" aria-hidden="true"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse_{{ $date->id  }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                    <div class="card-body text-left">
                                        <ul>
                                            @foreach($date->elements as $element)
                                                <li>
                                                    <span>{{ $element->description }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="about-author d-flex flex-wrap">
                        <div class="bio align-self-md-center d-flex col-12 flex-wrap justify-content-start">
                            <img
                                style="border-radius:100%; width:120px; height:120px;"
                                src="{{ asset($formation->formateur->image) }}"
                                alt="{{ $formation->formateur->nom }}"
                                class="img-fluid mb-4 mr-3"
                            >
                            <div>
                                <h3 class="mr-3">{{ $formation->formateur->nom }}</h3>
                                <ul class="align-self-center">
                                    @if($formation->formateur->tel)
                                        <li><a href="tel:+33{{ $formation->formateur->tel }}"><span class="icon icon-phone"></span>&nbsp&nbsp<span class="text" style="color:black;">+33 {{ $formation->formateur->tel }}</span></a></li>
                                    @endif
                                    @if($formation->formateur->email)
                                        <li><a href="mailto:{{ $formation->formateur->email }}" target="blank"><span class="icon icon-envelope"></span>&nbsp&nbsp<span class="text" style="color:black;">{{ $formation->formateur->email }}</span></a></li>
                                    @endif
                                    @if($formation->formateur->website)
                                        <li><a href="https://{{ $formation->formateur->website }}" target="blank"><i class="fas fa-desktop"></i>&nbsp&nbsp<span class="text" style="color:black;">{{ $formation->formateur->website }}</span></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="desc align-self-md-center">
                            <p style="text-align:justify;">{!! $formation->formateur->description !!}</p>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
                <div class="col-lg-4 sidebar ftco-animate">
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-2">Autres formations</h3>
                        @foreach(App\Models\formation::where('id', '<>', $formation->id)->get()->shuffle()->take('6') as $formationList)
                            <div class="block-21 mb-4 d-flex">
                                <a
                                    class="blog-img mr-4"
                                    href="/formations/{{ $formationList->id }}"
                                >
                                    <p style="background-color:#dfe8ea; border-radius:10%" class="text-center text-xxxl">
                                        <span class="{{ $formationList->icone->intitule }}" style="color:#597579; width:100%;"></span>
                                    </p>
                                </a>
                                <div class="text">
                                    <h3 class="heading"><a href="/formations/{{ $formationList->id }}">{{ $formationList->title }}</a></h3>
                                    <div class="meta">
                                        <div><a href="/formations/{{ $formationList->id }}"><span class="icon-person"></span> {{ $formationList->formateur ? $formationList->formateur->nom : '' }}</a></div>
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
