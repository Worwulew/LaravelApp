@extends('layouts.layout')
@section('content')
    @include('includes.post.search')
    <div>
        @foreach($posts as $post)
            <div><a href="{{route('post.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
            <div>{{$post->content}}</div>
            <div>{{$post->image}}</div><br>
        @endforeach
        <div>
            {{$posts->withQueryString()->links()}}
        </div>
    </div>
@endsection
