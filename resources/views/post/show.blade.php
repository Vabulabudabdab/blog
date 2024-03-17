@extends('layouts.head')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$date->translatedFormat('F')}} - {{$date->day}} - {{$date->year}} - {{$date->format('H:i')}} | {{$post->comments->count()}}  Комментариев </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image" class="w-100">
            </section>
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
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                        <div class="row">
                            @if($relatedPosts->count() > 0)
                            @foreach($relatedPosts as $Relatedpost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{'../storage/'.$Relatedpost->preview_image}}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{!! $Relatedpost->title !!}</p>
                                <a href="{{route('post.show', $Relatedpost->id)}}"><h5 class="post-title">{!! $Relatedpost->content !!}</h5></a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </section>
                    <section class="comment_list mb-5">
                        @foreach($post->comments as $comment)
                        <div class="comment-text mb-5">
                            <span class="username">
                                <div>{{$comment->user->name}}</div>
                                <span class="text-muted float-right">{{$comment->DateAsCarbon->diffForHumans()}}</span>
                                {{$comment->message}}
                            </span>
                        </div>
                        @endforeach
                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{$post->comments->count()}})</h2>
                        <form action="{{route('post.comment.store', $post->id)}}" method="post">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control" placeholder="Напишите ваш прекрасный комментарий" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Отправить комментарий" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
    <script src="/assets/vendors/popper.js/popper.min.js"></script>
    <script src="/assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/assets/vendors/aos/aos.js"></script>
    <script src="/assets/js/main.js"></script>
    <script>
        AOS.init({
            duration: 2000
        });
    </script>
@endsection
