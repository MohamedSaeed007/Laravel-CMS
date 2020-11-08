<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategoriesCount')->only(['create','store']);
    }

    public function index()
    {
        return view('posts.index', ['posts' => Post::all()]);
    }

    public function create()
    {
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    public function store(CreatePostRequest $request)
    {

        $image = $request->image->store('posts');

       $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' => $request->category,
            'user_id' => auth()->user()->getAuthIdentifier()
        ]);

       if ($request->tags){
           $post->tags()->attach($request->tags);
       }

        session()->flash('success', 'Post Created Successfully.');

        return redirect(route('posts.index'));

    }

    public function show($id)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post)->with('categories',Category::all())->with('tags',Tag::all());
    }

    public function update(UpdatePostRequest $request, Post $post)
    {
        // get data from request
        $data = $request->only(['title', 'description', 'published_at', 'content']);
        // check if there is a new image
        if ($request->hasFile('image')) {
            // upload it
            $image = $request->image->store('posts');
            // delete old image
            $post->deleteImageFromStorage();
            // add image to data if there is a new image
            $data['image'] = $image;
        }
        if ($request->tags){
            $post->tags()->sync($request->tags);
        }
        // update attributes
        $post->update($data);
        // flash message
        session()->flash('success', 'Post Updated Successfully.');
        // redirect user
        return redirect(route('posts.index'));
    }

    public function destroy($id)
    {

        $post = Post::withTrashed()->where('id', $id)->firstOrFail();

        if ($post->trashed()) {
            $post->deleteImageFromStorage();
            $post->forceDelete();
        } else {
            $post->delete();
        }

        session()->flash('success', 'Post Deleted Successfully.');

        return redirect(route('posts.index'));
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();

        return view('posts.index')->with('posts', $trashed);
    }

    public function restore($id)
    {
        Post::withTrashed()->where('id', $id)->restore();
        session()->flash('success', 'Post Restored Successfully.');
        return redirect()->back();
    }
}
