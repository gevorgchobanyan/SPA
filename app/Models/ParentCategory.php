<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ParentCategory extends Model
{
    use HasFactory;
    protected $table = 'categories_parents';
    protected $fillable = [
        'category_id',
        'parent_id',
        'depth'
    ];

    public static function createOrUpdateParentCategory($categoryId, $parent_id)
    {
        $depth = 0;

        if ($parent_id != 0) {
            $depth = self::where('category_id', $parent_id)->select('depth')->first();
            $depth = $depth->depth + 1;
        }

        if ($parent_id == null) {
            $parent_id = 0;
        }

        self::updateOrCreate(
            ['category_id' => $categoryId],
            [
                'parent_id' => $parent_id,
                'depth' => $depth
            ]
        );

    }

    public static function deleteParentCategory($categoryId)
    {
        self::where('category_id', $categoryId)
            ->delete();
    }



    public static function updateCategoryFullPath($categoryId)
    {
        Category::where('id', $categoryId)
            ->update(['full_path' => '/' . self::getCategoryFullPath($categoryId)]);
    }

    public static function getCategoryFullPath($id)
    {
        $category = DB::table('categories')
            ->join('categories_parents', 'categories.id', '=', 'categories_parents.category_id')
            ->select('categories_parents.*', 'categories.*')
            ->where('categories.id', $id)->first();

        if (!$category) return false;

        $url = $category->alias;
        if ($category->parent_id == 0) return $url;
        $url = self::getCategoryFullPath($category->parent_id) . "/" . $url;

        return $url;
    }

}
