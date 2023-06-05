<?php

namespace App\Services\Post;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        try
        {
            $tags = $data['tags'];
            unset($data['tags']);

            $post = Post::create($data);
            $post->tags()->attach($tags);
        }
        catch (\Exception $exception)
        {
            return $exception->getMessage();
        }

    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post = $post->fresh();
        $post->tags()->sync($tags);
    }
}
