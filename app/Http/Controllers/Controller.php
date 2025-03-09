<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function uploadFile($file,$path='uploads')
    {
        $fileName=md5(time().$file->getFilename()).'.'.$file->getClientOriginalExtension();
        return $file->storeAs($path,$fileName,'public');
    }
    
}
