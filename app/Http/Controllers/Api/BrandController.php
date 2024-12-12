<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use App\Http\Responses\ApiResponse;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Routing\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return ApiResponse::Success(
                Brand::query()->orderBy('id', 'desc')->get(),
                'Brands List',
                200
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e, "Error while fetching brands. " . $e->getMessage(), 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        try {
            $data = $request->validated();

            return ApiResponse::Success(
                Brand::create($data),
                'Brand Created Successfully',
                201
            );
            
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Saving",500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        try {
            return ApiResponse::Success(
                $brand,
                'Brands Details',
                200
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Fetching Details",500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        try {
            $data = $request->validated();

            $brand->update($data);

            return ApiResponse::Success(
                $brand,
                'Brand Updated Successfully',
                201
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Updating",500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        try {
            $brand->delete();

            return ApiResponse::Success(
                [],
                'Brand Deleted Successfully',
                200
            );
        } catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Deleting",500);
        }
    }
}
