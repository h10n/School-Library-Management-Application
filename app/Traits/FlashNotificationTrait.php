<?php
namespace App\Traits;
use Session;
trait FlashNotificationTrait {    
   public function sendFlashNotification($type, $val)
   {
      switch ($type) {
         case 'menambah':
            $type = 'added';
            break;
         
         case 'mengubah':
            $type = 'updated';
            break;
         
         case 'menghapus':
            $type = 'deleted';
            break;
         
         default:
            # code...
            break;
      }
      
    Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Successfully $type $val"
      ]);
   }  
}