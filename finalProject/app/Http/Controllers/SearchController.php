<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class SearchController extends Controller
{
    public function search(Request $request){
        $search = $_GET['search'];
        $results = Search::addMany([
            [Product::class, 'title'],
            [Category::class, 'name'],
        ])->search($search);


        return view('/dashboard/search', compact('results'));
    }
}
