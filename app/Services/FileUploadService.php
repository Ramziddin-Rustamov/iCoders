<?php
// app/Services/FileUploadService.php

namespace App\Services;

use Illuminate\Support\Facades\File;

class FileUploadService
{
    public function uploadImages($request)
    {
        $data = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename = 'image/' . $image->getClientOriginalName() . '.' . $extension;
                $image->move('image/', $filename);
                $data[] = $filename;
            }
        }

        return $data;
    }

    public function deleteImage($imagePath)
    {
        if (File::exists(public_path($imagePath))) {
            File::delete(public_path($imagePath));
        }
    }
}
