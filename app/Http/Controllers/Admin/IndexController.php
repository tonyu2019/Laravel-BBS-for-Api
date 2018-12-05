<?php

namespace App\Http\Controllers\Admin;

class IndexController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
//        dd('ad');
        return view('admin.index.index');
    }
}
