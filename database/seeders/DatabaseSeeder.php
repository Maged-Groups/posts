<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use App\Models\PostType;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();


        // User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
        // ]);



        $types = [
            'blog',
            'audio',
            'video',
            'article',
            'url',
            'like',
            'social media',
            'question',
            'testimonianls',
        ];

        foreach($types as $type){
            PostType::create([
                'type' => $type
            ]);
        }

        Post::factory(100)->create();
    }
}
