<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class _ApiController extends Controller
{
    public function __invoke()
    {
        try {
            return response()->json([
                'message' => 'Welcome to the API',
                'status' => 'success',
                'data' => null,
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
