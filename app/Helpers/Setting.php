<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Image;
use Storage;
use Illuminate\Support\Str;

class Setting {

    public static function App(){
        return "Tanlalana";
    }

    public static function image($file,$folder){

        $ext                = $file->extension();
        
        $filename           = Str::random(50).'.'.$ext;
        $file_path          = 'public/'.$folder;

        $path               =Storage::putFileAs($file_path, $file, $filename);

        return $folder.'/'.$filename;
    }

}