<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Category;
use App\Models\Slider;
use App\Models\About;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
   public function products(Request $request) {
    $size = $request->size ?? null;
    $color = $request->color ?? null;
    $startPrice = $request->start_price ?? null;
    $endPrice = $request->end_price ?? null;
    $order = $request->order ?? 'id';
    $short = $request->short ?? 'desc';


    $products =  Product::where('status', '1')
        ->where(function($q) use ($size, $color, $startPrice, $endPrice) {
            if (!empty($size)) {
                $q->where('size', $size);
            }
            if (!empty($color)) {
                $q->where('color', $color);
            }
            if (!empty($startPrice) && $endPrice) {
                $q->whereBetween('price', [$startPrice, $endPrice]);
            }
        });
              $minPrice = $products->min('price');
              $maxPrice = $products->max('price');
              $sizeLists = $products->groupBy('size')->pluck('size')->toArray();
              $colors = $products->groupBy('color')->pluck('color')->toArray();
              $products = $products->orderBy($order,$short)->get();

         $categories =  Category::where('status','1')->where('cat_ust',null)->withCount('itemss')->get();

    return view('frontend.pages.products', compact('products','categories','minPrice','maxPrice','sizeLists','colors'));
}
   public function productsDetail($slug) {
    $product =  Product::where('slug',$slug)->first();
    return view('frontend.pages.productsdetail',compact('product'));
   }
   public function contact() {
    return view('frontend.pages.contact');
   }
   public function abouts() {
    $about= About::where('id','1')->first();
    return view('frontend.pages.abouts',compact('about'));
   }
//    public function childproducts() {
//     return view('frontend.pages.cart');
//    }
//    public function manproducts() {
//     return view('frontend.pages.cart');
//    }
//    public function womanproducts() {
//     return view('frontend.pages.cart');
//    }
//    public function discountProducts() {
//     return view('frontend.pages.cart');
//    }
}
