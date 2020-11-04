<?php

namespace App;

class Response
{
    public static function success($data = null, $message = null)
    {
        return response()->json([
            'data' => $data,
            'status' => 'success',
            'message' => $message
        ], 200);
    }

    public static function fail($data = null, $message = null, $status = 500)
    {
        return response()->json([
            'data' => $data,
            'status' => 'fail',
            'message' => $message
        ], $status);
    }
}

