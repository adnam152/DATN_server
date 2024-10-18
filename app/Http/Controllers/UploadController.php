<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function uploadFile($request)
    {
        // Upload
        $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath())->getSecurePath();

        // Upload with transformation
        $uploadedFileUrl = cloudinary()->upload($request->file('file')->getRealPath(), [
            'folder' => 'uploads',
            'transformation' => [
                'width' => 400,
                'height' => 400,
                'crop' => 'fill'
            ]
        ])->getSecurePath();

        // Get URL
        // $url = cloudinary()->getUrl($publicId);

        // // Check if file exists
        // $exists = Storage::disk('cloudinary')->exists($publicId);
    }
}
