<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required',
            'tags' => 'required'
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'required',
            'tags' => 'required'
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post = $post->fresh();
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public  function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public  function restore()
    {
        $post = Post::withTrashed()->find(2);
        $post->restore();
        dd('post restored');
    }

    public function firstOrCreate()
    {
        $anotherPost = [
            'title' => 'third post',
            'content' => 'third content',
            'image' => 'imagine',
            'likes' => 328,
            'is_published' => 1
        ];

        $post = Post::firstOrCreate(['title' => 'third post'], $anotherPost);
        dump($post->content);
        dd('foc');
    }

    public function UpdateOrCreate()
    {
        $anotherPost = [
            'title' => 'created post',
            'content' => 'created post content',
            'image' => 'imagine',
            'likes' => 127,
            'is_published' => 1
        ];

        $post = Post::updateOrCreate(['title' => 'created post'], $anotherPost);
        dump($post->content);
        dd('uoc');
    }
}
