<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Models\Artikel;
use App\Models\Komentar;
use App\Models\SubKomentar;
use Validator;
use Storage;
use Setting;

class SubKomentarController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'content' => 'required',
            'id_artikel' => 'required',
            'id_komentar' => 'required',
        ]);

        $save=SubKomentar::insertData($request);

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
            'id_komentar' => 'required',
        ]);

   
        $update=SubKomentar::updateData($request);


        if($update){
            return redirect()->back()->with('message','success update data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','primary');
        }
    }

    public function destroy($id){

        $delete = SubKomentar::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','primary');
        }
    }
}
