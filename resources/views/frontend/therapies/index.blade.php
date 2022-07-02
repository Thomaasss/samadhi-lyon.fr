@extends('frontend.layout.app')
@section('title', 'Thérapies • ')

@section('content')
<div class="topSpacement"></div>

<section class="ftco-section py-5" id="section1">
    @include("frontend.therapies.liste")
</section>
@endsection
