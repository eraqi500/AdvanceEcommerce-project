<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{

    public function BrandView(){
       $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    }

    public function BrandStore(Request $request){

        $request->validate([
           'brand_name_en' => 'required' ,
           'brand_name_ar' => 'required' ,
           'brand_image' => 'required' ,
        ],
        [
            'brand_name_en.required' =>'plz Input Your Brand in english',
            'brand_name_ar.required' =>'plz Input Your Brand in Arabic',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();
        Image::make($image)
            ->resize(300,300)
            ->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
           'brand_name_en' => $request->brand_name_en,
           'brand_name_ar' => $request->brand_name_ar,
            'brand_slug_en' => strtolower(
                str_replace(' ', '-', $request->brand_slug_en)),
            'brand_slug_ar' => strtolower(
                str_replace(' ', '-', $request->brand_slug_ar)),
            'brand_image' => $save_url
        ]);
        $notification = array(
            'message' => 'Brand has been successfully Created',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));

    }

    public function BrandUpdate(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_image;
        $img = $request->file('brand_image');

        if($img){
            @unlink(public_path('upload/brand', $old_img));
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalName();
            Image::make($img)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;

            $edit = Brand::findOrFail($brand_id);
            $edit-> update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(
                    str_replace(' ', '-', $request->brand_slug_en)),
                'brand_slug_ar' => strtolower(
                    str_replace(' ', '-', $request->brand_slug_ar)),
                'brand_image' => $save_url
            ]);
            $notification = array(
                'message' => 'Brand has been Updated successfully Created',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        }else
        {
            $edit = Brand::findOrFail($brand_id);
            $edit::update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ar' => $request->brand_name_ar,
                'brand_slug_en' => strtolower(
                    str_replace(' ', '-', $request->brand_slug_en)),
                'brand_slug_ar' => strtolower(
                    str_replace(' ', '-', $request->brand_slug_ar)),
            ]);
            $notification = array(
                'message' => 'Brand has been Updated successfully Created',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        }

    }

    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        dd($brand,$img);

        unlink($img);
        $brand->delete();

        $notification = array(
            'message' => 'Brand has been Deleted successfully Created',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
