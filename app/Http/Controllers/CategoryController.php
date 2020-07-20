<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(Request $request)
    {
        $categories = Category::all();
        $data = request()->validate([
            'name' => 'required|unique:categories',
        ]);
        $category = new Category();
        $category -> name = request('name');
        $category->save();
        return redirect('categories');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('categories.edit' , compact('category') );
    }
    public function update(Request $request, Category $category)
    {
        $categories = Category::all();
        $data = request()->validate([
            'name' => 'required|unique:categories',
        ]);
        $category->update($data);
        return redirect('categories/'.$category->id )-> with('message' , 'Thank You . You ara Updated a Category successfully' ); ;

    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('categories')
            -> with('message' , 'Thank You . You ara Deleting a category successfully' );

    }
}
