@extends('layouts.admin')
@section('adminContent')
    <div>
        <div>{{$post->id}}. {{$post->title}}</div>
        <div>{{$post->content}}</div>
        <div>{{$post->image}}</div>
        <br>
    </div>
    <div>
        @can('update', auth()->user())
            <a class="btn btn-primary" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
        @endcan
        <a class="btn btn-secondary" href="{{route('admin.posts.index')}}">Back</a>
        @can('delete', auth()->user())
            <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                @csrf
                @method('delete')
                <input type="submit" class="btn btn-danger" value="Delete">
            </form>
        @endcan
    </div>
@endsection
