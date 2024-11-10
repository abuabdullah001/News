<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;



class CategoryController extends Controller
{


    public function showOnFrontend()
    {
        $categories = Category::whereIn('id',[4])->get();
        return view('welcome', compact('categories'));
    }


    public function category_create(){

        return view('category.create');
    }



    public function category_store(Request $request){

        // dd($request->all());

        $request->validate([
            'name'=>'required',
            'order_by'=>'required',
           ]);




    Category::create([

     'name'=>$request->name,

     'order_by'=>$request->order_by,

    ]);

    return redirect()->route('category.index')->with('success','Category created successfully');

}




public function category_index(){
    $categories=Category::all();
    return view('category.index',compact('categories'));
}





public function category_edit($id){

    $categories=Category::findorFail($id);
    return view('category.edit',compact('categories'));
}


public function category_update(Request $request,$id){

    $categories=Category::findOrFail($id);


    $request->validate([
        'name'=>'required',
        'order_by'=>'required'

       ]);


       Category::find($id)->update([
        'name'=>$request->name,
        'order_by'=>$request->order_by,


     ]);

     return redirect()->route('category.index')->with('success','Category created successfully ');

}


public function category_delete($id){
    $var=Category::find($id);
    $var->delete();
    return redirect()->back()->with('success', 'Category deleted successfully.');
   }

}

