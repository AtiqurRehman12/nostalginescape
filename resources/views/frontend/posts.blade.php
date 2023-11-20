@extends('frontend.layouts.app')
@section('title')
    Posts
@endsection
@section('content')
<section class="section recent-post" id="recent" aria-labelledby="recent-label">
    <div class="container" style="margin-top: 150px;">
      <div class="post-main">
        <h2 class="headline headline-2 section-title">
          <span class="span">Recent posts</span>
        </h2>
        <p class="section-text">
          Don't miss the latest trends
        </p>

        <ul class="grid-list">
          @forelse ($posts as $post)
          @php
              $category = $post->category;
              $tags = $post->tags;
          @endphp
          <li>
            <div class="recent-post-card">

              <figure class="card-banner img-holder" style="--width: 271; --height: 258;">
                <img src="{{$post->featured_image}}" width="271" height="258" loading="lazy"
                  alt="" class="img-cover">
              </figure>

              <div class="card-content">

                <a href="{{route('frontend.posts', $category->id)}}" class="card-badge">{{$category->name}}</a>

                <h3 class="headline headline-3 card-title">
                  <a href="{{route('frontend.post.show', $post->id)}}" class="link hover-2">{{$post->name}}</a>
                </h3>

                <p class="card-text">
                  {{$post->intro}}
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

        @include('components.frontend.custom-pagination', ['paginator' => $posts])


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
                      <a href="{{route('frontend.post.show', $popularPost->id)}}" class="link hover-2">{{$popularPost->name}}</a>
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
          <div class="card aside-card">
  
            <h3 class="headline headline-2 aside-title">
              <span class="span">Hot Posts</span>
            </h3>
  
            <ul class="popular-list">
              @forelse ($featuredPosts as $featuredPost)
              <li>
                <div class="popular-card">
                  <figure class="card-banner img-holder" style="--width: 64; --height: 64;">
                    <img src="{{$featuredPost->featured_image}}" width="64" height="64" loading="lazy"
                      alt="" class="img-cover">
                  </figure>
  
                  <div class="card-content">
  
                    <h4 class="headline headline-4 card-title">
                      <a href="{{route('frontend.post.show',$featuredPost->id )}}" class="link hover-2">{{$featuredPost->name}}</a>
                    </h4>
  
                    <div class="warpper">      
                      <time class="publish-date" datetime="2022-04-15">{{ $featuredPost->published_at->format('F j, Y') }}
                      </time>
                    </div>
  
                  </div>
  
                </div>
              </li>
                  
              @empty
                  
              @endforelse
  
            </ul>
  
          </div>
      </div>

    </div>
  </section>
@endsection