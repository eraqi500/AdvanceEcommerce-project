<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
            return view('backend.category.subcategory_view',
                compact('categories','subcategory'));
    }


     public function SubCategoryStore(Request $request){
         $request->validate([
             'category_id' => 'required',
             'subcategory_name_en' => 'required' ,
             'subcategory_name_ar' => 'required' ,

         ],
             [
                 'category_id.required' => 'Please select Any Option',
                 'subcategory_name_en.required' =>'plz Input Your category in english',
                 'subcategory_name_ar.required' =>'plz Input Your category in Arabic',
             ]);
         SubCategory::insert([
             'category_id' => $request->category_id,
             'subcategory_name_en' => $request->subcategory_name_en ,
             'subcategory_name_ar' => $request->subcategory_name_ar ,
             'subcategory_slug_en' => Str::lower(
                 Str::replace(' ', '-', $request->subcategory_name_en)),

             'subcategory_slug_ar' => Str::lower(
                 Str::replace(' ', '-', $request->subcategory_name_ar)),
         ]);

         $notification = array(
             'message' => 'Sub_Category Inserted Successfully' ,
             'alert-type'  => 'success'
         );
         return redirect()->back()->with($notification);
    }


     public function SubCategoryEdit($id){
        $subcategory = SubCategory::findOrFail($id);
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.category.subcategory_edit',
            compact('subcategory', 'categories'));
    }


    public function SubCategoryUpdate(Request $request){
        $id = $request->id ;
        $subCat = SubCategory::findOrFail($id);

        $subCat-> update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en ,
            'subcategory_name_ar' => $request->subcategory_name_ar ,
            'subcategory_slug_en' => Str::lower(
                Str::replace(' ', '-', $request->subcategory_name_en)),

            'subcategory_slug_ar' => Str::lower(
                Str::replace(' ', '-', $request->subcategory_name_ar)),
        ]);

        $notification = array(
            'message' => 'Sub_Category Updated Successfully' ,
            'alert-type'  => 'info'
        );
        return redirect()->route('all.sub.category')->with($notification);


    }


    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category has been deleted successfully Created',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);

    }

    //    ###############End of Sub Category

// #############Start of Sub Sub Category


    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_subcategory_view',
            compact('categories','subsubcategory'));
    }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id', $category_id)
            ->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function SubSubCategoryStore(Request $request){
//        dd($request->all());
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required' ,
            'subsubcategory_name_ar' => 'required' ,

        ],
        [
           'category_id.required' => 'Please select Any Option',
            'subcategory_name_en.required' =>'plz Input Your category in english',
         ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en ,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar ,
            'subsubcategory_slug_en' => Str::lower(
                Str::replace(' ', '-', $request->subsubcategory_name_en)),

            'subsubcategory_slug_ar' => Str::lower(
                Str::replace(' ', '-', $request->subsubcategory_name_ar)),
        ]);

        $notification = array(
            'message' => 'Sub_Sub_Category Inserted Successfully' ,
            'alert-type'  => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);

        return view('backend.category.sub_subcategory_edit',
            compact('categories','subcategory', 'subsubcategory'));


    }
    public function SubSubCategoryUpdate(Request $request){
        $subcat_id = $request->id;
        $subsub = SubSubCategory::findOrFail($subcat_id);

        $subsub->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en ,
            'subsubcategory_name_ar' => $request->subsubcategory_name_ar ,
            'subsubcategory_slug_en' => Str::lower(
                Str::replace(' ', '-', $request->subsubcategory_name_en)),

            'subsubcategory_slug_ar' => Str::lower(
                Str::replace(' ', '-', $request->subsubcategory_name_ar)),
        ]);
        $notification = array(
            'message' => 'Sub_Sub_Category Updated Successfully' ,
            'alert-type'  => 'info'
        );
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        $subsubDelete = SubSubCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Sub_Sub_Category Deleted Successfully' ,
            'alert-type'  => 'error'
        );
        return redirect()->back()->with($notification);
    }



// #############Start of Sub Sub Category

}
