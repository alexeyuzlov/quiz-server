<?php

namespace App;

use Illuminate\Http\JsonResponse;

class Response
{
    public static function success($data = null, $message = null): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'status' => 'success',
            'message' => $message
        ], 200);
    }

    public static function fail($data = null, $message = null, $status = 500): JsonResponse
    {
        return response()->json([
            'data' => $data,
            'status' => 'fail',
            'message' => $message
        ], $status);
    }
}
