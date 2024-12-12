<?php

namespace App\Http\Responses;

use Exception;

class ApiResponse
{
    public static function Success($data = [], $message = 'Default Success Message', $statusCode = 200)
    {
        try {
            return response()->json([
                'message' => $message,
                'data' => $data
            ], $statusCode);
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Error',
                'error' => $ex->getMessage()
            ], 500);
        }
    }

    public static function Error($data = [], $message = 'Default Error Message', $statusCode = 500)
    {
        try {
            return response()->json([
                'message' => $message,
                'data' => $data
            ], $statusCode);
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Error',
                'error' => $ex->getMessage()
            ], 500);
        }
    }
}

/* 
} catch (Exception $e) {
            return ApiResponse::Error($e->getMessage(), "Error While Saving",500);
        }
*/
