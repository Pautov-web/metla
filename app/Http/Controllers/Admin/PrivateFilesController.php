<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PrivateFilesController extends Controller
{
    public function get(string $path)
    {
    	$file = Storage::disk('private')->path($path);
    	$mime = Storage::mimeType($path);

    	return response()->file($file, ['Content-Type' => $mime]);
    }
}
