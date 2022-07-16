@extends('frontend.layout.app')
@section('title', $yoga->intitule .' • ')

@section('content')
    <section
        class="hero-wrap hero-wrap-2"
        style="
            background-position:100% 20%;
            @if($yoga->image && !str_contains($yoga->image, '/white.png'))
                background-image: url('{{ asset($yoga->image) }}');
            @elseif($yoga->prof->image && !str_contains($yoga->image, '/white.png'))
                background-image: url('{{ asset($yoga->prof->image) }}');
            @else
                background-color:#dfe8ea;
            @endif
        "
        data-stellar-background-ratio="0.5"
    >
        <div class="overlay"></div>
        <div class="" style="margin:0 !important; width:100% !important; background-color:rgba(255, 255, 255, 0.5);">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-3 bread">{{ $yoga->intitule }}</h1>
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="/">Accueil</a></span>•
                        <span class="mr-2"><a href="/yogas">Yoga</a></span>•
                        <span>{{ $yoga->intitule }}</span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 ftco-animate">
                    <h2 class="mb-3">{{ $yoga->intitule }}</h2>
                    <div class="row">
                        <div class="col-md-3">
                            @if($yoga->image)
                                @if(str_contains($yoga->image, '/white.png'))
                                    <p style="background-color:#dfe8ea; border-radius:10%" class="text-center text-xxxl">
                                        <span class="{{ $yoga->icone->intitule }}" style="color:#597579; width:100%; font-size:1.3em;"></span>
                                    </p>
                                @else
                                    <img style="border-radius:10%;" src="{{ asset($yoga->image) }}" alt="" class="img-fluid mb-2">
                                @endif
                            @elseif($yoga->prof->image)
                                <img style="border-radius:10%;" src="{{ asset($yoga->prof->image) }}" alt="" class="img-fluid mb-2">
                            @endif
                        </div>
                        <div class="col-md-9">
                            {!! $yoga->description !!}
                            <a target="_blank" href="https://www.eversports.fr/widget/w/DhbXO9?list=schedule">
                                <button type="button" class="btn btn-outline-secondary p-3 px-2 py-1 m-1">
                                    <i class="fa fa-calendar"></i> Planning
                                </button>
                            </a>
                            <a target="_blank" href="https://www.eversports.fr/widget/w/DhbXO9?offer=6850c923-2dd8-4318-bf25-b3ce11ae908f">
                                <button type="button" class="btn btn-outline-primary p-3 px-2 py-1 m-1">
                                    <i class="fa fa-shopping-cart"></i> 1 cours
                                </button>
                            </a>
                            <a target="_blank" href="https://www.eversports.fr/widget/w/DhbXO9?offer=08d80b84-8430-45a7-9752-5bafa6e7108e">
                                <button type="button" class="btn btn-outline-primary p-3 px-2 py-1 m-1">
                                    <i class="fa fa-shopping-cart"></i> 10 cours
                                </button>
                            </a>
                        </div>
                    </div>

                    <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            @foreach($yoga->tags as $tag)
                                <a class="tag-cloud-link">{{ $tag->intitule }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="about-author d-flex flex-wrap">
                        <div class="bio align-self-md-center d-flex col-12 flex-wrap justify-content-start">
                            <img
                                style="border-radius:100%; width:120px; height:120px;"
                                src="{{ asset($yoga->prof->image) }}"
                                alt="{{ $yoga->prof->nom }}"
                                class="img-fluid mb-4 mr-3"
                            >
                            <div>
                                <h3 class="mr-3">{{ $yoga->prof->nom }}</h3>
                                <ul class="align-self-center">
                                    @if($yoga->prof->tel)
                                        <li><a href="tel:+33{{ $yoga->prof->tel }}"><span class="icon icon-phone"></span>&nbsp&nbsp<span class="text" style="color:black;">+33 {{ $yoga->prof->tel }}</span></a></li>
                                    @endif
                                    @if($yoga->prof->email)
                                        <li><a href="mailto:{{ $yoga->prof->email }}" target="blank"><span class="icon icon-envelope"></span>&nbsp&nbsp<span class="text" style="color:black;">{{ $yoga->prof->email }}</span></a></li>
                                    @endif
                                    @if($yoga->prof->website)
                                        <li><a href="https://{{ $yoga->prof->website }}" target="blank"><i class="fas fa-desktop"></i>&nbsp&nbsp<span class="text" style="color:black;">{{ $yoga->prof->website }}</span></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="desc align-self-md-center">
                            <p style="text-align:justify;">{!! $yoga->prof->description !!}</p>
                        </div>
                    </div>


                    <div>
                        @if(count($yoga->avisActive))
                            <h3 class="mb-5">{{ count($yoga->avisActive) ? count($yoga->avisActive) : 'Aucun' }} avis</h3>
                            <ul class="comment-list">
                                @foreach($yoga->avisActive as $avis)
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
                            <!-- END comment-list -->
                        @endif

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Laissez un avis</h3>
                            <form action="{{ route('yogas.avis', array($yoga->id, 'yoga')) }}" method="POST" class="bg-light p-4">
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
                            @if(count($yoga->tags))
                                @foreach($yoga->tags as $tag)
                                    <a class="tag-cloud-link">{{ $tag->intitule }}</a>
                                @endforeach
                            @else
                                <small>Aucun tag</small>
                            @endif
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-2">Autres cours de yoga</h3>
                        @foreach(App\Models\Yoga::where('id', '<>', $yoga->id)->get()->shuffle()->take('6') as $yogaList)
                            <div class="block-21 mb-4 d-flex">
                                <a
                                    class="blog-img mr-4"
                                    href="/yogas/{{ $yogaList->id }}"
                                >
                                    @if($yogaList->image)
                                        @if($yogaList->image == '/images/white.png')
                                            <p style="background-color:#dfe8ea; border-radius:10%" class="text-center text-xxxl">
                                                <span class="{{ $yoga->icone->intitule }}" style="color:#597579; width:100%;"></span>
                                            </p>
                                        @else
                                            <img
                                                src="{{ asset($yogaList->image) }}"
                                                alt="" style="width:100%; height:100%; border-radius:10%"
                                            >
                                        @endif
                                    @elseif($yogaList->prof->image)
                                        <img
                                            src="{{ asset($yogaList->prof->image) }}"
                                            alt="" style="width:100%; height:100%; border-radius:10%"
                                        >
                                    @endif
                                </a>
                                <div class="text">
                                    <h3 class="heading"><a href="/yogas/{{ $yogaList->id }}">{{ $yogaList->intitule }}</a></h3>
                                    <div class="meta">
                                        <div><a href="/yogas/{{ $yogaList->id }}"><span class="icon-person"></span> {{ $yogaList->prof->nom }}</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{--
                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-2">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                    --}}
                </div>

            </div>
        </div>
    </section> <!-- .section -->
@endsection
