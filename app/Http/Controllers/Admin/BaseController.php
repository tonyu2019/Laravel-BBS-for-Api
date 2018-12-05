<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        //判断用户有没有访问后台的权限
        $this->middleware('checkAdmin');
    }
}
