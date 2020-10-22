<?php

namespace App\Http\Controllers;

use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index')->with('categories', $categories);
    }

    public function show(Category $category)
    {
        return view('categories.show')
            ->with('category', $category)
            ->with('items', $category->items);
    }

}
