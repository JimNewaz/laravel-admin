<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    public function AddProduct(){
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $brand = Brand::latest()->get();

        return view('admin.addproduct', compact('category', 'subcategory', 'brand'));
    }

    // public function StoreCategory(Request $request){
    //     $request->validate([
    //         'title' => 'category_name|unique:categories',
    //     ]);


    //     if($request->hasFile('category_image')) {

    //         $request->validate([
    //             'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
    //         ]);
            
    //         $request->file('category_image')->store('category', 'public');
            
    //     }


    //     Category::insert([
    //         'category_name' => $request->category_name,
    //         'slug' => strtolower(str_replace(' ','-', $request->category_name)),
    //         'category_image' => $request->file('category_image')->hashName(),
    //         'status' => $request->status,
    //     ]);
        
    //     return redirect()->route('admin.allcategory')->with('message', 'Category has been added successfully');
    // } 




    public function AllProducts(){
        return view('admin.allproducts');
    }
}
