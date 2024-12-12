<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Product;
use Exception;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ApiResponse::Success(
                Product::query()->with(['brand', 'category', 'purchaseDetails'])->orderBy('id', 'desc')->get(),
                'Products List',
                200
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Fetching Products", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $data = $request->validated();

            return ApiResponse::Success(
                Product::create($data)->load(['brand', 'category', 'purchaseDetails']),
                'Product Created Successfully',
                201
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Saving", 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        try {
            return ApiResponse::Success(
                $product->load(['brand', 'category', 'purchaseDetails']),
                'Product Details',
                200
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Fetching Details", 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $data = $request->validated();

            $product->update($data);

            return ApiResponse::Success(
                $product->load(['brand', 'category', 'purchaseDetails']),
                'Product Updated Successfully',
                201
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Updating", 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return ApiResponse::Success(
                [],
                'Product Deleted Successfully',
                200
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Deleting", 500);
        }
    }
}
