<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->take(8)->get();
        return view('/home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'price'=>'required',
            'image' => 'file|mimes:jpg,png,gif,svg'
        ]);
            $product = new Product;
            $product->title = $request->input('title');
            $product->category_id =$request->input('category_id');
            $product->price = $request->input('price');

        if($request->hasFile('image')){

            $image = $request->file('image')->getClientOriginalName();
            $destination_path = 'public/images/products';
            $path = $request->file('image')->storeAs($destination_path, $image);
            $product->image ='/'. $image;
            $product->save();
        }
        return redirect('/add-product')->with('message', "Product added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $categories = Category::all();

        if($request->get('sort') == 'price_low_to_high'){
            $products = Product::where('category_id',$id)
            ->orderBy('price', 'asc')
            ->paginate(8);
        }
        else if($request->get('sort') == 'price_high_to_low'){
            $products = Product::where('category_id',$id)
            ->orderBy('price', 'desc')
            ->paginate(8);
        }
        else if($request->get('sort') == 'latest'){
            $products = Product::where('category_id',$id)
            ->orderBy('created_at', 'desc')
            ->paginate(8);
        }
        else{
            $products = Product::where('category_id',$id)->paginate(8);
        }
        return view('products\show', compact('products','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products\edit-products', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $product = Product::find($id);
        // $input = $request->all();
        // $product->update($input);
        // return redirect('all-products');

            $product = Product::find($id);

            $product->title = $request->input('title');
            $product->category_id =$request->input('category_id');
            $product->price = $request->input('price');

        if($request->hasFile('image')){
            $img = $request->file('image')->getClientOriginalName();
            $destination = 'public/images/products'.'/'.$img;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $image = $request->file('image')->getClientOriginalName();
            $destination_path = 'public/images/products';
            $path = $request->file('image')->storeAs($destination_path, $image);
            $product->image ='/'. $image;
        }
        $product->update();
        return redirect('all-products')->with('message', "Product updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', "Product deleted successfully");
    }

    public function search(){
        $search = $_GET['search'];
        $products = Product::where('title', 'LIKE', '%'.$search.'%')->with('category')->get();

        return view('/search', compact('products'));
    }
}
