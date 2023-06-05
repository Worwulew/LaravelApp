@extends('layouts.layout')
@section('content')
    @include('includes.post.search')
    <div>
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
        <div>{{$post->image}}</div>
        <br>
    </div>
    <div>
        @can('update', $post)
            <a class="btn btn-primary" href="{{route('post.edit', $post->id)}}">Edit</a>
        @endcan
        <a class="btn btn-secondary" href="{{route('post.index')}}">Back</a>
        @can('delete', $post)
            <form action="{{route('post.destroy', $post->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        @endcan
    </div>
@endsection
