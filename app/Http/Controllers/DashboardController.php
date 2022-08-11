<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['name']='Dashboard';
        $data['link']='dashboard';
        return view('admin.dashboard.dashboard',$data);
    }
}
