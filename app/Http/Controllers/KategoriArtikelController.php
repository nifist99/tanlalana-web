<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\KategoriArtikel;

class KategoriArtikelController extends Controller
{
    public function index(){
        $data['list']=KategoriArtikel::listData();
        $data['name']='Kategori Artikel';
        $data['link']='kategori_artikel';
        $data['no']  =1;
        return view('admin.kategori-artikel.index',$data);
    }

    public function create(){
        $data['name']='Kategori Artikel';
        $data['link']='kategori_artikel';
        return view('admin.kategori-artikel.create',$data);
    }

    public function edit($id){
        $data['name']='Kategori Artikel';
        $data['link']='kategori_artikel';
        $data['row']=KategoriArtikel::find(Crypt::decryptString($id));
        return view('admin.kategori-artikel.edit',$data);
    }

    public function detail($id){
        $data['name']='Kategori Artikel';
        $data['link']='kategori_artikel';
        $data['row']=KategoriArtikel::find(Crypt::decryptString($id));
        return view('admin.kategori-artikel.detail',$data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:3|unique:kategori_artikel,name',
        ]);

        $save=KategoriArtikel::insertData($request);

        if($save){
            return redirect()->back()->with('message','success save data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed save data')->with('message_type','danger');
        }
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required|string',
        ]);

        $check = KategoriArtikel::find($request->id);

        // memasttikan tidak ada jenis kandang yang sama
        if($check->name == $request->name){

            $update=KategoriArtikel::updateData($request);

        }else{
            $validator = Validator::make($request->all(), [
                'name' => 'required|min:3|unique:kategori_artikel,name',
            ]);
    
            if ($validator->fails()) {
                $errors = $validator->errors();
                return response()->json([
                    'status'=>false,
                    'code'  =>400,
                    'message'=>$errors,
                ], 200);
            }

            $update=KategoriArtikel::updateData($request);
        }

        if($update){
            return redirect()->back()->with('message','success update data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed update data')->with('message_type','danger');
        }
    }

    public function destroy($id){

        $delete = KategoriArtikel::where('id',$id)->delete();

        if($delete){
            return redirect()->back()->with('message','succes delete data')->with('message_type','primary');
        }else{
            return redirect()->back()->with('message','failed delete data')->with('message_type','danger');
        }
    }
}
