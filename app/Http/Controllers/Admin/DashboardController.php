<?php

namespace App\Http\Controllers\Admin;

use DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\GeneralCampaign;
use App\Models\ProductCampaign;
use App\Models\Newsletter;
use App\Models\TicketDepartment;
use App\Models\Tickets;
use App\Models\Coupon;
use App\Models\Country;
use App\Models\State;
use App\Models\Tax;
use App\Models\StateTax;
use App\Models\User;

class DashboardController extends Controller
{
    public function Dashboard(){
        return view('admin.dashboard');
    }

    public function AllAdmins(){
        $users = User::all();
        
        $role = DB::table('users')
        ->join('role_user', 'users.id', "=", 'role_user.user_id')
        ->where('user_id', 1)
        ->get();

        return view('admin.alladmins', compact('users', 'role'));
    }

    public function AddAdmin(){
        $category = Category::all();
        return view('admin.addadmin', compact('category'));
    }

    public function AllUsers(){
        $users = User::all();
        return view('admin.allusers', compact('users'));
    }

    public function AddUser(){
        $category = Category::all();
        return view('admin.adduser', compact('category'));
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

    public function UpdateCategory(Request $request, Category $id){       
        

        $request->validate([
            'category_name'=>'required',            
        ]); 
        $category = Category::find($id);
        

        $data = [
            'category_name' => $request->category_name,            
        ];
        
        $category->update($data);      

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
        $generalcampaign = GeneralCampaign::latest()->get();
        return view('admin.allcampaigns', compact('generalcampaign'));
    }

    //Newsletter    

    public function AddSubscriber(){
        return view('admin.addsubscriber');
    }

    public function StoreSubscriber(Request $request){
        $request->validate([
            'title' => 'email|unique:email',
        ]);

        Newsletter::insert([
            'email' => $request->email,            
        ]);

        return redirect()->route('admin.allsubscribers')->with('message', 'Subscriber has been added successfully');
    }

    public function AllSubscriber(){
        $subscriber = Newsletter::latest()->get();
        return view('admin.allsubscribers', compact('subscriber'));
    }

    public function EmailToSub(){
        return view('admin.emailtosub');
    }

    //Tickets
    public function AllTickets(){
        $ticket=Tickets::latest()->get();
        return view('admin.alltickets', compact('ticket'));
    }

   
    public function AddTicket(){
        $departments=TicketDepartment::latest()->get();
        return view('admin.addticket', compact('departments'));
    }

    public function StoreTicket(Request $request){       

        Tickets::insert([
            'title' => $request->title,  
            'subtitle' => $request->subtitle,  
            'department' => $request->department,
            'priority' => $request->priority,
            'description' => $request->description,
        ]);
        
        return redirect()->route('admin.alltickets')->with('message', 'Ticket has been added successfully');
    }

    public function Departments(){ 
        $departments=TicketDepartment::latest()->get();
        return view('admin.departments',compact('departments'));
    }

    public function StoreDepartment(Request $request){ 
        $request->validate([
            'title' => 'department_name|unique:department_name',
        ]);

        TicketDepartment::insert([
            'department_name' => $request->department_name,  
            'status' => $request->status,          
        ]);
        
        return redirect()->route('admin.departments')->with('message', 'Department has been added successfully');
    }

    //Coupons
    public function AddCoupon(){
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        return view('admin.createcoupon', compact('category', 'subcategory'));
    }

    public function StoreCoupon(Request $request){
        Coupon::insert([
            'title' => $request->title,
            'code' => $request->code,
            'discounton' => $request->discounton,            
            'type' => $request->type,  
            'exdate' => $request->exdate,  
            'status' => $request->status,   
            'discount' => $request->discount,    
            'product' =>  $request->product,
            'category' =>  $request->category,
            'subcategory' =>  $request->subcategory,

        ]);
        
        return redirect()->route('admin.allcoupons')->with('message', 'Coupon has been added successfully');
    }

    public function AllCoupons(){     
        $coupons = Coupon::latest()->get();  
        return view('admin.allcoupons', compact('coupons'));
    }

    //Country

    public function Country(){
        $country = Country::latest()->get();
        return view('admin.country', compact('country'));
    }

    public function StoreCountry(Request $request){
        $request->validate([
            'title' => 'country|unique:country',
        ]);

        Country::insert([
            'city' => $request->city,  
            'country' => $request->country,   
            'status' => $request->status,       
        ]);
        
        
        return redirect()->route('admin.country')->with('message', 'Country has been added successfully');
    }

    
    //State
    public function State(){
        $states = State::latest()->get();
        return view('admin.state', compact('states'));
    }

    public function StoreState(Request $request){
        $request->validate([
            'title' => 'name|unique:name',
        ]);

        State::insert([            
            'country' => $request->country,   
            'status' => $request->status,       
        ]);
        
        
        return redirect()->route('admin.state')->with('message', 'State has been added successfully');
    }

    //Tax 
    public function CountryTax(){
        $tax = Tax::latest()->get();
        return view('admin.countrytax', compact('tax'));
    }

  
    public function StoreCountryTax(Request $request){       

        Tax::insert([            
            'country' => $request->country,   
            'percentage' => $request->percentage,       
        ]);
        
        
        return redirect()->route('admin.countrytax')->with('message', 'Tax has been added successfully');
    }

    public function StateTax(){
        $tax = StateTax::latest()->get();
        return view('admin.statetax', compact('tax'));
    }


    public function StoreStateTax(Request $request){       

        StateTax::insert([            
            'state' => $request->state,   
            'percentage' => $request->percentage,       
        ]);
        
        
        return redirect()->route('admin.statetax')->with('message', 'Tax has been added successfully');
    }



}
