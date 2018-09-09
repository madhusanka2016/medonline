@extends('layouts.app')
@section('title', 'MedOnline - Home')

@section('content')
    <div class="container">

    </div>
    <div class="carousel   fade-carousel slide" data-ride="carousel" data-interval="10000" id="bs-carousel">

        <div class="overlay"></div>

        <ol class="carousel-indicators">
            <li data-target="#bs-carousel" data-slide-to="0" class=""></li>
            <li data-target="#bs-carousel" data-slide-to="1" class=""></li>
            <li data-target="#bs-carousel" data-slide-to="2" class="active"></li>
        </ol>

        <div class="carousel-inner" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.5)">
            <div class="item slides">
                <div class="slide-1">
                    <img src="{{ asset('img/banner/head1.png')}}"
                         class="img-responsive hidden-xs"
                         alt="cover0">
                    <img src="{{ asset('img/banner/head10.png')}}"
                         class="img-responsive visible-xs"
                         alt="cover0">
                </div>
                <div class="hero">
                </div>
            </div>
            <div class="item slides">
                <div class="slide-2">
                    <img src="{{ asset('img/banner/head1.png')}}"
                         class="img-responsive hidden-xs"
                         alt="cover1">
                    <img src="{{ asset('img/banner/head10.png')}}"
                         class="img-responsive visible-xs"
                         alt="cover1">
                </div>
                <div class="hero">
                </div>
            </div>
            <div class="item slides active">
                <div class="slide-3">
                    <img src="{{ asset('img/banner/head1.png')}}"
                         class="img-responsive hidden-xs"
                         alt="cover2">
                    <img src="{{ asset('img/banner/head10.png')}}"
                         class="img-responsive visible-xs"
                         alt="cover2">
                </div>

            </div>
        </div>

    </div>
    <hr>
    <div class="row">
        <div class="container">
            <form method="POST" action="{{ route('searchProduct') }}">
                {{ csrf_field() }}
            <div class="input-group stylish-input-group" style="margin: 10px; box-shadow: 0px 0px 3px rgba(0,0,0,0.5)">
                <input name="searchinput" style="height: 50px; " id="search-input" type="text" class="form-control"

                       placeholder="Search item"/>
                <span class="input-group-addon">
                        <button type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                <div class="result" id="search-results" name="search-results"></div>
            </div>

            </form>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @include('partials.Sidebar')
            <div class="col-lg-9 col-md-9">
                <div class="carousel-inner">
                    <div class="row" style="margin: 10px">
                        <div class="col-lg-6 col-md-6">
                            <img
                                    src="{{ asset('img/banner/offer1.png')}}" class="img-responsive hidden-xs"
                                    alt="cover0" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.5)"
                            >
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <img
                                    src="{{ asset('img/banner/offer2.png')}}" class="img-responsive hidden-xs"
                                    alt="cover0" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.5)"
                            >
                        </div>

                    </div>
                    <div class="row" style="margin: 10px">
                        <div class="col-lg-4 col-md-4">
                            <img
                                    src="{{ asset('img/banner/banner1.png')}}" class="img-responsive hidden-xs"
                                    alt="cover0" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.5)"
                            >
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img
                                    src="{{ asset('img/banner/banner2.png')}}" class="img-responsive hidden-xs"
                                    alt="cover0" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.5)"
                            >
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <img
                                    src="{{ asset('img/banner/banner3.png')}}" class="img-responsive hidden-xs"
                                    alt="cover0" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.5)"
                            >
                        </div>

                    </div>




                </div>

            </div>
        </div>
    </div>


@endsection
