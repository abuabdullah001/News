<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','order_by'];


    // public function subcategory()
    // {
    //     return $this->belongsTo(Subcategory::class);
    // }

}
