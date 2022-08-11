<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class KategoriArtikel extends Model
{
    use HasFactory;

    protected $table = 'kategori_artikel';

    protected $fillable = [
        'name',
    ];

    public static function listData(){
        $list=DB::table('kategori_artikel')
                ->orderBy('id','desc')
                ->paginate(20);

        return $list;
    }

    public static function insertData($request){

        $save = KategoriArtikel::create([
           'name'=>$request->name 
        ]);

        return $save;
    } 

    public static function updateData($request){
        
        $update=KategoriArtikel::where('id',$request->id)
                ->update([
                    'name'=>$request->name 
                ]);

        return $update;
    }
}
