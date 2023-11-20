@extends('frontend.layouts.app')
@section('title')
    Categories
@endsection
@section('after-styles')
    {{-- <style>
        @media (min-width: 768px) {
            #topics {
                margin-top: 40px;
                margin-bottom: 40px;
            }
        }
    </style> --}}
@endsection
@section('content')
    <section class="topics" style="margin-top: 250px; margin-bottom:70px;" id="topics" aria-labelledby="topic-label">
        <div class="container">

            <div class="card topic-card">

                <div class="card-content">

                    <h2 class="headline headline-2 section-title card-title" id="topic-label">
                        Our topics
                    </h2>

                    <p class="card-text">
                        Don't miss out on the latest news about Travel tips, Hotels review, Food guide...
                    </p>

                    <div class="btn-group">
                        <button class="btn-icon" aria-label="previous" data-slider-prev>
                            <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                        </button>

                        <button class="btn-icon" aria-label="next" data-slider-next>
                            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                        </button>
                    </div>

                </div>

                <div class="slider" data-slider>
                    <ul class="slider-list" data-slider-container>
                        @forelse ($categories as $category)
                            <li class="slider-item">
                                <a href="{{route('frontend.posts', $category->id)}}" class="slider-card">

                                    <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                        <img src="{{ $category->image }}" width="507" height="618" loading="lazy"
                                            alt="" class="img-cover">
                                    </figure>

                                    <div class="slider-content">
                                        <span class="slider-title">{{ $category->name }}</span>

                                        <p class="slider-subtitle">{{ $category->posts_count }} Articles
                                        </p>
                                    </div>

                                </a>
                            </li>

                        @empty
                        @endforelse
                    </ul>
                </div>

            </div>

        </div>
    </section>
@endsection
