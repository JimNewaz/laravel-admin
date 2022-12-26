<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

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

    public function StoreProduct(Request $request){
        $request->validate([
            'title' => 'name|unique:name',
        ]);


        if($request->hasFile('primaryimage')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
            ]);
            
            $request->file('primaryimage')->store('products', 'public');
            
        }

        $image = array();

        if($files=$request->file('galleryimage')){
            foreach($files as $file){                
                $image_name = md5(rand(1000, 10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'public/multiple_image/';
                $image_url = $image_full_name;
                $file->move($upload_path, $image_full_name);
                $image[] = $image_url;
            }           

        }

        $catname = $request->category;        
        $catid  = DB::select("select id from categories where category_name= '$catname'");        

        Product::insert([      

            'name' => $request->name,
            'slug' => strtolower(str_replace(' ','-', $request->name)),
            'summary' => $request->summary,
            'description' => $request->description,
            'primaryimage' => $request->file('primaryimage')->hashName(),
            'category_id' => json_encode($catid),            
            'category' => $request->category,
            'sub_category' => $request->sub_category,
            'sku' => $request->sku,
            'item_in_stock' => $request->item_in_stock,
            'regular_price' => $request->regular_price,
            'selling_price' => $request->selling_price,
            'brand'=> $request->brand,
            'size' => $request->size,
            'color'=> $request->color,
            'badge' => $request->badge,
            'status' => $request->status,
            'tags' => $request->tags,
            'galleryimage' => implode('|', $image),
        ]);

        
        
        return redirect()->route('admin.allproducts')->with('message', 'Product has been added successfully');
    } 




    public function AllProducts(){
        $products = Product::latest()->get();
        return view('admin.allproducts', compact('products'));
    }
}
