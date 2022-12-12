@extends('layouts.panel')

@section('content')
<div class="container">
    <div class="card-body">
        <br>
        <h4 class="text-center">DASHBOARD</h4>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../src/assets/img/img_tren_1.jpg" alt="First slide">
                <div class="carousel-caption d-none d-sm-block">
                    <h3>First slide</h3>
                    <h5>Lorem ipsum dolor sit amet, dolore magna aliqua.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../src/assets/img/img_tren_2.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-sm-block">
                    <h3>Second slide</h3>
                    <h5>Lorem ipsum dolor sit amet, dolore magna aliqua.</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../src/assets/img/img_tren_3.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-sm-block">
                    <h3>Third slide</h3>
                    <h5>Lorem ipsum dolor sit amet, dolore magna aliqua.</h5>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div>
@endsection