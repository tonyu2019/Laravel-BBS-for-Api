<?php

namespace App\Http\Controllers\Index;

use App\Handlers\ImgUploadHandle;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show(User $user){
        return view('index.user.show', compact('user'));
    }

    public function edit(User $user){
        $this->authorize('update', $user);
        return view('index.user.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user, ImgUploadHandle $upload){
        $this->authorize('update', $user);
        $data=$request->all();
        if ($request->hasFile('avatar')){
            if ($result=$upload->save($request->avatar, 'avatar', $user->id)){
                $data['avatar']=$result['path'];
                if(file_exists($user->avatar && public_path().$data['avatar'])){
                    unlink(public_path().$data['avatar']);
                }
            }
        }
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }
}
