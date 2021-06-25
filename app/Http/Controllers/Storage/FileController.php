<?php

namespace App\Http\Controllers\Storage;

use Waffleboss\Foundation\Http\Controller;
use Illuminate\Http\Request;
use App\Models\Storage\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function show(Request $request, $id)
    {
        $file = File::findOrFail($id);
        return Storage::disk('file')->download($file->storage_dir, $file->name);
    }
}
