<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index"><img style="height:100px; width:auto;" src="{{asset('images/logo.png')}}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu" style="padding-right:20px;"></span>
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item home"><a href="/" class="nav-link @if(Session::get('lien') == '/home') active @endif">Accueil</a></li>
                <li class="nav-item yoga"><a href="/yogas#reservation" class="nav-link @if(Session::get('lien') == '/yogas') active @endif">Yoga</a></li>
                <li class="nav-item therapies"><a href="/therapies" class="nav-link @if(Session::get('lien') == '/therapies') active @endif">Thérapies</a></li>
                <li class="nav-item ateliers"><a href="/ateliers" class="nav-link @if(Session::get('lien') == '/ateliers') active @endif">Ateliers</a></li>
                <li class="nav-item temoignages"><a href="/temoignages" class="nav-link @if(Session::get('lien') == '/temoignages') active @endif">Témoignages</a></li>
                {{--
                <li class="nav-item galerie @if(Session::get('lien') == '/galerie') active @endif"><a href="/galerie" class="nav-link">En image</a></li>
                --}}
                <li class="nav-item contact"><a href="/contact" class="nav-link @if(Session::get('lien') == '/contact') active @endif">Contact</a></li>
                <div class="underbar"></div>
            </ul>
        </div>
    </div>
</nav>
