<?php
namespace App\Traits;
use Session;
trait FlashNotificationTrait {    
   public function sendFlashNotification($type, $val)
   {
    Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Berhasil $type $val"
      ]);
   }  
}