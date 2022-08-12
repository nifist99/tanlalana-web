<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Models\Artikel;
use App\Models\Komentar;
use Validator;
use Storage;
use Setting;

class KomentarController extends Controller
{
    public function index($id){
        $data['name']       ='Komentar';
        $data['link']       ='artikel';
        $data['sublink']    ='komentar';
        $data['list']       =Komentar::listData(Crypt::decryptString($id));
        $data['row']        =Artikel::find(Crypt::decryptString($id));

        return view('admin.artikel.management.komentar.index',$data);
    }

    public function create($id){
        $data['name']       ='Komentar';
        $data['link']       ='artikel';
        $data['sublink']    ='komentar';
        $data['row']        =Artikel::find(Crypt::decryptString($id));

        return view('admin.artikel.management.komentar.create',$data);
    }

    public function edit($id,$id_komentar){
        $data['name']       ='Komentar';
        $data['link']       ='artikel';
        $data['sublink']    ='komentar';
        $data['row']        =Artikel::find(Crypt::decryptString($id));
        $data['key']        =Komentar::find(Crypt::decryptString($id_komentar));

        return view('admin.artikel.management.komentar.edit',$data);
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'content' => 'required',
            'id_artikel' => 'required',
        ]);

        $save=Komentar::insertData($request);

        if($save){
            return redirect()->back()->with('message','success save data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','primary');
        }
    }

    public function update(Request $request){
        $request->validate([
            'id' => 'required',
            'name' => 'required|min:3',
            'content' => 'required',
            'id_artikel' => 'required',
        ]);

   
        $update=Komentar::updateData($request);


        if($update){
            return redirect()->back()->with('message','success update data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','primary');
        }
    }

    public function destroy($id){

        $delete = Komentar::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','primary');
        }
    }
}
