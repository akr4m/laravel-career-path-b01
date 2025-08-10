<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    public function index()
    {
        $images = Image::latest()->get();

        return view('gallery', [
            'images' => $images,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'file' => ['required', 'file', 'max:4048', 'mimes:jpg,jpeg,png,pdf'],
        ]);

        $file = $data['file'];
        $originalName = $file->getClientOriginalName();
        $ext = $file->getClientOriginalExtension();
        $storedName = now()->format('Ymd_His') . '_' . Str::random(8) . '.' . $ext;

        // Store in public disk under uploads
        $path = $file->storeAs('uploads', $storedName, 'public');

        Image::create([
            'name' => $originalName,
            'path' => $path,
        ]);

        return back();
    }

    public function destroy(Image $image)
    {
        Storage::delete($image->path);

        $image->delete();

        return back();
    }
}
