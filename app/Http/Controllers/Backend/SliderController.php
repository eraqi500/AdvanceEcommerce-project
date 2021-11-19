<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Slider;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function SliderView(){
        $sliders = Slider::latest()->get();

        return view('backend.slider.slider_view', compact('sliders'));
    }

    public function SliderStore(Request $request){
        $request->validate([
            'slider_img' => 'required' ,
        ],
            [
                'slider_img' =>'plz Input Your Slider Image ',
            ]);


        $image = $request -> file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalName();;
        Image::make($image)
            ->resize(870,370)
            ->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::insert([
            'description' => $request->description ,
            'title' => $request -> title ,
            'slider_img'=> $save_url
        ]);
        $notification = array(
            'message' => 'slider has been Inserted successfully Created',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function SliderEdit($id){
        $slider = Slider::findOrFail($id)->get()->first();
        return view('backend.slider.slider_edit',compact('slider'));
    }


    public function SliderUpdate(Request $request){

        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_img')) {

            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,

            ]);

            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-slider')->with($notification);

        }else{

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,


            ]);

            $notification = array(
                'message' => 'Slider Updated Without Image Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('manage-slider')->with($notification);

        } // end else
    } // end method






    public function SliderInactive($id){
        $slider = Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Slider Inactive ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SliderActive($id){
        $slider = Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Slider Inactive ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $img = $slider->slider_img ;
        @unlink($img);
        $slider->delete();

        $notification = array(
            'message' => 'slider has been Deleted successfully Created',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }



}
