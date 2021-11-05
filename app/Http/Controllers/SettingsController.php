<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use Illuminate\Http\Request;
use App\User;
use App\Setting;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;



class SettingsController extends Controller
{
  use UploadFileTrait;
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function profile()
    {
      return view('settings.profile');
    }

    public function editProfile()
    {
      return view('settings.edit-profile');
    }
    public function updateProfile(Request $request)
    {

      //masih error dibagian upload gambar dan validasi image
      $user = Auth::user();
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|unique:users,email,' . $user->id,
      ]);

$users = User::find($user->id);
$photo = $users->photo;
if(!$users->update($request->all())) return redirect()->back();
if ($request->hasFile('photo')) {
    $filename = null;
    $uploaded_cover = $request->file('photo');
    $extension = $uploaded_cover->getClientOriginalExtension();

    // membuat nama file random dengan extension
    $filename = md5(time()) . '.' . $extension;
    $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/admins_photo';

    // memindahkan file ke folder public/img
    $uploaded_cover->move($destinationPath, $filename);

    // hapus photo lama, jika ada
    $this->deletePhoto($photo);

    // ganti field photo dengan photo yang baru
    $users->photo = $filename;
    $users->save();
}
      /*
      $user->name = $request->get('name');
      $user->username = $request->get('username');
      $user->email = $request->get('email');
      $user->telp = $request->get('telp');
      $user->alamat = $request->get('alamat');
      $user->save();
*/


      Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Profil Berhasil Diubah"
      ]);
      return redirect('admin/settings/profile');
    }

    private function deletePhoto($photo)
    {
      if ($photo) {
      $old_photo = $photo;
      $filepath = public_path().DIRECTORY_SEPARATOR.'img/admins_photo'.DIRECTORY_SEPARATOR.$photo;

      try {
        File::delete($filepath);
      } catch (FileNotFoundException $e) {
        //file sudah dihapus/tidak ada
      }
    }
    }

    public function editPassword()
    {
      return view('settings.edit-password');
    }
    public function updatePassword(Request $request)
    {
      $user = Auth::user();
      $this->validate($request, [
        'password' => 'required|passcheck:'.$user->password,
        'new_password' => 'required|confirmed|min:6'
      ], [
        'password.passcheck' => 'Password lama tidak sesuai'
      ]);

      $user->password = bcrypt($request->get('new_password'));
      $user->save();

      Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Password berhasil diubah"
      ]);
      return redirect('admin/settings/password');
    }
    public function general()
    {
      $item =  Setting::first();
      return view('settings.general', ['item' => $item]);
    }
    public function editGeneral()
    {
      //buat lebih dinamis find all first
      $setting = Setting::find('1');
      return view('settings.edit-general')->with(compact('setting'));
    }
    public function updateGeneral(SettingRequest $request)
    {
      $setting = Setting::find('1');
      /*
      $setting->update($request->only('name','address','about','denda','durasi'));
*/

// $logo = $setting->logo;
if(!$setting->update($request->all())) return redirect()->back();
$this->uploadFile($request, $setting, 'logo_file', 'logo', 'logo');
// if ($request->hasFile('logo')) {
// $filename = null;
// $uploaded_logo = $request->file('logo');
// $extension = $uploaded_logo->getClientOriginalExtension();

// // membuat nama file random dengan extension
// $filename = md5(time()) . '.' . $extension;
// $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img/logo/';

// // memindahkan file ke folder public/img
// $uploaded_logo->move($destinationPath, $filename);

// // hapus cover lama, jika ada
// $this->deleteLogo($logo);

// // ganti field cover dengan cover yang baru
// $setting->logo = $filename;
// $setting->save();
// }

        Session::flash("flash_notification", [
          "level" => "success",
          "message" => "Berhasil mengubah Pengaturan"
        ]);
        return redirect('admin/settings/general');
    }

    // private function deleteLogo($logo)
    // {
    //   if ($logo) {
    //   $old_logo = $logo;
    //   $filepath = public_path().DIRECTORY_SEPARATOR.'img/logo'.DIRECTORY_SEPARATOR.$logo;

    //   try {
    //     File::delete($filepath);
    //   } catch (FileNotFoundException $e) {
    //     //file sudah dihapus/tidak ada
    //   }
    // }
    // }

}
