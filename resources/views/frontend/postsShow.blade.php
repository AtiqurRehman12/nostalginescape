@extends('frontend.layouts.app')
@section('title')
    Posts Detail
@endsection
@push('after-styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .show {
            margin: 150px 0px;
        }

        #title {
            font-size: 25px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .post-image-container img {
            border-radius: 10px;
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

        .form {
            padding: 30px;
        }

        .mb-6 {
            margin-bottom: 1.5rem;
            /* Equivalent to 6 units of your preferred spacing unit */
        }

        .text-sm {
            font-size: 14px;
            /* You can adjust the font size as needed */
        }

        .font-medium {
            font-weight: 500;
            /* Adjust font weight as needed */
        }

        .text-gray-900 {
            color: #333;
            /* Adjust text color as needed */
        }

        .text-white {
            color: #fff;
            /* Adjust text color as needed */
        }

        .dark:text-gray-300 {
            color: #ccc;
            /* Adjust text color for dark mode */
        }

        .bg-gray-50 {
            background-color: #f7fafc;
            /* Adjust background color as needed */
        }

        .bg-blue-700 {
            background-color: #4a90e2;
            /* Adjust background color as needed */
        }

        .hover:bg-blue-800:hover {
            background-color: #3577c9;
            /* Adjust hover background color as needed */
        }

        .focus:ring-4:focus {
            /* Define focus ring styles, e.g., box-shadow or border */
        }

        .focus:outline-none:focus {
            outline: none;
            /* Remove the default focus outline */
        }

        .rounded-lg {
            border-radius: 8px;
            /* Adjust border radius as needed */
        }

        .p-2.5 {
            padding: 10px;
            /* Adjust padding as needed */
        }

        .w-full {
            width: 100%;
            /* Set width to 100% of the parent container */
        }

        .w-auto {
            width: auto;
            /* Allow the element to size itself based on content */
        }

        .px-5 {
            padding-left: 20px;
            /* Adjust horizontal padding as needed */
            padding-right: 20px;
        }

        .py-2.5 {
            padding-top: 10px;
            /* Adjust vertical padding as needed */
            padding-bottom: 10px;
        }

        .text-center {
            text-align: center;
            /* Center-align text within the element */
        }

        @media (max-width: 769px) {
            .show {
                margin: 155px 0;
            }

            .post-image-container img {
                margin-top: 20px;
            }
        }
    </style>
@endpush
@section('content')
    <section class="show">
        <div class="container">
            <div id="title">
                {{ $post->name }}
            </div>
            @if ($post->images)
                @php
                    $images = explode(',', $post->images);
                @endphp

                <div class="owl-carousel owl-theme">
                    @foreach ($images as $image)
                        <div class="item">
                            <img src="{{ $image }}" alt="">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="post-image-container">
                    <img src="{{ $post->featured_image }}" class="img-fluid rounded" alt="">
                </div>
            @endif
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


    <section id="comments" style="margin: 20px 0px;">
        <div class="py-10" x-data="{ commentBlock: false }">
            <div class="container mx-auto px-5">
                <h3 class="text-xl">
                    @if ($post->comments->count())
                        {{-- <span class="mr-2">{{ $post->comments->count() }}</span> --}}
                    @endif

                    @lang('Comments')
                </h3>
                @guest
                    <div class="py-10 flex justify-center">
                        <div>
                            <a href="{{ route('login') }}?redirectTo={{ url()->current() }}"
                                class="btn btn-primary">{{ __('Login & Write comment') }}</a>
                        </div>
                    </div>
                @else
                    <div class="flex justify-center mx-auto">
                        <div>
                            <button class="btn btn-primary"
                                @click="commentBlock = !commentBlock">{{ __('Write a comment') }}</button>
                        </div>
                    </div>

                    <div x-show="commentBlock" x-collapse>
                        <div>
                            <div class="flex justify-center mx-auto">
                                <div class="text-center py-10">
                                    Your comment will be in the moderation queue. If your comment will be approved, you will get
                                    notification and it will be displayed here.
                                    <br>
                                    Please submit once & wait till published.
                                </div>
                            </div>

                            <form method="POST" action="{{ route('frontend.comments.store') }}" class="form">
                                @csrf
                                <div class="mb-6">
                                    <label for="name" class="mb-2 text-sm font-medium" style="color:aqua;">Subject</label>
                                    <input type="text" name="name" id="name" placeholder=""
                                        style="height:40px; padding-left:30px;" required
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                                              focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                                              dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                                              dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div class="mb-6">
                                    <label for="comment" class="mb-2 text-sm font-medium" style="color:aqua;">Comment</label>
                                    <textarea name="comment" id="comment" autocomplete="off" style="margin: 0; padding:0;" placeholder="" required
                                        rows="4"
                                        class="block w-full text-gray-900 bg-gray-50 rounded-lg
                                                 border border-gray-300 focus:ring-blue-500 focus:border-blue-500
                                                 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                                                 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </textarea>
                                </div>

                                <input type="hidden" name="post_id" value="{{ encode_id($post->id) }}" required>
                                <input type="hidden" name="user_id" value="{{ encode_id(auth()->user()->id) }}" required>

                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4
                                    focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full
                                    sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover-bg-blue-700 dark:focus:ring-blue-800"
                                    style="height: 40px;">Submit</button>
                            </form>

                        </div>


                    </div>

                @endguest
            </div>
        </div>
    </section>

    <div class="container" style="margin-top:30px; margin-bottom:30px;">
        <div class="mt-5">
            @php
                $comments_all = $post->comments;
                $comments_level1 = $comments_all->where('parent_id', '');
            @endphp

            @foreach ($comments_level1 as $comment)
                <div class="flex flex-col my-10 card" style="padding:20px;">
                    <div>
                        @php

                            $fullName = $comment->user_name;
                            $nameParts = explode(' ', $fullName);

                            if (count($nameParts) >= 1) {
                                $firstName = $nameParts[0];
                            } else {
                                // Handle the case where there is no space in the name
                                $firstName = $fullName;
                            }
                        @endphp
                        <a href="#"
                            class="block p-6  bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <h4 class="mb-2 text-xl font-bold tracking-tight" style="display: flex; align-items: center;">
                                <ion-avatar style="margin-right: 8px;">
                                    <img alt="Silhouette of a person's head"
                                        style="height: 20px; width: 20px; border-radius: 50%;"
                                        src="https://ionicframework.com/docs/img/demos/avatar.svg" />
                                </ion-avatar>
                                {{ $firstName }} said:
                            </h4>
                            <div class="font-normal text-gray-700 dark:text-gray-400 container">
                                {!! $comment->comment !!}
                            </div>
                        </a>
                    </div>

                    @php
                        $comments_of_comment = $comments_all->where('parent_id', $comment->id);
                    @endphp
                    <details>
                        <summary>More Actions</summary>
                        <div>
                            @if ($comments_of_comment)
                                @foreach ($comments_of_comment as $comment_reply)
                                    @php
                                        $fullName = $comment_reply->user_name;
                                        $nameParts = explode(' ', $fullName);
                                        $firstName = $nameParts[0];
                                    @endphp

                                    <div class="ml-4 my-4" style="margin-left:20px; margin-top:10px;">
                                        <h4 class="mb-2 text-xl font-bold tracking-tight"
                                            style="display: flex; align-items: center;">
                                            <ion-avatar style="margin-right: 8px;">
                                                <img alt="Silhouette of a person's head"
                                                    style="height: 20px; width: 20px; border-radius: 50%;"
                                                    src="https://ionicframework.com/docs/img/demos/avatar.svg" />
                                            </ion-avatar>
                                            {{ $firstName }} replied:
                                        </h4>
                                        <a href="#"
                                            class="block p-6 bg-white container rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"
                                            style="margin-left:30px;">
                                            <div class="font-normal text-gray-700 dark:text-gray-400">
                                                {!! $comment_reply->comment !!}
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            @endif

                            @guest
                                <a href="{{ route('login') }}?redirectTo={{ url()->current() }}"
                                    class="btn btn-primary btn-sm float-end m-0"><i class="fas fa-user-shield"></i>
                                    Login & Reply</a>
                            @else
                                <div class="mt-4">
                                    {{ html()->form('POST', route('frontend.comments.store'))->class('form flex flex-row')->open() }}

                                    <?php
                                    $field_name = 'parent_id';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = 'required';
                                    ?>
                                    {{ html()->hidden($field_name)->value(encode_id($comment->id))->attributes(["$required"]) }}

                                    <?php
                                    $field_name = 'post_id';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = 'required';
                                    ?>
                                    {{ html()->hidden($field_name)->value(encode_id($post->id))->attributes(["$required"]) }}

                                    <?php
                                    $field_name = 'user_id';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = 'required';
                                    ?>
                                    {{ html()->hidden($field_name)->value(encode_id(auth()->user()->id))->attributes(["$required"]) }}

                                    <?php
                                    $field_name = 'name';
                                    $field_lable = label_case($field_name);
                                    $field_placeholder = $field_lable;
                                    $required = 'required';
                                    ?>
                                    {{ html()->hidden($field_name)->value('Reply of ' . $comment->name)->attributes(["$required"]) }}
                                    {{ html()->hidden($field_name)->value(encode_id(auth()->user()->id))->attributes(["$required"]) }}

                                    <div class="flex-auto mx-4">
                                        <?php
                                        $field_name = 'comment';
                                        $field_lable = 'Reply';
                                        $field_placeholder = $field_lable;
                                        $required = 'required';
                                        ?>
                                        {{ html()->text($field_name)->placeholder($field_placeholder)->class('block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500')->style('height:40px;')->attributes(["$required"]) }}
                                    </div>

                                    <div>
                                        <button type="submit"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                            style="height: 30px;margin-top:20px;">Submit</button>
                                    </div>

                                    {{ html()->form()->close() }}
                                </div>
                            @endguest

                        </div>
                    </details>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('after-scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>
@endpush
