<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SettingController extends Controller
{
    public function index(){


        $setting=Setting::first();

        return view('back.setting', compact('setting'));

    }

    public function update(SettingUpdateRequest $request, Setting $id){

        $setting = Setting::first();

       $setting->update($request->post());

        if ($request->hasFile('site_logo')) {
            $setting->addMedia($request->site_logo)->toMediaCollection('document');
        }
        return redirect()
            ->route('back.setting.index')->withMessage('Ayarlar başarıyla güncellendi!');

    }

}
