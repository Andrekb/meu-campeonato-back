<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $file = $request->file('image');
        
        
        if (!$file) {
            return response()->json(['error' => 'No file uploaded'], 400);
        }
        
        // dd($file);
        // $st = Storage::disk('r2')->put($file);


        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $filename;

        $stored = Storage::disk('r2')->put($path, file_get_contents($file));
        
        dd($stored);
        $path = $file->store('r2');
    
        if (!$path) {
            return response()->json(['error' => 'Failed to upload image'], 500);
        }
    
        return response()->json(['url' => Storage::disk('r2')->url($path)], 201);
    }
    public function show($filename)
    {
        if (empty($filename)) {
            return response()->json(['error' => 'Filename is required'], 400);
        }

        $path = 'images/' . $filename;
        $exists = Storage::disk('r2')->exists($path);

        if (!$exists) {
            return response()->json(['error' => 'File not found'], 404);
        }

        $url = Storage::disk('r2')->url($path);
        return "<img src=". $url . ">";
        return response()->json(['url' => $url], 200);
    }
}
