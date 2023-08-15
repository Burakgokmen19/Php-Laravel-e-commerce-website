<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashBoardConroller extends Controller
{
    public function index(){
        return view('backend.pages.index');
    }
}
