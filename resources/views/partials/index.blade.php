@extends('layouts.master')

@section('title')
Alchemortem
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-12 welcome">
        <h1>Welcome to Alchemortem</h1>
        <p>Alchemortem specializes in custom jewelry made from organic materials. All items are available in brass or silver. Please take a look at our products and enjoy! If you have any questions about the products or if you would like to talk with Jackie about a custom piece, check out our FAQ page or contact here <a href="mailto:alchemortem@gmail.com">here</a>.</p>
    </div>
    <div class="col-lg-6 col-md-6 col-md-offset-3">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ URL::to('images/jawbone-earrings-2.jpg') }}" alt="Jawbone earrings close up">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ URL::to('images/large-vert-earrings-1.jpg') }}" alt="Large vertebrae earrings close up">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ URL::to('images/small-vert-earrings-1.jpg') }}" alt="Small vertebrae earrings">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>   
@endsection