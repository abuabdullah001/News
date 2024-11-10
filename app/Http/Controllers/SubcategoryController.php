<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
  public function subcategory_create(){
    $categories=Category::all();
    return view('subcategory.create',compact('categories'));
  }


  public function subcategory_store(Request $request){


    $request->validate([
     'name'=>'required',
     'order_by'=>'required',
    ]);

    Subcategory::create([

        'category_id'=>$request->category_id,
        'name'=>$request->name,
        'order_by'=>$request->order_by,
    ]);

    return redirect()->route('subcategory.index')->with('success','Subcategory created successfully');


  }


  public function subcategory_index(){

    $subcategories = Subcategory::with('category')->get();
    return view('subcategory.index',compact('subcategories'));
  }


  public function subcategory_edit($id){
    $subcategories=Subcategory::findOrFail($id);
    return view('subcategory.edit',compact('subcategories'));

  }

  public function subcategory_update(Request $request,$id){

    $subcategories=Subcategory::findOrFail($id);

     $request->validate([
        'name'=>'required',
        'order_by'=>'required',
     ]);

     Subcategory::find($id)->update([

        'name'=>$request->name,
        'order_by'=>$request->order_by,
     ]);

     return redirect()->route('subcategory.index')->with('success','Subcategory created successfully');


  }


  public function subcategory_delete($id){

    $var=Subcategory::find($id);
    $var->delete();

    return redirect()->route('subcategory.index')->with('success', 'Subcategory deleted successfully');

  }





}
