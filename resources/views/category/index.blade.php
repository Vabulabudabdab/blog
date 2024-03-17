@extends('layouts.head')

@section('content')

<section class="featured-posts-section">

    <div class="row">
        <div class="mx-auto">
            @foreach($category as $categories)
                <ul>
                    <li><a href="{{route('category.show', $categories->id)}}">{{$categories->title}}</a></li>
                </ul>
            @endforeach
        </div>
    </div>
</section>
@endsection
