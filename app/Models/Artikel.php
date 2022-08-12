<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Setting;
use DB;
use Storage;
use Illuminate\Support\Facades\Session;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'id_kategori_artikel',
        'content',
        'url_video',
        'status',
        'foto',
        'tanggal',
        'created_by',
        'updated_by',
    ];

    public static function listData(){
        $list = DB::table('artikel')
                ->join('users','artikel.created_by','=','users.id')
                ->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id')
                ->where('artikel.status','publish')
                ->orderBy('artikel.id','desc') 
                ->select('artikel.*','users.name as users','kategori_artikel.name as kategori_artikel')
                ->paginate(10);

        return $list;
    }

    public static function countData(){
        $count = DB::table('artikel')
                    ->join('users','artikel.created_by','=','users.id')
                    ->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id')
                    ->where('artikel.status','publish')
                    ->select('artikel.*','users.name as users','kategori_artikel.name as kategori_artikel')
                    ->orderBy('artikel.id','desc') 
                    ->count();

        return $count;
    }

    public static function insertData($request){

        if($request->file('foto')){

            $data['foto']=Setting::image($request->file('foto'),'artikel');
        }

        $data['id_kategori_artikel']=$request->id_kategori_artikel;
        $data['judul']=$request->judul;
        $data['content']=$request->content;
        $data['status']=$request->status;
        $data['tanggal']=$request->tanggal;
        $data['url_video']=$request->url_video;
        $data['created_by']=Session::get('id_users');

        $save = Artikel::create($data);

        return $save;
    } 

    public static function updateData($request){

        $check=Artikel::find($request->id);
        if($check->foto){
            if($request->file('foto')){
                // delete file before update
                Storage::delete('public/'.$check->foto);

                $data['foto']=Setting::image($request->file('foto'),'artikel');
            }
        }else{
            if($request->file('foto')){

                $data['foto']=Setting::image($request->file('foto'),'artikel');
            }
        }
        
            $data['id_kategori_artikel']=$request->id_kategori_artikel;
            $data['judul']=$request->judul;
            $data['content']=$request->content;
            $data['status']=$request->status;
            $data['tanggal']=$request->tanggal;
            $data['url_video']=$request->url_video;
            $data['updated_by']=Session::get('id_users');
        
        $update=Artikel::where('id',$request->id)
                ->update($data);

        return $update;
    }

    public static function detailData($request){
        $detail=DB::table('artikel')
                ->join('users','artikel.created_by','=','users.id')
                ->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id')
                ->where('artikel.id',$request->id)
                ->select('artikel.*','users.name as users','kategori_artikel.name as kategori_artikel')
                ->first();

        return [
            'id'                  => $detail->id,
            'id_kategori_artikel' => $detail->id_kategori_artikel,
            'kategori_artikel'    => $detail->kategori_artikel,
            'judul'               => $detail->judul,
            'content'             => $detail->content,
            'status'              => $detail->status,
            'tanggal'             => $detail->tanggal,
            'users'               => $detail->users,
            'foto'                => url('storage/'.$detail->foto),
            'created_at'          => $detail->created_at,
            'updated_at'          => $detail->updated_at,
        ];
    }
}