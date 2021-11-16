<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    public function CategoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){

        $request->validate([
            'category_name_en' => 'required' ,
            'category_name_ar' => 'required' ,
            'category_icon' => 'required' ,
        ],
            [
                'category_name_en.required' =>'plz Input Your category in english',
                'category_name_ar.required' =>'plz Input Your category in Arabic',
            ]);


        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' =>  Str::lower(Str::replace(' ', '-', $request->category_name_en)),

            'category_slug_ar' =>  Str::lower(Str::replace(' ', '-', $request->category_name_ar)),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message' => 'Category has been successfully Created',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id){
    $category = Category::findOrFail($id);
    return view('backend.category.category_edit', compact('category'));
    }

    public function CategoryUpdate(Request $request){
        $cat_id = $request->id;
        $category = Category::findOrFail($cat_id);
        $category -> update([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),

            'category_slug_ar' => strtolower(str_replace(' ', '-', $request->category_name_ar)),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message' => 'Category has been Updated successfully Created',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category has been deleted successfully Created',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

}
