<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\GeneralCampaign;
use App\Models\ProductCampaign;


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
    
    public function AllCategory(){
        $categories = Category::latest()->get();         
        return view('admin.allcategory', compact('categories'));
    }

    // Sub Category
    public function CreateSubCategory(){
        $categories = Category::latest()->get();
        return view('admin.createsubcategory', compact('categories'));
    }

    
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
            'sub_category_name' => $request->subcategory,
            'slug' => strtolower(str_replace(' ','-', $request->subcategory)),
            'sub_category_image' => $request->file('sub-category-image')->hashName(),
            'status' => $request->status,
        ]);
        
        return redirect()->route('admin.allsubcategory')->with('message', 'Sub Category has been added successfully');
    
    
    }

    public function AllSubCategory(){
        $subcategories = SubCategory::latest()->get();
        return view('admin.allsubcategory', compact('subcategories'));
    }


    //Brands
    public function CreateBrands(){
        return view('admin.createbrands');
    }
    
    public function StoreBrands(Request $request){
        $request->validate([
            'title' => 'brand_name|unique:categories',
        ]);


        Brand::insert([
            'brand_name' => $request->brand_name,
            'slug' => strtolower(str_replace(' ','-', $request->brand_name)),           
        ]);
        
        return redirect()->route('admin.allbrands')->with('message', 'Brand has been added successfully');
    }

    public function AllBrands(){
        $brands = Brand::latest()->get();
        return view('admin.allbrands', compact('brands'));
    }


    //Campaigns
    public function CreateCampaign(){
        return view('admin.createcampaign');
    }

    public function StoreCampaign(Request $request){
        $request->validate([
            'title' => 'campaign_name|unique:campaign_name',
        ]);

        if($request->hasFile('campaign_image')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
            ]);
            
            $request->file('campaign_image')->store('campaign', 'public');            
        }

        GeneralCampaign::insert([
            'campaign_name' => $request->campaign_name,
            'campaign_subtitle' => $request->campaign_subtitle,
            'campaign_image' => $request->file('campaign_image')->hashName(),
            'status' => $request->status,
        ]);
        
        return redirect()->route('admin.allcampaigns')->with('message', 'Campaign has been added successfully');


    }


    public function AllCampaign(){
        return view('admin.allcampaigns');
    }

    //Newsletter
    public function AllSubscriber(){
        return view('admin.allsubscribers');
    }

    public function AddSubscriber(){
        return view('admin.addsubscriber');
    }

    public function EmailToSub(){
        return view('admin.emailtosub');
    }

    //Tickets
    public function AllTickets(){
        return view('admin.alltickets');
    }

    public function AddTicket(){
        return view('admin.addticket');
    }

    public function Departments(){
        return view('admin.departments');
    }



}
