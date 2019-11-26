<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Setting;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
  use UploadFileTrait;

  public function __construct()
  {
    $this->middleware('auth');
  }
  public function general()
  {
    $item =  Setting::first();
    return view('settings.general', ['item' => $item]);
  }
  public function editGeneral()
  {
    $setting = Setting::first();
    return view('settings.edit-general')->with(compact('setting'));
  }
  public function updateGeneral(SettingRequest $request)
  {
    $setting = Setting::first();

    if (!$setting->update($request->all())) return redirect()->back();
    $this->uploadFile($request, $setting, 'logo_file', 'logo', 'logo');

    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Successfully Updated Settings"
    ]);
    return redirect('admin/settings/general');
  }
}
