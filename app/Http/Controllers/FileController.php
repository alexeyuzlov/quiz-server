<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadRequest;
use App\Response;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $files = [
            Storage::get('file1.jpg')
        ];
        return Response::success($files);
    }

    public function store(UploadRequest $request)
    {
        $path = $request->file('file')->store('uploads');
        return $path;
    }
}
