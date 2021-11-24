<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $products = Product::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $featured = Product::where('featured',1)->orderBy('id', 'DESC')->limit(6)->get();
        $hot_deals = Product::where('hot_deals',1)
            ->where('discount_price' , '!=' , Null)
            ->orderBy('id', 'DESC')->limit(3)->get();
        $special_offer = Product::where('special_offer',1)->orderBy('id', 'DESC')->limit(3)->get();
        $special_deals = Product::where('special_deals',1)->orderBy('id', 'DESC')->limit(3)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status', 1)
            ->where('category_id',$skip_category_0)
            ->orderBy('id' ,  'DESC')->get();

        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status', 1)
            ->where('category_id',$skip_category_1)
            ->orderBy('id' ,  'DESC')->get();

        $skip_brand_1 = Brand::skip(1)->first();
        $skip_brand_product_1 = Product::where('status',1)
            ->where('brand_id', $skip_brand_1)
            ->orderBy('id' , 'DESC')->get();


        return view('frontend.index',
            compact(
                'categories',
                'sliders',
                'products',
                'featured',
                'hot_deals' ,
                'special_offer' ,
                'special_deals' ,
                'skip_product_0' ,
                'skip_product_1',
                'skip_category_1',
                'skip_category_0',
                'skip_brand_product_1' ,
                'skip_brand_1'
            ));
    }
    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request){

        $id = Auth::user()->id;
        $data =User::find($id);
        $data->name = $request->name;
        $data->email = $request->email ;
        $file = $request->file('profile_photo_path');
        if($file){
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images/'), $filename);
            $data['profile_photo_path'] = $filename;
        }
        $data -> save();

        $notification = array(
            'message' => 'User profile has been updated successfully ',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function UpdateChangePassword(Request $request){
        $validateData  = $request->validate([
           'oldpassword' => 'required',
           'password' => 'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;

        if(Hash::check( $request->oldpassword , $hashedPassword)){
            $id = Auth::id();
            $user = User::find($id);
            $user -> password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('user.logout');
        }else
        {
            return redirect()-back();
        }
    }

    public function ProductDetails($id ,$slug){
        $product = Product::findOrFail($id);

        $color_en = $product-> product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_ar = $product->product_color_ar;
        $product_color_ar = explode(',', $color_ar);

        $size_en = $product->product_size_en ;
        $product_size_en = explode(',', $size_en);

        $size_ar = $product->product_size_ar;
        $product_size_ar = explode(',',$size_ar);

        $cat_id = $product -> category_id;

        $relatedProduct = Product::where('category_id', $cat_id)
            ->where('id', '!=',$id)
            ->orderBy('id', 'DESC')->get();

        $multiImg = MultiImg::where('product_id',$id)->get();

        return view('frontend.product.product_details',
            compact('product' ,
                'multiImg'
                ,'product_color_ar'
                ,'product_color_en'
                ,'product_size_ar'
                ,'product_size_en'
                ,'relatedProduct'));
    }

  public function TagWiseProduct($tag){
        $products = Product::where('status',1)
            ->where('product_tags_en' , $tag)
            ->where('product_tags_ar' , $tag)
            ->orderBy('id', 'DESC')
            ->paginate(3);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();

        return view('frontend.tags.tags_view',
            compact(
                'products',
            'categories'));
  }

  public function SubCatWiseProduct($subcat_id ,$slug)
  {
  $products =Product::where('status', 1)
      ->where('subcategory_id',$subcat_id)
      ->orderBy('id',  'DESC')
      ->paginate(6);

      $categories = Category::orderBy('category_name_en', 'ASC')->get();

      return view('frontend.product.subcategory_view',
          compact('products',
              'categories'));
  }

  public function SubSubCatWiseProduct($subsubcat_id , $slug){
      $products =Product::where('status', 1)
          ->where('subsubcategory_id',$subsubcat_id)
          ->orderBy('id',  'DESC')
          ->paginate(6);

      $categories = Category::orderBy('category_name_en', 'ASC')->get();

      return view('frontend.product.sub_subcategory_view',
          compact('products',
              'categories'));
  }

  public function ProductViewAjax($id){
      $product = Product::with('category','brand')->findOrFail($id);

      $color = $product-> product_color_en;
      $product_color = explode(',', $color);

      $size = $product->product_size_en ;
      $product_size = explode(',', $color);
      return response()->json(array(
         'product' => $product,
         'color' => $product_color ,
         'size' =>$product_size
      ));
  }


}
