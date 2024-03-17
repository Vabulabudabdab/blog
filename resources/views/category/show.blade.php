@extends('layouts.head')
@section('content')
    <section class="featured-posts-section">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{'/storage/'.$post->preview_image}}" alt="blog post" class="img-thumbnail">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="blog-post-category">{{$post->category->title}}</p>
                        @auth()
                            <form action="{{route('post.like.store', $post->id)}}" method="post">
                                {{csrf_field()}}
                                <button type="submit" class="border-0 bg-transparent">
                                    <i class="fa{{auth()->user()->likedPosts->contains($post->id) ? 's' : 'r'}} fa-heart"></i> {{$post->liked_users_count}}
                                </button>
                            </form>
                        @endauth()
                        @guest()
                            <div>
                                <i class="far fa-heart"></i>
                                <span> {{$post->liked_users_count}}</span>
                            </div>
                        @endguest
                    </div>
                    <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                        <h6 class="blog-post-title">{{$post->title}}</h6>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="mx-auto">
{{--                {{$posts->links()}}--}}
            </div>
        </div>
    </section>
    <script src="/assets/vendors/popper.js/popper.min.js"></script>
    <script src="/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/vendors/aos/aos.js"></script>
    <script src="/assets/js/main.js"></script>
    <script>
        AOS.init({
            duration: 1000
        });
    </script>
@endsection
