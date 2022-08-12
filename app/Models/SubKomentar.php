<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class SubKomentar extends Model
{
    use HasFactory;
    protected $table = 'subkomentar';

    protected $fillable = [
        'name',
        'content',
        'id_artikel',
        'id_komentar',
    ];

    public static function listData($id,$id_komentar){
        $list=DB::table('subkomentar')
                ->where('id_artikel',$id)
                ->where('id_komentar',$id_komentar)
                ->orderBy('id','asc')
                ->get();

        return $list;
    }

    public static function insertData($request){

        $save = SubKomentar::create([
           'name'=>$request->name,
           'content'=>$request->content,
           'id_artikel'=>$request->id_artikel, 
           'id_komentar'=>$request->id_komentar, 
        ]);

        return $save;
    } 

    public static function updateData($request){
        
        $update=SubKomentar::where('id',$request->id)
                ->update([
                    'name'=>$request->name,
                    'content'=>$request->content,
                    'id_artikel'=>$request->id_artikel, 
                    'id_komentar'=>$request->id_komentar,
                ]);

        return $update;
    }
}
