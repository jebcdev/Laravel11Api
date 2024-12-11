<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\Client;
use Exception;
use Illuminate\Routing\Controller;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return response()->json([
                'message' => 'Clients List',
                'data' => Client::query()->orderBy('id', 'desc')->get()
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $request)
    {
        try {

            $data = $request->validated();

            $client = Client::create($data);

            return response()->json([
                'message' => 'Client Created',
                'data' => $client
            ], 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        try {

            return response()->json([
                'message' => 'Client Details',
                'data' => $client
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        try {
            $data = $request->validated();

            $client->update($data);

            return response()->json([
                'message' => 'Client Updated',
                'data' => $client
            ], 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        try {
            $client->delete();

            return response()->json([
                'message' => 'Client Deleted',
            ], 200);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function restore($id)
    {
        try {
            $client = Client::query()
                ->withTrashed()
                ->where('id', $id)
                ->first();

            if (!$client) {
                return response()->json([
                    'message' => 'Client Not Found',
                    'data' => null
                ], 404);
            }

            if (!$client->trashed()) {
                return response()->json([
                    'message' => 'Client Not Deleted',
                    'data' => null
                ], 404);
            }

            $client->restore();

            return response()->json([
                'message' => 'Client Restored',
                'data' => $client
            ], 200);
        } catch (Exception $ex) {
            return response()->json([
                'message' => 'Error',
                'data' => $ex->getMessage()
            ], 500);
        }
    }

        public function forceDestroy( $id){
            try {
                $client = Client::query()
                    ->withTrashed()
                    ->where('id', $id)
                    ->first();
    
                if (!$client) {
                    return response()->json([
                        'message' => 'Client Not Found',
                        'data' => null
                    ], 404);
                }
    
                if (!$client->trashed()) {
                    return response()->json([
                        'message' => 'Client Not Deleted',
                        'data' => null
                    ], 404);
                }
    
                $client->forceDelete();
    
                return response()->json([
                    'message' => 'Client Deleted Permanently',
                    'data' => null
                ], 200);
            } catch (Exception $ex) {
                return response()->json([
                    'message' => 'Error',
                    'data' => $ex->getMessage()
                ], 500);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
}
