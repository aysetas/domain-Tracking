<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){

        $setting=Setting::first();

        return view('back.setting',compact('setting'));
    }
    public function update(SettingUpdateRequest $request, Setting $id){
        
     return "çalışıyor";
    }


}
