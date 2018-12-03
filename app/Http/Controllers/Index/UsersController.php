<?php

namespace App\Http\Controllers\Index;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends BaseController
{
    public function show(User $user){
        return view('index.user.show', compact('user'));
    }

    public function edit(User $user){
        return view('index.user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user){
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
