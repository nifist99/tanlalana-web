<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use Validator;
use Storage;
use Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class AutoArtikelController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_kategori_artikel' => 'required',
            'judul'               => 'required|string',
            'content'             => 'required',
            'status'              => 'required|string',
            'foto'                => 'required|string',
            'type'                => 'required|string',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $message='';
            $no = 1;
            foreach ($errors->all() as $key) {
                $message.=$no++.'.'.$key.' ';
            }
            return response()->json([
                'status'=>false,
                'code'  =>400,
                'message'=>$message,
            ], 400);
        }


        $save=Artikel::create([
            'id_kategori_artikel' => $request->id_kategori_artikel,
            'judul'               => $request->judul,
            'content'             => $request->content,
            'status'              => $request->status,
            'foto'                => $request->foto,
            'type'                => $request->type,
            'tanggal'             => date('Y-m-d'),
            'created_by'          =>1,        
        ]);

        if($save){
            return response()->json([
                "status"=>true,
                "code"  => 200,
                "message"=> "success",
            ], 200);
        }else{
            return response()->json([
                "status"=>false,
                "code"  => 400,
                "message"=> "failed",
            ], 400);
        }
    }
}
