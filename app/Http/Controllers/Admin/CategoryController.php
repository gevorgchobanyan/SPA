<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ParentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource. +
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
//        $allParentCategories = Category::getAllParentCategories();
        $allParentCategories = ParentCategory::all();

        return response()->json($allParentCategories);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage. +
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            Category::storeNewParentCategory($request);
            $success = true;
            $message = 'Parent Category register successfully';
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
     * Display the specified resource. +
     *
     * @param  \App\Models\ParentCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ParentCategory $category)
    {
        return response()->json($category);
    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\Category  $category
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Category $category)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage. +
     * @param  \App\Models\ParentCategory $category
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ParentCategory $category)
    {
        try {
            Category::updateParentCategory($request, $category);
            $success = true;
            $message = 'Parent Category updated successfully';
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
     * Remove the specified resource from storage. +
     * @param  \App\Models\ParentCategory $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ParentCategory $category)
    {
        try {
            $category->delete();
            $success = true;
            $message = 'Parent Category deleted successfully';
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
