<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;

class DashboardController extends Controller
{
    public function Dashboard(){
        return view('admin.dashboard');
    }
    public function ContactMessage(){
        return view('admin.messages');
    }

    // Create category
    public function CreateCategory(){
        return view('admin.createcategory');
    }

    // Store Category
    public function StoreCategory(Request $request){
        $request->validate([
            'title' => 'category_name|unique:categories',
        ]);


        if($request->hasFile('category_image')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
            ]);
            
            $request->file('category_image')->store('category', 'public');
            
        }


        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-', $request->category_name)),
            'category_image' => $request->file('category_image')->hashName(),
            'status' => $request->status,
        ]);
        
        return redirect()->route('admin.allcategory')->with('message', 'Category has been added successfully');
    }    

    // All Categories
    public function AllCategory(){
        $categories = Category::latest()->get();         
        return view('admin.allcategory', compact('categories'));
    }

    // Sub Category
    public function CreateSubCategory(){
        $categories = Category::latest()->get();
        return view('admin.createsubcategory', compact('categories'));
    }

    // Store Sub Categories
    public function StoreSubCategory(Request $request){
        $request->validate([
            'title' => 'subcategory|unique:sub_categories',
        ]);

        if($request->hasFile('sub-category-image')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
            ]);
            
            $request->file('sub-category-image')->store('sub-category', 'public');            
        }
    
        SubCategory::insert([
            'category_name' => $request->category_name,
            'sub_category_name' => $request->sub_category_name,
            'slug' => strtolower(str_replace(' ','-', $request->sub_category_name)),
            'sub_category_image' => $request->file('sub-category-image')->hashName(),
            'status' => $request->status,
        ]);
        
        return redirect()->route('admin.allsubcategory')->with('message', 'Sub Category has been added successfully');
    
    
    }

    public function AllSubCategory(){
        return view('admin.allsubcategory');
    }

    public function CreateBrands(){
        return view('admin.createbrands');
    }

    public function AllBrands(){
        return view('admin.allbrands');
    }

}
