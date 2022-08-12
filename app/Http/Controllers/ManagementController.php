<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Models\Artikel;
use App\Models\Management;
use Validator;
use Storage;
use Setting;

class ManagementController extends Controller
{
    public function index($id){
        $data['name']       ='Performance';
        $data['link']       ='artikel';
        $data['sublink']    ='performance';
        $data['row']        =Artikel::find(Crypt::decryptString($id));

        return view('admin.artikel.management.performance',$data);
    }
}
