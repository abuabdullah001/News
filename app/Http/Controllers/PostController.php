<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PostController extends Controller
{


    public function showOnFrontend()
    {
        $posts = Post::all();
        return view('welcome', compact('posts'));
    }

    public function post_create(){
        $categories=Category::all();
        $subcategories=Subcategory::all();
        return view('post.create',compact('subcategories','categories'));
    }

    public function post_index(){
        $posts=Post::with('subcategory','category')->get();
        return view('post.index',compact('posts'));

    }


    public function post_store(Request $request)
    {
        // Validate request
        // $request->validate([
        //     'title' => 'required|string|max:255',
        //     'short_description' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'tag' => 'nullable|string', // For multiple tags
        //     'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'meta_title' => 'nullable|string|max:255',
        //     'meta_description' => 'nullable|string|max:255',
        //     'category_id' => 'required|exists:categories,id',
        //     'subcategory_id' => 'nullable|exists:subcategories,id',
        // ]);
        // Handle single image upload


        $imageName = '';
        if ($image = $request->file('image')) {
            $imageName = time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
           $image->move(public_path('images/post'), $imageName);
        }

        // Handle multiple gallery uploads

        $imageNames = [];
        if ($request->has('gallery')) {
            foreach ($request->gallery as $key => $value) {
                $galleryImageName = time() . '-' . $key . '.' . $value->extension();
                $value->move(public_path('images/posts'), $galleryImageName);
                $imageNames[] = "images/posts/" . $galleryImageName;
            }
        }

        // Create the post
        Post::create([
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description ?? '',
            'image' => $imageName,
            'tag' => implode(",",$request->tag),
            'gallery' => implode(",", $imageNames),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'category_id' => $request->category_id ?? 0,
            'subcategory_id' => $request->subcategory_id ?? 0,
        ]);

        return redirect()->route('post.index')->with('success', 'Post created successfully');
    }



    public function post_edit($id)
    {


    // Fetch the post to edit
    $posts = Post::findOrFail($id);

    // Fetch categories and subcategories
    $categories = Category::all(); // Adjust as necessary
    $subcategories = Subcategory::all(); // Adjust as necessary
    return view('post.edit', compact('posts', 'categories', 'subcategories'));
    }



    public function post_update(Request $request, $id)
    {

        // $validatedData = $request->validate([
        //     'title' => 'nullable|string|max:255',
        //     'short_description' => 'nullable|string|max:255',
        //     'description' => 'nullable|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'tag.*' => 'nullable|array',
        //     'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'meta_title' => 'nullable|string',
        //     'meta_description' => 'nullable|string',
        // ]);


        $posts = Post::findOrFail($id);


// dd($id);
        $image= '';
        // Handle the main image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '-' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/post'), $imageName);
            $image = 'images/post/' . $imageName; // Store the image path
        }



    // Handle multiple gallery uploads

    if ($request->hasFile('gallery')) {
        $imageNames = [];
        foreach ($request->file('gallery') as $galleryImage) {
            // Generate a unique filename for each image
            $galleryImageName = time() . '-' . uniqid() . '.' . $galleryImage->getClientOriginalExtension();
            $galleryImage->move(public_path('images/posts'), $galleryImageName);
            $imageNames[] = 'images/posts/' . $galleryImageName;
        }
    }
    else {
        // Retain existing gallery images if none are uploaded
        $imageNames = json_decode($posts->gallery, true) ?? [];
    }

        // Update the post with validated data
        // dd($request->all());
        Post::find($id)->update([
            'address'=>$request->address,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $image,
            'tag' => implode(",",$request->tag),
            'gallery' => implode(",",$imageNames),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'category_id' => $request->category_id ?? 0,
            'subcategory_id' => $request->subcategory_id ?? 0,

        ]);
        // $post->findIdupdate($validatedData);

        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }


    public function post_delete($id){
        $var=Post::find($id);
        $var->delete();
        return redirect()->back()->with('success', 'Post deleted successfully.');

    }



}
