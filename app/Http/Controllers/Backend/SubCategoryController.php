<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){

        $categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategory = SubCategory::latest()->get();
    	return view('backend.category.subcategory_view',compact('subcategory','categories'));

    }

    public function SubCategoryStore(Request $request){

        $request->validate([
             'category_id' => 'required',
             'subcategory_name_en' => 'required',
             'subcategory_name_ar' => 'required',
         ],[
             'category_id.required' => 'Please select Any option',
             'subcategory_name_en.required' => 'Input SubCategory English Name',
         ]);
 
 
 
        SubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_name_en' => $request->subcategory_name_en,
         'subcategory_name_ar' => $request->subcategory_name_ar,
         'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
         'subcategory_slug_ar' => str_replace(' ', '-',$request->subcategory_name_hin),
 
 
         ]);
 
         $notification = array(
             'message' => 'SubCategory Inserted Successfully',
             'alert-type' => 'success'
         );
 
         return redirect()->back()->with($notification);
 
     } // end method 


     public function SubCategoryEdit($id){
    	$categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('backend.category.subcategory_edit',compact('subcategory','categories'));

    }
}
