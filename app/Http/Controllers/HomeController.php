<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $slider = Slider::all();
        $categories = Category::all();
        $items = Item::all();
        return view('welcome',compact('slider','categories','items'));
    }
}
