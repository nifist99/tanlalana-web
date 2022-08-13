<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'content',
    ];

    public static function listData(){
        $list=DB::table('contact')
                ->orderBy('id','desc')
                ->paginate(20);

        return $list;
    }

    public static function listKategori(){
        $list=DB::table('contact')
                ->orderBy('id','desc')
                ->get();

        return $list;
    }

    public static function insertData($request){

        $save = Contact::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'phone'=>$request->phone,
           'content'=>$request->content,
        ]);

        return $save;
    } 

    public static function updateData($request){
        
        $update=Contact::where('id',$request->id)
                ->update([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'content'=>$request->content,
                ]);

        return $update;
    }
}
