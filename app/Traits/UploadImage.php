<?php

namespace App\Traits;

trait UploadImage
{
    public function upimage($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();

        $pathFull = 'uploads/' . $folderName . date('Y/m/d');
        
        $path = $file->storeAs('public/' . $pathFull, $fileNameOrigin);

        $dataUpload = [
            'name' => $fileNameOrigin,
            'path' =>  '/storage/' . $pathFull . '/' . $fileNameOrigin
        ];
        return $dataUpload;
    }
}
