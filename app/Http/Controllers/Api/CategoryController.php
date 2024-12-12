<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Category;
use Exception;
use Illuminate\Routing\Controller;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ApiResponse::Success(
                Category::query()->orderBy('id', 'desc')->get(),
                'Categories List',
                200
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Fetching Categories",500);
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            $data = $request->validated();

            return ApiResponse::Success(
                Category::create($data),
                'Category Created Successfully',
                201
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Saving",500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
            return ApiResponse::Success(
                $category,
                'Category Details',
                200
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Fetching Details",500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $data = $request->validated();

            $category->update($data);

            return ApiResponse::Success(
                $category,
                'Category Updated Successfully',
                201
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Updating",500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return ApiResponse::Success(
                [],
                'Category Deleted Successfully',
                200
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Deleting",500);
        }
    }
}
