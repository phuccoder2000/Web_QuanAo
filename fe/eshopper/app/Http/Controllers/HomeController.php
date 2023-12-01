<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::latest()->take(6)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('home.home', compact('sliders', 'categorys', 'products',
            'productsRecommend', 'categorysLimit'));
    }

    public function test()
    {
        return view('test');
    }
}
