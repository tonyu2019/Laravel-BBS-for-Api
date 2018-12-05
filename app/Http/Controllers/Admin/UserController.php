<?php

namespace App\Http\Controllers\Admin;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends BaseController
{
    public function index(){
//        $this->authorize('user_index');
        $users=User::with('roles')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create(){
//        $this->authorize('user_add');
        $roles=Role::orderBy('id', 'desc')->get();
        return view('admin.user.create_edit', compact('roles'));
    }

    public function store(Request $request, User $user){
//        $this->authorize('user_add');
        $this->validate($request, [
            'email' => 'required|unique:users'
        ],[
            'email.required'    => '邮箱必填',
            'email.unique'       => '邮箱已存在'
        ]);
        $user->name=$request->name;
        $user->email    = $request->email;
        $user->password      = $request->password;
        $user->intro    = $request->intro;
        DB::beginTransaction();
        if ($user->save() && $user->assignRole($request->role)){
            DB::commit();
            return redirect()->route('admin.users.index')->with('success', '用户添加成功');

        }else{
            DB::rollBack();
            return redirect()->route('admin.users.index')->with('danger','添加用户失败');
        }

    }

    public function edit(User $user){
//        $this->authorize('user_edit');
        $roles=Role::orderBy('id', 'desc')->get();
        return view('admin.user.create_edit', compact('roles', 'user'));
    }

    public function update(User $user, Request $request){
//        $this->authorize('user_edit');
        $user->name=$request->name;
        $user->email    = $request->email;
        $user->password      = $request->password;
        $user->intro    = $request->intro;
        DB::beginTransaction();
        if ($user->save() && $user->syncRoles($request->role)){
            DB::commit();
            return redirect()->route('admin.users.index')->with('success', '用户更新成功');

        }else{
            DB::rollBack();
            return redirect()->route('admin.users.index')->with('danger','更新用户失败');
        }
    }

    public function destroy(User $user){
//        $this->authorize('user_del');
        if ($user->delete()){
            return back()->with('success','删除用户成功');

        }else{
            return back()->with('danger','删除用户失败');
        }

    }
}
