<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\User;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ShippingAreaController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['prefix' => 'admin' ,'middleware' => ['admin:admin']], function (){
   Route::get('/login' , [AdminController::class , 'loginForm']);
   Route::post('/login' , [AdminController::class , 'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function () {

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard',
        function () {
            return view('admin.index');
        })->name('dashboard')->middleware('auth:admin');


    /// Admin all Route
    Route::get('/admin/logout' , [AdminController::class , 'destroy'])
        ->name('admin.logout');

    Route::get('/admin/profile' , [AdminProfileController::class , 'AdminProfile'])
        ->name('admin.profile');

    Route::get('/admin/profile/edit' , [AdminProfileController::class , 'AdminProfileEdit'])
        ->name('admin.profile.edit');

    Route::post('/admin/profile/store' , [AdminProfileController::class , 'AdminProfileStore'])
        ->name('admin.profile.store');

    Route::get('/admin/change/password' , [AdminProfileController::class , 'AdminChangePassword'])
        ->name('admin.change.password');

    Route::post('/update/change/password' , [AdminProfileController::class , 'AdminUpdateChangePassword'])
        ->name('update.change.password');

});



//A End Admin section#####################


//User Section start here
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard',
    function () {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard',compact('user'));
    })->name('dashboard');

Route::get('/' , [IndexController::class , 'index']);

Route::get('/user/logout' , [IndexController::class , 'UserLogout'])
    ->name('user.logout');

Route::get('/user/profile' , [IndexController::class , 'UserProfile'])
    ->name('user.profile');

Route::post('/user/profile/store' , [IndexController::class , 'UserProfileStore'])
    ->name('user.profile.store');

Route::get('/user/change/password' , [IndexController::class , 'UserChangePassword'])
    ->name('change.password');

Route::post('/update/change/password' , [IndexController::class , 'UpdateChangePassword'])
    ->name('user.password.update');


// end user  section

//Admin  Brand Start Routing
Route::prefix('brand')->group(function(){
Route::get('/view', [BrandController::class ,'BrandView'])->name('all.brand');
Route::post('/store', [BrandController::class ,'BrandStore'])->name('brand.store');

Route::get('/edit/{id}', [BrandController::class ,'BrandEdit'])->name('brand.edit');

Route::post('/update/{id}', [BrandController::class ,'BrandUpdate'])->name('brand.update');
Route::get('/delete/{id}', [BrandController::class ,'BrandDelete'])
    ->name('brand.delete');

});
// Brand End Routing

//Admin  Category Start Routing
Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class ,'CategoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class ,'CategoryStore'])->name('category.store');

    Route::get('/edit/{id}', [CategoryController::class ,'CategoryEdit'])->name('category.edit');

    Route::post('/update/{id}', [CategoryController::class ,'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class ,'CategoryDelete'])->name('category.delete');

    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class,
        'GetSubCategory']);

    Route::get('/sub-subcategory/ajax/{subcategory_id}', [SubCategoryController::class,
        'GetSubSubCategory']);



    // Admin Sub Category All Routes
    Route::prefix('sub')->group(function (){
        Route::get('/view', [SubCategoryController::class ,'SubCategoryView'])->name('all.sub.category');
        Route::post('/store', [SubCategoryController::class ,'SubCategoryStore'])->name('subcategory.store');

        Route::get('/edit/{id}', [SubCategoryController::class ,'SubCategoryEdit'])->name('subcategory.edit');

        Route::post('/update', [SubCategoryController::class ,'SubCategoryUpdate'])->name('subcategory.update');
        Route::get('/delete/{id}', [SubCategoryController::class ,'SubCategoryDelete'])->name('subcategory.delete');

        //
        Route::prefix('sub')->group(function () {
           Route::get('/view', [SubCategoryController::class ,'SubSubCategoryView'])->name('all.subsubcategory');

            Route::post('/store', [SubCategoryController::class ,'SubSubCategoryStore'])->name('subsubcategory.store');

            Route::get('/edit/{id}', [SubCategoryController::class ,'SubSubCategoryEdit'])->name('subsubcategory.edit');

            Route::post('/update', [SubCategoryController::class ,'SubSubCategoryUpdate'])->name('subsubcategory.update');
            Route::get('/delete/{id}', [SubCategoryController::class ,'SubSubCategoryDelete'])->name('subsubcategory.delete');

        });
    });
    // Admin End Sub Category All Routes
});
// Category End Routing

// Product Routing
Route::prefix('product')->group(function () {
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('all-product');
    Route::post('/store' ,[ProductController::class , 'StoreProduct'])->name('product-store');
    Route::get('/manage',[ProductController::class,'ManageProduct'])->name('manage-product');

    Route::get('/edit/{id}', [ProductController::class ,'ProductEdit'])->name('product-edit');

    Route::post('/update/{id}', [ProductController::class ,'ProductUpdate'])->name('product-update');

    Route::post('/image/update', [ProductController::class ,'MultiImageUpdate'])->name('update-product-image');

     Route::post('/thambnaail/update', [ProductController::class ,'ThambImageUpdate'])->name('update-product-thambnail');

     Route::post('/multiimg/delete/{id}', [ProductController::class ,'multiimgDelete'])->name('product.multiimg.delete');

     Route::get('/inactive/{id}', [ProductController::class ,'ProductInactive'])->name('product-inactive');
     Route::get('/active/{id}', [ProductController::class ,'ProductActive'])->name('product-active');

    Route::get('/delete/{id}', [ProductController::class ,'ProducDtelete'])->name('product-delete');

});
// Product Routing

// slider Start Routing


 Route::prefix('slider')->group(function(){
     Route::get('/view', [SliderController::class ,'SliderView'])->name('manage-slider');
     Route::post('/store', [SliderController::class ,'SliderStore'])->name('slider-store');
//
     Route::get('/edit/{id}', [SliderController::class ,'SliderEdit'])->name('slider-edit');
//
     Route::post('/update', [SliderController::class ,'SliderUpdate'])->name('slider-update');
     Route::get('/delete/{id}', [ SliderController::class ,'SliderDelete'])->name('slider-delete');

     Route::get('/inactive/{id}', [SliderController::class ,'SliderInactive'])->name('slider-inactive');
     Route::get('/active/{id}', [SliderController::class ,'SliderActive'])->name('slider-active');
//
//     Route::get('/delete/{id}', [SliderController::class ,'SliderDtelete'])->name('slider-delete');
 });
// slider Start Routing

/// FRont End All Route //
/// Multi Language All Route

Route::prefix('language')->group(function () {
Route::get('/english', [LanguageController::class, 'English'])->name('english.lang');
Route::get('/arabic', [LanguageController::class, 'Arabic'])->name('arabic.lang');

});

Route::prefix('product')->group(function () {

    Route::get('/details/{id}/{slug}' , [IndexController::class, 'ProductDetails']);

    Route::get('/tags/{tag}' , [IndexController::class, 'TagWiseProduct']);

});

Route::get('subcategory/product/{subcat_id}/{slug}' ,
    [IndexController::class, 'SubCatWiseProduct']);

Route::get('subsubcategory/product/{subsubcat_id}/{slug}',
    [IndexController::class, 'SubSubCatWiseProduct']);

///product/view/modal/'+id

Route::get('product/view/modal/{id}', [IndexController::class ,'ProductViewAjax']);

Route::get('/product/mini/cart',[CartController::class , 'AddMiniCart']);

Route::post('/cart/data/store/{id}',[CartController::class, 'AddToCart']);


Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

Route::post('/add-to-wishlist/{product_id}', [CartController::class, 'AddToWishList']);



Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){

    Route::get('/wishlist', [WishlistController::class, 'ViewWishlist'])->name('wishlist');

    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);

    Route::get('/wishlist-remove/{id}', [WishlistController::class, 'RemoveWishlistProduct']);

});


Route::prefix('user')->group(function () {

    Route::get('/mycart',[CartPageController::class,'MyCart'])->name('mycart');

    Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);

    Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);

    Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);

    Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);

});


Route::prefix('coupons')->group(function () {

Route::get('/view', [CouponController::class , 'CouponView'])->name('manage-coupon');
    Route::post('/store', [CouponController::class ,'CouponStore'])->name('coupon.store');

    Route::get('/edit/{id}', [CouponController::class ,'CouponEdit'])->name('coupon.edit');

    Route::post('/update/{id}', [CouponController::class ,'CouponUpdate'])->name('coupon.update');
    Route::get('/delete/{id}', [CouponController::class ,'CouponDelete'])->name('coupon.delete');

});


Route::prefix('shipping')->group(function () {

    Route::get('/division/view', [ShippingAreaController::class , 'DivsionView'])->name('manage-division');
    Route::post('/store', [ShippingAreaController::class ,'DivisionStore'])->name('division.store');

    Route::get('/edit/{id}', [ShippingAreaController::class ,'DivisionEdit'])->name('division.edit');

    Route::post('/update/{id}', [ShippingAreaController::class ,'DivisionUpdate'])->name('division.update');
    Route::get('/delete/{id}', [ShippingAreaController::class ,'DivisionDelete'])->name('division.delete');




    Route::prefix('district')->group(function(){

        Route::get('/view', [ShippingAreaController::class , 'DistrictView'])->name('manage-district');
        Route::post('/store', [ShippingAreaController::class ,'DistrictStore'])->name('district.store');

        Route::get('/edit/{id}', [ShippingAreaController::class ,'DistrictEdit'])->name('district.edit');

        Route::post('/update/{id}', [ShippingAreaController::class ,'DistrictUpdate'])->name('district.update');
        Route::get('/delete/{id}', [ShippingAreaController::class ,'DistrictDelete'])->name('district.delete');

    });

    Route::prefix('state')->group(function() {

        Route::get('/view', [ShippingAreaController::class , 'StateView'])->name('manage-state');
        Route::post('/store', [ShippingAreaController::class ,'StateStore'])->name('state.store');

        Route::get('/edit/{id}', [ShippingAreaController::class ,'StateEdit'])->name('state.edit');

        Route::post('/update/{id}', [ShippingAreaController::class ,'StateUpdate'])->name('state.update');
        Route::get('/delete/{id}', [ShippingAreaController::class ,'StateDelete'])->name('state.delete');


    });
});


Route::post('/coupon-apply',[CartController::class,'CouponApply']);

Route::get('/coupon-calculation',[CartController::class, 'CouponCalculation']);

Route::get('/coupon-remove',[CartController::class, 'CouponRemove']);











