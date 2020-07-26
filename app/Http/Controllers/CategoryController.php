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
            'image' =>'required|image',
        ]);

        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/categories',$image_new_name);


        $category = new Category();
        $category -> name = request('name');
        $category -> image = $image_new_name;
        $category->save();
        return redirect('categories');
    }

    public function show($id)
    {
        //
    }
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('categories.edit' , compact('category') );
    }
    public function update(Request $request, Category $category)
    {
        $data = request()->validate([
            'name' => 'required|unique:categories,name,'.$category->id,
        ]);
       
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/categories',$image_new_name);
            $category -> image = $image_new_name;
            $category->save();
        }

        
        $category->update($data);
        return redirect('categories')-> with('message' , 'Thank You . You ara Updated a Category successfully' ); ;

    }
    public function destroy(Category $category)
    {

        $image = '/uploads/categories/'.$category->image;
        $path = str_replace('\\' , '/' , public_path());
          // dd($path.$image);
          if(file_exists($path.$image))
          {
              unlink($path.$image);
              $category->delete();
              return redirect('categories')
                  -> with('message' , 'Thank You . You ara Deleting a category successfully' );
          }
          else
          {
            $category->delete();
            return redirect('categories')
                -> with('message' , 'Thank You . You ara Deleting a category successfully' );
    
          }

    }
}
