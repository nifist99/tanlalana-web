<?php

namespace App\Http\Controllers;

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

class ArtikelController extends Controller
{
    public function index(){
        $data['list']=Artikel::listData();
        $data['name']='Artikel';
        $data['link']='artikel';
        $data['no']  =1;
        return view('admin.artikel.index',$data);
    }

    public function create(){
        $data['name']='Artikel';
        $data['link']='artikel';
        $data['list']=KategoriArtikel::all();
        return view('admin.artikel.create',$data);
    }

    public function edit($id){
        $data['name']='Artikel';
        $data['link']='artikel';
        $data['list']=KategoriArtikel::all();
        $data['row']=Artikel::find(Crypt::decryptString($id));
        $data['kategori']=KategoriArtikel::find($data['row']->id_kategori_artikel);
        return view('admin.artikel.edit',$data);
    }

    public function detail($id){
        $data['name']='Artikel';
        $data['link']='artikel';
        $data['row']=Artikel::find(Crypt::decryptString($id));
        return view('admin.artikel.detail',$data);
    }

    public function store(Request $request){
        $request->validate([
            'id_kategori_artikel' => 'required|integer',
            'judul'               => 'required|string',
            'content'             => 'required|string',
            'status'              => 'required|string',
            'foto'                => 'required|file|max:2000',
            'tanggal'             => 'required|date',
        ]);


        $save=Artikel::insertData($request);

        if($save){
            return redirect()->back()->with('message','success save data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','primary');
        }
    }

    public function update(Request $request){

        $request->validate([
            'id' => 'required|integer',
            'id_kategori_artikel' => 'required|integer',
            'judul'               => 'required|string',
            'content'             => 'required|string',
            'status'              => 'required|string',
            'tanggal'             => 'required|date',
            'foto'                => 'file|max:2000',
        ]);

        $update=Artikel::updateData($request);

        if($update){
            return redirect()->back()->with('message','success update data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','primary');
        }
        

    }

    public function destroy($id){

        // delete foto

        $check=Artikel::find($id);
        if($check->foto){
            Storage::delete('public/'.$check->foto);
        }

        // delete field
        $delete=Artikel::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','primary');
        }
    }
}
