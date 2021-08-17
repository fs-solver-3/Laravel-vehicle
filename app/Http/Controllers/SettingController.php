<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting\Setting;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{
    //
    public function index()
    {
        if (!Gate::allows('Setting_access')) {
            return abort(401);
        }
        return view('setting.index');
    }

    public function store(Request $request)
    {
        $rules = Setting::getValidationRules();
        $data = $this->validate($request, $rules);
        $validSettings = array_keys($rules);

        foreach ($data as $key => $val) {
            if (in_array($key, $validSettings)) {
                Setting::add($key, $val, Setting::getDataType($key));
            }
        }

        return redirect()->back()->with('status', trans('message.setting_save'));
    }
}