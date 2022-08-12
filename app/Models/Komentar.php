<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';

    protected $fillable = [
        'name',
        'content',
        'id_artikel',
    ];

    public static function listData($id){
        $list=DB::table('komentar')
                ->where('id_artikel',$id)
                ->orderBy('id','desc')
                ->paginate(20);

        return $list;
    }

    public static function insertData($request){

        $save = Komentar::create([
           'name'=>$request->name,
           'content'=>$request->content,
           'id_artikel'=>$request->id_artikel, 
        ]);

        return $save;
    } 

    public static function updateData($request){
        
        $update=Komentar::where('id',$request->id)
                ->update([
                    'name'=>$request->name,
                    'content'=>$request->content,
                    'id_artikel'=>$request->id_artikel, 
                ]);

        return $update;
    }
}
