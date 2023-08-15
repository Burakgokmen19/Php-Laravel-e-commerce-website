<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Slider;

class PageHomeController extends Controller
{
   public function index() {
    $slider =  Slider::where('status','1')->first();
    $categories = Category::where('status','1')->with('subcategory')->get();
    $about =About::where('id','1')->first();


    return view('frontend.pages.index',compact('slider','categories','about'));
   }

}
