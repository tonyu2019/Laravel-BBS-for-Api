<?php

namespace App\Http\Controllers\Index;


class IndexController extends BaseController
{
    public function index(){
        return view('index.index.index');
    }
}
