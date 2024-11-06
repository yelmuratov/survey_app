<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $categories = Category::all();

        return view('category.index', compact('categories'));
    }

    //Store new category in storage.
    public function store(CategoryStoreRequest $request)
    {
        try{
            Category::create($request->validated());
            return redirect()->route('category.index')->with('success', 'Category created successfully');
        }catch(\Exception $e){
            return redirect()->route('category.index')->with('error', 'Category creation failed');
        }
    }

    // Update category in storage.
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try{
            $category->update($request->validated());
            return redirect()->route('category.index')->with('success', 'Category updated successfully');
        }catch(\Exception $e){
            return redirect()->route('category.index')->with('error', 'Category update failed');
        }
    }

    // Remove category from storage.
    public function destroy(Category $category)
    {
        try{
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully');
        }catch(\Exception $e){
            return redirect()->route('category.index')->with('error', 'Category deletion failed');
        }
    }

    public function categories()
    {   
        $categories = Category::all();
        return view('dashboard.categories', compact('categories'));
    }
}
