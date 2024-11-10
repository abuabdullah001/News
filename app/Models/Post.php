<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['address','phone','email','title','short_description','description','image','tag','gallery','meta_title','meta_description','category_id','subcategory_id'];


    public function category(){
        return $this->belongsTo(Category::class);
    }


    public function subcategory(){
        return $this->belongsTo(subcategory::class);
    }



}
