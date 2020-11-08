<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tags\CreateTagRequest;
use App\Http\Requests\Tags\UpdateTagRequest;
use App\Tag;



class TagsController extends Controller
{
    public function index()
    {
        return view('tags.index', ['tags' => Tag::all()]);

    }

    public function create()
    {
        return view('tags.create');

    }

    public function store(CreateTagRequest $request)
    {
        Tag::create([
            'name' => $request->name
        ]);
        session()->flash('success', 'Tag Created Successfully.');
        return redirect(route('tags.index'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.create', ['tag' => $tag]);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $tag->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'Tag Updated Successfully.');

        return redirect(route('tags.index'));
    }

    public function destroy(Tag $tag)
    {
        if ($tag->posts->count()>0){
            session()->flash('error', 'Tag cannot be deleted , because it is associated to some posts .');
            return redirect()->back();
        }
        $tag->delete();
        session()->flash('success', 'Tag Deleted Successfully.');
        return redirect(route('tags.index'));

    }
}
