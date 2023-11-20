@extends('frontend.layouts.app')

@section('title')
Home
@endsection

@section('content')
    <main class="index">
        <article>
            <section class="hero" id="home" aria-label="home">
                <div class="container" style="display: block;">

                    <div class="hero-content">

                        <p class="hero-subtitle">Hello Everyone!</p>
                        @php
                            $intro = DB::table('infos')->first();
                        @endphp
                        <h1 class="headline headline-1 section-title">
                            {{-- I’m <span class="span">Wren Clark</span> --}}
                            {{$intro->intro}}
                        </h1>

                        <p class="hero-text">
                            {{$intro->intro_text}}
                        </p>

                        {{-- <div class="input-wrapper">

                            <input type="email" name="email_address" placeholder="Type your email address" required
                                class="input-field" autocomplete="off">

                            <button class="btn btn-primary">
                                <span class="span">Subscribe</span>

                                <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                            </button>

                        </div> --}}

                    </div>

                    {{-- <div class="hero-banner">

                        <img src="{{ asset('frontend/assets/images/hero-banner.png') }}" width="327" height="490"
                            alt="Wren Clark" class="w-100">

                        <img src="{{ asset('frontend/assets/images/pattern-2.svg') }}" width="27" height="26"
                            alt="shape" class="shape shape-1">

                        <img src="{{ asset('frontend/assets/images/pattern-3.svg') }}" width="27" height="26"
                            alt="shape" class="shape shape-2">

                    </div> --}}

                    <img src="{{ asset('frontend/assets/images/shadow-1.svg') }}" width="500" height="800"
                        alt="" class="hero-bg hero-bg-1">

                    <img src="{{ asset('frontend/assets/images/shadow-2.svg') }}" width="500" height="500"
                        alt="" class="hero-bg hero-bg-2">

                </div>
            </section>



            <section class="topics" id="topics" aria-labelledby="topic-label">
                <div class="container">

                    <div class="card topic-card">

                        <div class="card-content">

                            <h2 class="headline headline-2 section-title card-title" id="topic-label">
                                Hot topics
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
                                @forelse ($categoriesWithMostPosts as $categoryWithMostPosts)
                                    <li class="slider-item">
                                        <a href="{{route('frontend.posts', $categoryWithMostPosts)}}" class="slider-card">

                                            <figure class="slider-banner img-holder" style="--width: 507; --height: 618;">
                                                <img src="{{ $categoryWithMostPosts->image }}" width="507" height="618"
                                                    loading="lazy" alt="Sport" class="img-cover">
                                            </figure>

                                            <div class="slider-content">
                                                <span class="slider-title">{{ $categoryWithMostPosts->name }}</span>

                                                <p class="slider-subtitle">{{ $categoryWithMostPosts->post_count }} Articles
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
            <!--
                - #FEATURED POST
              -->

            <section class="section feature" aria-label="feature" id="featured">
                <div class="container">

                    <h2 class="headline headline-2 section-title">
                        <span class="span">Editor's picked</span>
                    </h2>

                    <p class="section-text">
                        Featured and highly rated articles
                    </p>

                    <ul class="feature-list">
                        @forelse ($featuredPosts as $featuredPost)
                        @php
                            $postTags = $featuredPost->tags;
                        @endphp
                            <li>
                                <div class="card feature-card" style="min-height: 500px;">

                                    <figure class="card-banner img-holder" style="--width: 1602; --height: 903;">
                                        <img src="{{ $featuredPost->featured_image }}" width="1602" height="903"
                                            loading="lazy" alt="" class="img-cover">
                                    </figure>

                                    <div class="card-content">

                                        <div class="card-wrapper">
                                            <div class="card-tag">
                                              @foreach ($postTags as $postTag)
                                              <a href="#" class="span hover-2">{{$postTag}}</a>
                                                  
                                              @endforeach

                                            </div>

                                        </div>

                                        <h3 class="headline headline-3">
                                            <a href="{{route('frontend.post.show', $featuredPost->id)}}" class="card-title hover-2">
                                                {{ $featuredPost->name }}
                                            </a>
                                        </h3>

                                        <div class="card-wrapper">

                                            <div class="profile-card">
                                                {{-- <img src="./assets/images/author-1.png" width="48" height="48" loading="lazy" alt="Joseph"
                        class="profile-banner"> --}}

                                                <div>
                                                    <p class="card-title">Admin</p>

                                                    <p class="card-subtitle">
                                                        {{ $featuredPost->published_at->format('F j, Y h:i A') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <a href="{{route('frontend.post.show', $featuredPost->id)}}" class="card-btn">Read more</a>

                                        </div>

                                    </div>

                                </div>
                            </li>

                        @empty
                        @endforelse

                    </ul>

                    <a href="#" class="btn btn-secondary">
                        <span class="span">Show More Posts</span>

                        <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>

                </div>

                <img src="{{asset('frontend/assets/images/shadow-3.svg')}}" width="500" height="1500" loading="lazy" alt=""
                    class="feature-bg">

            </section>


            <!--
            - #POPULAR TAGS
          -->

            <section class="tags" aria-labelledby="tag-label">
                <div class="container">

                    <h2 class="headline headline-2 section-title" id="tag-label">
                        <span class="span">Popular Tags</span>
                    </h2>

                    <p class="section-text">
                        Most searched keywords
                    </p>

                    <ul class="grid-list">
                        @foreach ($tags as $tag)
                            <li>
                                <button class="card tag-btn">
                                    <img src="{{ $tag->image }}" width="32" height="32" loading="lazy"
                                        alt="Travel">

                                    <p class="btn-text" style="font-size: 12px;">{{ $tag->name }}</p>
                                </button>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </section>



            {{-- Recent Posts --}}
            <section class="section recent-post" id="recent" aria-labelledby="recent-label">
              <div class="container">
      
                <div class="post-main">
      
                  <h2 class="headline headline-2 section-title">
                    <span class="span">Recent posts</span>
                  </h2>
      
                  <p class="section-text">
                    Don't miss the latest trends
                  </p>
      
                  <ul class="grid-list">
                    @forelse ($recentPosts as $recentPost)
                    @php
                        $category = $recentPost->category;
                        $tags = $recentPost->tags;
                    @endphp
                    <li>
                      <div class="recent-post-card">
      
                        <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                          <img src="{{$recentPost->featured_image}}" width="271" height="258" loading="lazy"
                            alt="" class="img-cover">
                        </figure>
      
                        <div class="card-content">
      
                          <a href="#" class="card-badge">{{$category->name}}</a>
      
                          <h3 class="headline headline-3 card-title">
                            <a href="{{route('frontend.post.show', $recentPost->id)}}" class="link hover-2">{{$recentPost->name}}</a>
                          </h3>
      
                          <p class="card-text">
                          {{$recentPost->intro}}
                          </p>
      
                          <div class="card-wrapper">
                            <div class="card-tag">
                              @forelse ($tags as $tag)
                              <a href="#" class="span hover-2"># {{$tag->name}}</a>
      
                              @empty
                                  
                              @endforelse
                            </div>
      
                            {{-- <div class="wrapper">
                              <ion-icon name="time-outline" aria-hidden="true"></ion-icon>
      
                              <span class="span">3 mins read</span>
                            </div> --}}
                          </div>
      
                        </div>
      
                      </div>
                    </li>
                        
                    @empty
                        
                    @endforelse
      
                  </ul>
      
                  {{-- <nav aria-label="pagination" class="pagination">
      
                    <a href="#" class="pagination-btn" aria-label="previous page">
                      <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
                    </a>
      
                    <a href="#" class="pagination-btn">1</a>
                    <a href="#" class="pagination-btn">2</a>
                    <a href="#" class="pagination-btn">3</a>
                    <a href="#" class="pagination-btn" aria-label="more page">...</a>
      
                    <a href="#" class="pagination-btn" aria-label="next page">
                      <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
                    </a>
      
                  </nav> --}}

                  @include('components.frontend.custom-pagination', ['paginator' => $recentPosts])

      
                </div>
      
                <div class="post-aside grid-list">
      
                  <div class="card aside-card">
      
                    <h3 class="headline headline-2 aside-title">
                      <span class="span">Popular Posts</span>
                    </h3>
      
                    <ul class="popular-list">
                      @forelse ($popularPosts as $popularPost)
                      <li>
                        <div class="popular-card">
                          <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                            <img src="{{$popularPost->featured_image}}" width="64" height="64" loading="lazy"
                              alt="" class="img-cover">
                          </figure>
      
                          <div class="card-content">
      
                            <h4 class="headline headline-4 card-title">
                              <a href="#" class="link hover-2">{{$popularPost->name}}</a>
                            </h4>
      
                            <div class="warpper">      
                              <time class="publish-date" datetime="2022-04-15">{{ $popularPost->published_at->format('F j, Y') }}
                              </time>
                            </div>
      
                          </div>
      
                        </div>
                      </li>
                          
                      @empty
                          
                      @endforelse
      
                    </ul>
      
                  </div>
      
                  {{-- <div class="card aside-card">
      
                    <h3 class="headline headline-2 aside-title">
                      <span class="span">Last Comment</span>
                    </h3>
      
                    <ul class="comment-list">
      
                      <li>
                        <div class="comment-card">
      
                          <blockquote class="card-text">
                            “ Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                            roadrunner “
                          </blockquote>
      
                          <div class="profile-card">
                            <figure class="profile-banner img-holder">
                              <img src="./assets/images/author-6.png" width="32" height="32" loading="lazy" alt="Jane Cooper">
                            </figure>
      
                            <div>
                              <p class="card-title">Jane Cooper</p>
      
                              <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                            </div>
                          </div>
      
                        </div>
                      </li>
      
                      <li>
                        <div class="comment-card">
      
                          <blockquote class="card-text">
                            “ Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                            roadrunner “
                          </blockquote>
      
                          <div class="profile-card">
                            <figure class="profile-banner img-holder">
                              <img src="./assets/images/author-7.png" width="32" height="32" loading="lazy" alt="Katen Doe">
                            </figure>
      
                            <div>
                              <p class="card-title">Katen Doe</p>
      
                              <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                            </div>
                          </div>
      
                        </div>
                      </li>
      
                      <li>
                        <div class="comment-card">
      
                          <blockquote class="card-text">
                            “ Gosh jaguar ostrich quail one excited dear hello and bound and the and bland moral misheard
                            roadrunner “
                          </blockquote>
      
                          <div class="profile-card">
                            <figure class="profile-banner img-holder">
                              <img src="./assets/images/author-8.png" width="32" height="32" loading="lazy"
                                alt="Barbara Cartland">
                            </figure>
      
                            <div>
                              <p class="card-title">Barbara Cartland</p>
      
                              <time class="card-date" datetime="2022-04-15">15 April 2022</time>
                            </div>
                          </div>
      
                        </div>
                      </li>
      
                    </ul>
      
                  </div> --}}
      
                  {{-- <div class="card aside-card insta-card">
      
                    <a href="#" class="logo">
                      <img src="./assets/images/logo.svg" width="119" height="37" loading="lazy" alt="Wren logo">
                    </a>
      
                    <p class="card-text">
                      Follow us on instagram
                    </p>
      
                    <ul class="insta-list">
      
                      <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                          <img src="./assets/images/insta-post-1.png" width="276" height="277" loading="lazy" alt="insta post"
                            class="img-cover">
                        </a>
                      </li>
      
                      <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                          <img src="./assets/images/insta-post-2.png" width="276" height="277" loading="lazy" alt="insta post"
                            class="img-cover">
                        </a>
                      </li>
      
                      <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                          <img src="./assets/images/insta-post-3.png" width="276" height="277" loading="lazy" alt="insta post"
                            class="img-cover">
                        </a>
                      </li>
      
                      <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                          <img src="./assets/images/insta-post-4.png" width="276" height="277" loading="lazy" alt="insta post"
                            class="img-cover">
                        </a>
                      </li>
      
                      <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                          <img src="./assets/images/insta-post-5.png" width="276" height="277" loading="lazy" alt="insta post"
                            class="img-cover">
                        </a>
                      </li>
      
                      <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                          <img src="./assets/images/insta-post-6.png" width="276" height="277" loading="lazy" alt="insta post"
                            class="img-cover">
                        </a>
                      </li>
      
                      <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                          <img src="./assets/images/insta-post-7.png" width="276" height="277" loading="lazy" alt="insta post"
                            class="img-cover">
                        </a>
                      </li>
      
                      <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                          <img src="./assets/images/insta-post-8.png" width="276" height="277" loading="lazy" alt="insta post"
                            class="img-cover">
                        </a>
                      </li>
      
                      <li>
                        <a href="#" class="insta-post img-holder" style="--width: 276; --height: 277;">
                          <img src="./assets/images/insta-post-9.png" width="276" height="277" loading="lazy" alt="insta post"
                            class="img-cover">
                        </a>
                      </li>
      
                    </ul>
      
                  </div> --}}
      
                </div>
      
              </div>
            </section>
        </article>
    </main>
@endsection
