<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){

        $data['list']=Contact::listData();
        $data['name']='Contact';
        $data['link']='contact';
        $data['no']  =1;
        return view('admin.contact.index',$data);
    }
}
