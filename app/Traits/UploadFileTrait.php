<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadFileTrait {    
    public function generateUniqueFileName($file)
    {
        $symbols = ['.', ' ', '+', '-'];
        $symobls2 = ['(', ')'];

        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $fileName = pathinfo($originalName, PATHINFO_FILENAME);
        $fileName = str_replace($symbols, '_', $fileName);
        $fileName = str_replace($symobls2, '', $fileName);
        $fileName .= '_' . md5(time()) . '_' . rand(000, 999) . '.';
        $fileName .= $extension;

        return $fileName;
    }

    public function upload($directory, $file, $oldFileName = '')
    {
        if (!$file) return '';
        if (is_string($file)) return $file;
        if ($oldFileName) $this->deleteFile($directory, $oldFileName);

        $fileName = $this->generateUniqueFileName($file);
        $targetPath = "public/uploads/{$directory}";

        Storage::putFileAs($targetPath, $file, $fileName);

        return $fileName;
    }

    public function deleteFile($directory, $fileName)
    {
        return Storage::delete('public/uploads/'. $directory . '/' . $fileName);
    }   

    protected function uploadFile($request, $model, $tmpFileField, $fileField, $dir){
        if ($request->$tmpFileField) {
          $oldfilename = $model->$fileField;
          $fileName = $this->upload($dir, $request->$tmpFileField, $oldfilename);
          if ($fileName) {
              $model->$fileField = $fileName;
              $model->save();
          }            
      }
      }
}