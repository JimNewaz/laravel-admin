<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','role:admin')->group(function (){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin/dashboard', 'Dashboard')->name('admin.dashboard');

        Route::get('/admin/messages', 'ContactMessage')->name('admin.messages');
        
        //Category
        Route::get('/admin/create-category', 'CreateCategory')->name('admin.createcategory');
        Route::post('/admin/store-category', 'StoreCategory')->name('admin.storecategory');       
        Route::get('/admin/allcategory', 'AllCategory')->name('admin.allcategory');

        //Sub Category
        Route::get('/admin/create-sub-category', 'Createsubcategory')->name('admin.createsubcategory');
        Route::get('/admin/store-sub-category', 'StoreSubCategory')->name('admin.storesubcategory');
        Route::get('/admin/allsubcategory', 'AllSubCategory')->name('admin.allsubcategory');

        //Brands
        Route::get('/admin/create-brands', 'CreateBrands')->name('admin.createbrands');
        Route::get('/admin/store-brands', 'StoreBrands')->name('admin.storebrands');
        Route::get('/admin/allbrands', 'AllBrands')->name('admin.allbrands');

        // Campaigns
        Route::get('/admin/create-campaign', 'CreateCampaign')->name('admin.createcampaign');
        Route::get('/admin/store-campaign', 'StoreCampaign')->name('admin.storecampaign');
        Route::get('/admin/all-campaigns', 'AllCampaign')->name('admin.allcampaigns');

        //Newsletter
        Route::get('/admin/all-subscribers', 'AllSubscriber')->name('admin.allsubscribers');
        Route::get('/admin/add-subscriber', 'AddSubscriber')->name('admin.addsubscriber');
        Route::get('/admin/store-subscriber', 'StoreSubscriber')->name('admin.storesubscriber');
        Route::get('/admin/email-to-subscribers', 'EmailToSub')->name('admin.emailtosub');

        //Tickets
        Route::get('/admin/all-tickets', 'AllTickets')->name('admin.alltickets');

        Route::get('/admin/add-ticket', 'AddTicket')->name('admin.addticket');
        Route::get('/admin/store-ticket', 'StoreTicket')->name('admin.storeticket');
        
        Route::get('/admin/departments', 'Departments')->name('admin.departments');
        Route::get('/admin/store-department', 'StoreDepartment')->name('admin.storedepartment');

        //Coupons
        Route::get('/admin/coupon', 'AddCoupon')->name('admin.createcoupon');
        Route::get('/admin/store-coupon', 'StoreCoupon')->name('admin.storecoupon');
        Route::get('/admin/all-coupons', 'AllCoupons')->name('admin.allcoupons');

        //Country 
        Route::get('/admin/country', 'Country')->name('admin.country');
        Route::get('/admin/storecountry', 'StoreCountry')->name('admin.storecountry');
        Route::get('/admin/state', 'State')->name('admin.state');
        Route::get('/admin/storestate', 'StoreState')->name('admin.storestate');

        //Tax
        Route::get('/admin/country-tax', 'CountryTax')->name('admin.countrytax');
        Route::get('/admin/storecountrytax', 'StoreCountryTax')->name('admin.storecountrytax');

        Route::get('/admin/state-tax', 'StateTax')->name('admin.statetax');
        Route::get('/admin/storestatetax', 'StoreStateTax')->name('admin.storestatetax');


    });

    Route::controller(ProductController::class)->group(function(){
        //Add products
        Route::get('/admin/add-product', 'AddProduct')->name('admin.addproduct');
        Route::get('/admin/all-products', 'AllProducts')->name('admin.allproducts');
        
    });

});

require __DIR__.'/auth.php';
