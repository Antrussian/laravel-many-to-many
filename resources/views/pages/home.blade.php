@extends('layouts.app')

@section('main-content')

<div class="hero-container">
    
</div>

<section class="products bg-dark">
    <div class="container">
        <div class="row">
            <div class="row row-cols-12">
            
                @foreach ($products as $product )
                        
               
                    <div class="col p-1">
                        <div class="card bg-dark">
                            <img class="thumb" src="{{ $product['thumb']}}" alt="">
                                <div class="card-body bg-dark p-2 ">
                                    <h5 class="title">
                                        {{ $product['title'] }}
                                    </h5>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="cta-home">
        <button class="load-more">
            LOAD MORE
        </button>
    </div>

</section>

<div class="info">
    <ul class="icon-ul">
        <li><span><img class="icon" src="{{Vite::asset('resources/img/buy-comics-digital-comics.png')}}" alt="logo" class="img-fluid "></span> DIGITAL COMICS</li>
        <li><span><img class="icon" src="{{Vite::asset('resources/img/buy-comics-merchandise.png')}}" alt="logo" class="img-fluid "></span> DIGITAL COMICS</li>
        <li><span><img class="icon" src="{{Vite::asset('resources/img/buy-comics-shop-locator.png')}}" alt="logo" class="img-fluid "></span> DIGITAL COMICS</li>
        <li><span><img class="icon" src="{{Vite::asset('resources/img/buy-comics-subscriptions.png')}}" alt="logo" class="img-fluid "></span> DIGITAL COMICS</li>
        <li><span><img class="icon" src="{{Vite::asset('resources/img/buy-dc-power-visa.svg')}}" alt="logo" class="img-fluid "></span> DIGITAL COMICS</li>
    </ul>
    
</div>


@endsection