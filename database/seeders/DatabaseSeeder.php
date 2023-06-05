<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Category::factory(5)->create();
        $tags = Tag::factory(10)->create();
        $posts = Post::factory(48)->create();

        foreach ($posts as $post)
        {
            $tagIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagIds);
        }

        // \App\Models\User::factory(10)->create();
    }
}
