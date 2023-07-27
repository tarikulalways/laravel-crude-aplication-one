<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function category(){
        return $this->belongsTo(Category::class);
    }

    function product(){
        return $this->hasMany(Product::class);
    }
}
