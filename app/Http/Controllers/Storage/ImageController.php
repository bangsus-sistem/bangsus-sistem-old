<?php

namespace App\Http\Controllers\Res\Hrm;

use App\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Models\Storage\Image;
use Intervention\Image\Image as Intervention;

class ImageController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function show(Request $request, $id)
    {
        $image = Image::findOrFail($id);
        return Intervention::make(
            Storage::disk('image')->path($image->storage_dir)
        )->response();
    }
}
