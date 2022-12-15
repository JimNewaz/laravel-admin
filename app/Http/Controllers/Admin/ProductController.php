<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AddProduct(){
        return view('admin.addproduct');
    }

    public function AllProducts(){
        return view('admin.allproducts');
    }
}
