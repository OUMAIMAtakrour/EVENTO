<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\View;

class CategoriesController extends Controller
{
    public function index()
    {
    }

    public function showCategories()
    {
        $categories = Categories::all();
        return view('events', compact('categories'));
    }
    public function boot()
{
    $categories = Categories::all();
    View::share('categories', $categories);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categories $categoryModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categories $categoryModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categories $categoryModel)
    {
        //
    }
}
