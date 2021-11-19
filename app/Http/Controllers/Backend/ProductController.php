<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MultiImg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        return view('backend.product.product_add', compact(
            'categories', 'brands'
        ));
    }

    public function StoreProduct(Request $request){
//        dd($request->all() );

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)
            ->resize(917,1000)
            ->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

       $product_id = Product::insertGetId
         ([
             'brand_id' =>$request->brand_id,
             'category_id' => $request ->category_id ,
             'subcategory_id' => $request->subcategory_id,
             'subsubcategory_id' => $request->subsubcategory_id,
             'product_name_en' => $request->product_name_en ,
             'product_name_ar' => $request->product_name_ar ,

             'product_slug_en' => Str::lower(
                 Str::replace(
                     ' ', '-',  $request-> product_slug_en)),

             'product_slug_ar' => Str::lower(
                 Str::replace(
                     ' ', '-',  $request-> product_slug_ar)),

             'product_code' => $request->product_code ,
             'product_qty' => $request->product_qty ,
             'product_tags_en' => $request->product_tags_en ,
             'product_tags_ar' => $request->product_tags_ar ,
             'product_size_ar' => $request-> product_size_ar,
             'product_size_en' => $request-> product_size_en,

             'product_color_en'=> $request->product_color_en ,
             'product_color_ar'=> $request->product_color_ar ,
             'selling_price'=> $request->selling_price ,
             'discount_price'=> $request->discount_price ,
             'short_desc_en'=> $request->short_desc_en ,
             'short_desc_ar'=> $request->short_desc_ar ,
             'long_desc_ar'=> $request->long_desc_ar ,
             'long_desc_en'=> $request-> long_desc_en,

             'hot_deals'=> $request->hot_deals ,
             'featured' => $request ->featured ,
             'special_offer' => $request ->special_offer ,
             'special_deals' => $request ->special_deals ,
             'product_thambnail' => $save_url,
             'status' => 1 ,
             'created_at'=> Carbon::now(),
         ]);
         /// Multiple Image Upload Start
       $images  = $request->file('multi_img');
       foreach($images as $img){
           $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalName();
           Image::make($img)->resize(917, 100)
               ->save('upload/products/multi_img/'.$make_name);
           $uploadPath = 'upload/products/multi_img/'.$make_name;

           MultiImg::insert([
               'product_id' => $product_id,
               'photo_name' => $uploadPath,
               'created_at' => Carbon::now(),
           ]);
       }

        $notification = array(
            'message' => 'Product and Multiple Image has been Inserted successfully Created',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-product')->with($notification);

         /// Multiple Image Upload Start
    }

    public function ManageProduct(){
        $products = Product::latest()->get();

        return view('backend.product.product_view', compact('products'));
    }

    public function ProductEdit($id){

        $multiImgs = MultiImg::where('product_id', $id)->get();

        $categories = Category::latest()->get();
        $brands = Brand::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id)->get()->first();

        return view('backend.product.product_edit',
            compact(
                'categories',
                'brands',
                'subcategory',
                'subsubcategory',
                'product' ,
                'multiImgs'
            ));

    }

    public function ProductUpdate(Request $request){

        $prod_id = $request->id ;
        $product = Product::findOrFail($prod_id);

        $product->update([
            'brand_id' =>$request->brand_id,
            'category_id' => $request ->category_id ,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en ,
            'product_name_ar' => $request->product_name_ar ,

            'product_slug_en' => Str::lower(
                Str::replace(
                    ' ', '-',  $request-> product_slug_en)),

            'product_slug_ar' => Str::lower(
                Str::replace(
                    ' ', '-',  $request-> product_slug_ar)),

            'product_code' => $request->product_code ,
            'product_qty' => $request->product_qty ,
            'product_tags_en' => $request->product_tags_en ,
            'product_tags_ar' => $request->product_tags_ar ,
            'product_size_ar' => $request-> product_size_ar,
            'product_size_en' => $request-> product_size_en,

            'product_color_en'=> $request->product_color_en ,
            'product_color_ar'=> $request->product_color_ar ,
            'selling_price'=> $request->selling_price ,
            'discount_price'=> $request->discount_price ,
            'short_desc_en'=> $request->short_desc_en ,
            'short_desc_ar'=> $request->short_desc_ar ,
            'long_desc_ar'=> $request->long_desc_ar ,
            'long_desc_en'=> $request-> long_desc_en,

            'hot_deals'=> $request->hot_deals ,
            'featured' => $request ->featured ,
            'special_offer' => $request ->special_offer ,
            'special_deals' => $request ->special_deals ,
//            'product_thambnail' => $save_url,
            'status' => 1 ,
            'created_at'=> Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product  has been Updated Withour Image successfully Created',
            'alert-type' => 'success'
        );
        return redirect()->route('manage-product')->with($notification);
    }

//    Multible Update Image

    public function MultiImageUpdate(Request $request){
        $imgs = $request-> multi_img ;

        foreach ($imgs as $id => $img){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);
            $image = $request->file('product_thambnail');
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalName();
            Image::make($img)
                ->resize(917,1000)
                ->save('upload/products/thambnail/'.$make_name);
            $uploadPath = 'upload/products/thambnail/'.$make_name;

            MultiImg::where('id', $id)->update([
               'photo_name' => $uploadPath ,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product and Multiple Image has been Updated successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    // Product Main Thambnail Update
    public function ThambImageUpdate(Request $request){
        $pro_id = $request->id ;
        $oldImage = $request->old_img;
        unlink($oldImage);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)->resize(917,1000)
            ->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen ;

        $product = Product::findOrFail($pro_id);

        $product->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'ProductThambnail Image has been Inserted successfully Created',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function multiimgDelete($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg-> photo_name);
        $oldimg->delete();

        $notification = array(
            'message' => 'Multi Image  has been Delete successfully Created',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
            'message' => 'Product Inactive ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
            'message' => 'Product Active ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ProducDtelete($id){
        $product = Product::findOrFail($id);
        @unlink($product-> product_thambnail);
        $product->delete();

        $images = MultiImg::where('product_id',$id)->get();

        foreach($images as  $img){
            @unlink($img->phote_name);
            MultiImg::where('product_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully  ',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } // notification

}
