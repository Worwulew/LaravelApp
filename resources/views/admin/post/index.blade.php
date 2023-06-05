@extends('layouts.admin')

@section('adminContent')
    <div>
        @foreach($posts as $post)
            <div><a href="{{route('admin.posts.show', $post->id)}}">{{$post->id}}. {{$post->title}}</a></div>
            <div>{{$post->content}}</div>
            <div>{{$post->image}}</div><br>
        @endforeach
        <div>
            {{$posts->withQueryString()->links()}}
        </div>
    </div>
@endsection
