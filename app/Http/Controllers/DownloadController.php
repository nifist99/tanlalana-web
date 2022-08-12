<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Models\Artikel;
use App\Models\Download;
use Validator;
use Storage;
use Setting;

class DownloadController extends Controller
{
    public function index($id){
        $data['name']       ='Download';
        $data['link']       ='artikel';
        $data['sublink']    ='download';
        $data['list']       =Download::listData(Crypt::decryptString($id));
        $data['row']        =Artikel::find(Crypt::decryptString($id));

        return view('admin.artikel.management.download.index',$data);
    }

    public function create($id){
        $data['name']       ='Download';
        $data['link']       ='artikel';
        $data['sublink']    ='download';
        $data['row']        =Artikel::find(Crypt::decryptString($id));

        return view('admin.artikel.management.download.create',$data);
    }

    public function edit($id,$id_download){
        $data['name']       ='Download';
        $data['link']       ='artikel';
        $data['sublink']    ='download';
        $data['row']        =Artikel::find(Crypt::decryptString($id));
        $data['key']        =Download::find(Crypt::decryptString($id_download));

        return view('admin.artikel.management.download.edit',$data);
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'link' => 'required',
            'id_artikel' => 'required',
        ]);

        $save=Download::insertData($request);

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
            'link' => 'required',
            'id_artikel' => 'required',
        ]);

   
        $update=Download::updateData($request);


        if($update){
            return redirect()->back()->with('message','success update data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','primary');
        }
    }

    public function destroy($id){

        $delete = Download::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','primary');
        }
    }
}
