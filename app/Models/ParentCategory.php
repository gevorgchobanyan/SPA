<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCategory extends Model
{
    use HasFactory;
    protected $table = 'categories_parents';

    public static function storeNewParentCategory($request){

        $parentCategory = new ParentCategory();
        $parentCategory->category_id = $request->category_id;
        $parentCategory->parent_id = $request->parent_id;
        $parentCategory->depth = $request->depth;
        $parentCategory->save();
    }

    public static function updateParentCategory($request, $category){

        $category->category_id = $request->category_id;
        $category->parent_id = $request->parent_id;
        $category->depth = $request->depth;
        $category->save();
    }
}
