<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');

        // Perform validation, storage, and other logic as needed

        // Example: Store the file in the public folder
        $file->store('uploads', 'public');

        // Return a response
        return response()->json(['message' => 'File uploaded successfully']);
    }
}
