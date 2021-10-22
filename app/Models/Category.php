<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ParentCategory;

class Category extends Model
{
    use HasFactory;

//    public static function getAllParentCategories(): \Illuminate\Support\Collection
//    {
//        $parentCategories = DB::table('categories_parents')
//            ->leftJoin('categories', 'categories_parents.category_id', '=', 'categories.id')
//            ->where('categories_parents.depth', '<', 1)
//            ->where('categories.active', '=', 1)
//            ->select('categories.id', 'categories.name', 'categories.alias', 'categories.image_id')
//            ->get();
//        return $parentCategories;
//    }

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
