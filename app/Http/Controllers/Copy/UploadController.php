<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    /**
     * Handle the incoming file upload.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => ['required', 'file', 'max:2048', 'mimes:jpg,jpeg,png,pdf'],
        ]);

        $file = $data['file'];
        $originalName = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $storedName = now()->format('Ymd_His').'_'.Str::random(8).'.'.$ext;

        // Store in public disk under uploads
        $path = $file->storeAs('uploads', $storedName, 'public');

        return back()->with('uploaded_path', $path)->with('uploaded_name', $originalName);
    }
}
