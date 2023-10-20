@extends('frontend.layouts.app')
@section('title')
    Posts Detail
@endsection
@push('after-styles')
    <style>
        .show{
            margin: 50px 0px;
        }
        .post-image-container img {
            border-radius: 10px;
            margin-top: 120px;
            width: 100%;
        }

        .post-author {
            text-align: right;
        }

        #intro {
            border: 1px solid gray;
            border-radius: 10px;
            padding: 10px;
            margin: 20px 0px;
        }

        .ssrcss-11r1m41-RichTextComponentWrapper {
            max-width: none !important;
        }
    </style>
@endpush
@section('content')
    <section class="show" >
        <div class="container">
            <div class="post-image-container">
                <img src="{{ $post->featured_image }}" class="img-fluid rounded" alt="">
            </div>
            <div class="post-author">
                <i>{{ $post->published_at->format('F j, Y') }} -</i>
                <i>Admin</i>
            </div>

            <div id="intro">
                {{ $post->intro }}
            </div>
            <div id="content">
                {!! $post->content !!}
            </div>

        </div>

    </section>
@endsection
