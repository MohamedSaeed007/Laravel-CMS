<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoriesController extends Controller
{

    public function index()
    {
        return view('categories.index', ['categories' => Category::all()]);
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name
        ]);
        session()->flash('success', 'Category Created Successfully.');
        return redirect(route('categories.index'));
    }


    public function edit(Category $category)
    {
        return view('categories.create', ['category' => $category]);
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'Category Updated Successfully.');

        return redirect(route('categories.index'));

    }


    public function destroy(Category $category)
    {
        if ($category->posts->count()>0){
            session()->flash('error', 'Category cannot be deleted , because it is associated to some posts .');
            return redirect()->back();
        }
        $category->delete();
        session()->flash('success', 'Category Deleted Successfully.');
        return redirect(route('categories.index'));

    }
}
