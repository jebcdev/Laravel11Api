<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class _ApiController extends Controller
{
    public function index()
    {
        try {
            return response()->json([
                'message' => 'Welcome to the API',
                'status' => 'success',
                'data' => null
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
