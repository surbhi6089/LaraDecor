<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->name;
        if($user == 'SurbhiAdmin'){
            $totalProducts = Product::count();
            $totalCategories = Category::count();
            $totalUsers = User::where([
                ['name', '!=', 'SurbhiAdmin'],
                ['name', '!=', 'Jane']
            ])->count();
            $admin = User::where('name','SurbhiAdmin')->pluck('name')->first();
            $editor = User::where('name','Jane')->pluck('name')->first();

            return view('dashboard/admin-dashboard', compact('totalProducts', 'totalCategories', 'totalUsers', 'admin', 'editor'));
        }
        else if($user == 'Jane'){
            $products = Product::paginate(5);
            $categories = Category::paginate(5);
            $editor = User::where('name','Jane')->pluck('name')->first();
            return view('dashboard/editor-dashboard', compact('editor', 'products', 'categories'));
        }
        else{
            $products = Product::latest()->take(8)->get();
            return view('home', compact('products'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
