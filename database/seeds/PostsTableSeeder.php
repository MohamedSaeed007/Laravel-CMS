<?php

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Tester 1',
            'email' => 'test1@test.com',
            'password' => Hash::make('password')
        ]);

        $user2 = User::create([
            'name' => 'Tester 2',
            'email' => 'test2@test.com',
            'password' => Hash::make('password')
        ]);

        $user3 = User::create([
            'name' => 'Tester 3',
            'email' => 'test3@test.com',
            'password' => Hash::make('password')
        ]);

        $category1 = Category::create([
            'name' => 'category 1'
        ]);
        $category2 = Category::create([
            'name' => 'category 2'
        ]);
        $category3 = Category::create([
            'name' => 'category 3'
        ]);
        $category4 = Category::create([
            'name' => 'category 4'
        ]);
        $tag1 = Tag::create([
            'name' => 'tag 1'
        ]);
        $tag2 = Tag::create([
            'name' => 'tag 2'
        ]);
        $tag3 = Tag::create([
            'name' => 'tag 3'
        ]);
        $tag4 = Tag::create([
            'name' => 'tag 4'
        ]);
        $post1 = $user1->posts()->create([
            'title' => 'Post 1',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id' => $category1->id,
            'image'=> 'posts/1.jpg',
        ]);
        $post2 = $user2->posts()->create([
            'title' => 'Post 2',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id' => $category2->id,
            'image'=> 'posts/2.jpg'
        ]);
        $post3 = $user1->posts()->create([
            'title' => 'Post 3',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id' => $category3->id,
            'image'=> 'posts/3.jpg'
        ]);
        $post4 = $user3->posts()->create([
            'title' => 'Post 4',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'category_id' => $category4->id,
            'image'=> 'posts/4.jpg'
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag4->id, $tag1->id]);
        $post3->tags()->attach([$tag3->id, $tag4->id]);
        $post4->tags()->attach([$tag2->id, $tag3->id]);
    }
}
