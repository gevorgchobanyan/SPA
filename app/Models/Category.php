<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * App\Models\Category
 * @mixin Builder
 */


class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'alias',
        'full_path',
        'id_1c',
        'content',
        'seo_description',
        'seo_keywords',
        'seo_title',
        'seo_h1',
        'image_id',
        'active'
    ];

    public static function updateCategory($request, $category){

        self::where('id', $category)
            ->update([
                'name' => $request->name,
                'alias' => $request->alias,
                'full_path' => $request->full_path,
                'id_1c' => $request->id_1c
            ]);

    }

}
