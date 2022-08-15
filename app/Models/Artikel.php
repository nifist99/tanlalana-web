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
        'type',
        'created_by',
        'updated_by',
    ];

    public static function listDataAdmin(){
        $list = DB::table('artikel')
                ->join('users','artikel.created_by','=','users.id')
                ->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id')
                ->orderBy('artikel.id','desc') 
                ->select('artikel.*','users.name as users','kategori_artikel.name as kategori_artikel')
                ->paginate(10);

        return $list;
    }

    public static function listData(){
        $list = DB::table('artikel')
                ->join('users','artikel.created_by','=','users.id')
                ->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id')
                ->where('artikel.status','publish')
                ->orderBy('artikel.id','desc') 
                ->select('artikel.*','users.name as users','kategori_artikel.name as kategori_artikel')
                ->paginate(21);

        return $list;
    }

    public static function listNew(){
        $list = DB::table('artikel')
                ->join('users','artikel.created_by','=','users.id')
                ->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id')
                ->where('artikel.status','publish')
                ->orderBy('artikel.id','desc') 
                ->select('artikel.*','users.name as users','kategori_artikel.name as kategori_artikel')
                ->limit(5)
                ->get();

        return $list;
    }

    public static function listByCategory($id){
        $list = DB::table('artikel')
                ->join('users','artikel.created_by','=','users.id')
                ->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id')
                ->where('artikel.status','publish')
                ->where('kategori_artikel.id',$id)
                ->orderBy('artikel.id','desc') 
                ->select('artikel.*','users.name as users','kategori_artikel.name as kategori_artikel')
                ->paginate(12);

        return $list;
    }

    public static function search($judul){
        $list = DB::table('artikel')
                ->join('users','artikel.created_by','=','users.id')
                ->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id')
                ->where('artikel.status','publish')
                ->where('artikel.judul','like','%'.$judul.'%')
                ->orderBy('artikel.id','desc') 
                ->select('artikel.*','users.name as users','kategori_artikel.name as kategori_artikel')
                ->paginate(12);

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
            $data['status']=$request->status;
            $data['tanggal']=$request->tanggal;
            $data['url_video']=$request->url_video;
            $data['updated_by']=Session::get('id_users');
        
        $update=Artikel::where('id',$request->id)
                ->update($data);

        return $update;
    }

    public static function updateContent($request){

        $data['content']=$request->content;
        $data['updated_by']=Session::get('id_users');
        
        $update=Artikel::where('id',$request->id)
                ->update($data);

        return $update;
    }

    public static function detailData($id){
        $detail=DB::table('artikel')
                ->join('users','artikel.created_by','=','users.id')
                ->join('kategori_artikel','artikel.id_kategori_artikel','=','kategori_artikel.id')
                ->where('artikel.id',$id)
                ->select('artikel.*','users.name as users','kategori_artikel.name as kategori_artikel')
                ->first();

        $komentar = DB::table('komentar')->where('id_artikel',$id)->get();

        $sum_komentar = DB::table('komentar')->where('id_artikel',$id)->count();
        $sum_subkomentar = DB::table('subkomentar')->where('id_artikel',$id)->count();
        $download = DB::table('download')->where('id_artikel',$id)->count();

        return [
            'id'                  => $detail->id,
            'id_kategori_artikel' => $detail->id_kategori_artikel,
            'kategori_artikel'    => $detail->kategori_artikel,
            'judul'               => $detail->judul,
            'content'             => $detail->content,
            'status'              => $detail->status,
            'tanggal'             => $detail->tanggal,
            'url_video'           => $detail->url_video,
            'users'               => $detail->users,
            'foto'                => url('storage/'.$detail->foto),
            'created_at'          => $detail->created_at,
            'updated_at'          => $detail->updated_at,
            'komentar'            => $komentar,
            'total'               => $sum_komentar + $sum_subkomentar,
            'download'            => $download,
        ];
    }
}
