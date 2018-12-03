<?php

namespace App\Http\Controllers\Index;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends BaseController
{
    public function show(User $user){
        return view('index.user.show', compact('user'));
    }
}
