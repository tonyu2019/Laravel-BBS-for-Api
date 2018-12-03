<?php

namespace App\Http\Controllers\Index;

use App\Handlers\ImgUploadHandle;
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

    public function update(UserRequest $request, User $user, ImgUploadHandle $upload){
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
