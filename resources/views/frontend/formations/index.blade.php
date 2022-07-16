@extends('frontend.layout.app')
@section('title', 'Formations • ')

@section('content')
    <div class="topSpacement"></div>

    <section class="ftco-section py-5" id="section1">
        @include("frontend.formations.liste")
    </section>
@endsection
