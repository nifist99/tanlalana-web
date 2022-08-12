<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Download extends Model
{
    use HasFactory;
    protected $table = 'download';

    protected $fillable = [
        'name',
        'link',
        'id_artikel',
    ];

    public static function listData($id){
        $list=DB::table('download')
                ->where('id_artikel',$id)
                ->orderBy('id','desc')
                ->paginate(20);

        return $list;
    }

    public static function insertData($request){

        $save = Download::create([
           'name'=>$request->name,
           'link'=>$request->link,
           'id_artikel'=>$request->id_artikel, 
        ]);

        return $save;
    } 

    public static function updateData($request){
        
        $update=Download::where('id',$request->id)
                ->update([
                    'name'=>$request->name,
                    'link'=>$request->link,
                    'id_artikel'=>$request->id_artikel, 
                ]);

        return $update;
    }
}
