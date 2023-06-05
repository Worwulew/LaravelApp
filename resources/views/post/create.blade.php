@extends('layouts.layout')
@section('content')
    <div>
        <form method="post" action="{{route('post.store')}}">
            @csrf
            <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{old('title')}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" id="content" placeholder="Content">{{old('content')}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{old('image')}}">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category_id" id="category">
                    @foreach($categories as $category)
                    <option
                        {{old('category_id') == $category->id ? 'selected' : ''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select multiple class="form-control" name="tags[]" id="tags">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a class="btn" href="{{route('post.index')}}">Back</a>
        </form>
    </div>
@endsection
