<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $allCategories = Category::all();
        return response()->json($allCategories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
//        $request->validate([
//            'name' => 'required|max:255',
//            'alias' => 'required|max:255|unique:categories,alias',
//            'id_1c' => 'max:255',
//            'image' => 'required|file|image|mimes:jpeg,jpg,png|max:10240',
//        ]);


        try {

//            $image = $request->file('image');
//            $bannerImgId = Image::saveImage($image, 'category');
            $bannerImgId = 500;
            $request->request->add(['image_id' => $bannerImgId]); //add request

            DB::beginTransaction();
            $category = Category::create($request->all());
            ParentCategory::createOrUpdateParentCategory($category->id, $request->parent_id);
            ParentCategory::updateCategoryFullPath($category->id);
            DB::commit();

            $success = true;
            $message = 'New category has been added successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        //
        return response()->json($category);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $category)
    {
        try {

            DB::beginTransaction();
            Category::updateCategory($request, $category);
            ParentCategory::createOrUpdateParentCategory($category, $request->parent_id);
            ParentCategory::updateCategoryFullPath($category);
            DB::commit();
            $success = true;
            $message = 'Category updated successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            ParentCategory::deleteParentCategory($category->id);
            $success = true;
            $message = 'Category deleted successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
}
