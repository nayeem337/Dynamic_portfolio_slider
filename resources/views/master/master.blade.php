<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fotor Personal Portfolio">
    <meta name="keywords" content="portfolio,resume,personal,cv,one page">
    <meta name="author" content="Yucel Yilmaz">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

     @include('includes.linked')
     @include('includes.style')
    <title>@yield('title')</title>
</head>

<body data-spy="scroll" data-target="#fixedNavbar">

<div class="page-wrapper">
    <header class="header fixed-top default-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg p-0 bg-transparent">
                <div class="container">

                    @php
                    $logos = \App\Models\Logo::all();
                    @endphp

                        @foreach($logos as $logo)
                    <a href="{{ route('home.home') }}">
                        <img src="{{asset($logo->image) }}" alt="" height="70" width="90">
                    </a>
                    @endforeach

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse main-menu justify-content-end" id="fixedNavbar" >
                        <ul class="navbar-nav navbar-expand " >

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('home.home') }}">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about.about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('education.education') }}">Education</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('service.service') }}">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('portfolio.portfolio') }}">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link" href="{{ route('contact.add') }}">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link menu-link btn" id="toggle-mode">
                                    <button class="btn btn-secondary">Mode</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
@php
    $sliders=\App\Models\Slider::all();
@endphp

<section>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1800">
        <div class="carousel-indicators">
            @foreach($sliders as $key => $slider)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $loop->iteration == 1 ? 'active':'' }}" aria-current="true" aria-label="Slide 1"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($sliders as $slider)
            <div class="carousel-item {{ $loop->iteration == 1 ? 'active':'' }}">
                <img src="{{ asset($slider->image ?? '') }}" class="d-block w-100" alt="...">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>







@yield('body')
@include('includes.sidebar')
@include('includes.footer')
@include('includes.script')
</body>

</html>
