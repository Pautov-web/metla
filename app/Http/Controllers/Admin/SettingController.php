<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        return view('admin.settings');
    }

    public function update(Request $request)
    {
        foreach(request()->all() as $key => $value) {
            if (is_null($value) || mb_strpos($key, '_') === 0) {
                settings()->forget($key);
            } else {
                if(request()->hasFile($key)) {
                    if (settings()->get($key)) 
                        Storage::disk('public')->delete(settings()->get($key));

                    $file = request()->file($key);        
                    $file_name = $file->hashName();
                    $value = $file->store('upload/settings');
                }
                settings()->set($key, $value);
            }
        }
        settings()->save();

        return response()->json(['type' => 'success', 'title' => __('Успешно'), 'msg' => __('Сохранено'), 'route' => route('admin.settings')]);
    }
}
