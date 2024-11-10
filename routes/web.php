<?php

<<<<<<< HEAD

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;





=======
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
>>>>>>> 4484e7983233b39dbb9af0cef42e73c134b19e33

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin-panel',function(){
//     return view('/admin-panel');

// });







Route::middleware('auth')->group(function () {


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
<<<<<<< HEAD




// Category
Route::get('category/create',[CategoryController::class,'category_create'])->name('category.create');
Route::post('category/store',[CategoryController::class,'category_store'])->name('category.store');
Route::get('category/index',[CategoryController::class,'category_index'])->name('category.index');
Route::get('category/edit/{id}',[CategoryController::class,'category_edit'])->name('category.edit');
Route::put('category/update/{id}',[CategoryController::class,'category_update'])->name('category.update');
Route::delete('category/delete/{id}',[CategoryController::class,'category_delete'])->name('category.delete');

Route::get('/', [CategoryController::class, 'showOnFrontend'])->name('welcome');





// SubCategory
Route::get('subcategory/create',[SubcategoryController::class,'subcategory_create'])->name('subcategory.create');
Route::post('subcategory/store',[SubcategoryController::class,'subcategory_store'])->name('subcategory.store');
Route::get('subcategory/index',[SubcategoryController::class,'subcategory_index'])->name('subcategory.index');
Route::get('subcategory/edit/{id}',[SubcategoryController::class,'subcategory_edit'])->name('subcategory.edit');
Route::put('subcategory/update/{id}',[SubcategoryController::class,'subcategory_update'])->name('subcategory.update');
Route::delete('subcategory/delete/{id}',[SubcategoryController::class,'subcategory_delete'])->name('subcategory.delete');



//post
Route::get('post/create',[PostController::class,'post_create'])->name('post.create');
Route::post('post/store',[PostController::class,'post_store'])->name('post.store');
Route::get('post/index',[PostController::class,'post_index'])->name('post.index');
Route::get('post/edit{id}', [PostController::class, 'post_edit'])->name('post.edit');
Route::put('post/update{id}', [PostController::class, 'post_update'])->name('post.update');
Route::delete('post/delete{id}',[PostController::class,'post_delete'])->name('post.delete');




=======
>>>>>>> 4484e7983233b39dbb9af0cef42e73c134b19e33
