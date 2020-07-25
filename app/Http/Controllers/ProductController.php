<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Auth;
use File;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $products = Product::all();
        return view('products.index' , compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create' , compact('categories') );
    }
    
    public function store(Request $request)
    {
        $products = Product::all();
        // dd($request->all());
        $data = request()->validate([
            'name' => 'required|unique:products',
            'details' => 'required|min:10',
            'price'=>'required|numeric',
            'available'=>'required',
            'category_id'=>'required',
            'count'=>'required',
            'image' =>'required|image',
            // 'user_id'=>'required',
        ]);

        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/products',$image_new_name);

        $product = new Product();
        $product -> name = request('name');
        $product -> details = request('details');
        $product -> image = $image_new_name;
        $product -> price = request('price');
        $product -> count = request('count');
        $product -> category_id = request('category_id');
        $product -> available = request('available');
        $product->user_id = Auth::id();

        $product -> save();
        return redirect('products') -> with('message' , 'Thank You . You ara Adding a products successfully' );
    }

    public function show($product)
    {
        $product = Product::find($product);
        // dd($product);
        return view('products.show' , compact('product'));

    }

    public function edit(Product $product)
    {
        $products = Product::all();
        $categories = Category::all();
        return view('products.edit' , compact('product' , 'categories') );
    }
    public function update(Request $request, Product $product)
    {
        $data = request()->validate([
            'name' => 'required|unique:products,name,'.$product->id,
            'details' => 'required|min:10',
            'price'=>'required|numeric',
            'available'=>'required',
            'category_id'=>'required',
            'count'=>'required',
            'image'=>'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/products',$image_new_name);
            $product -> image = $image_new_name;
            $product->save();
        }

        $updatedData = request()->except('image');
        $product-> update($updatedData);
        return redirect('products')-> with('message' , 'Thank You . You ara Updated a products successfully' ); ;
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('products')
        -> with('message' , 'Thank You . You ara Deleting a Customer successfully' );

        $destinationPath = 'uploads/products/';
        File::delete($destinationPath.'/$product->image');


    }
}
