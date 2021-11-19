<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('frontend.index',compact('categories','sliders', 'products'));
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

}
