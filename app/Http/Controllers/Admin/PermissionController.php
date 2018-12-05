<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('managePermissions');
    }
    public function index(){
        $permissions=Permission::paginate(10);
        return view('admin.permission.index', compact('permissions'));
    }

    public function create(){
        return view('admin.permission.create');
    }

    public function store(Request $request, Permission $permission){
        $permission->name=$request->name;
        $permission->title=$request->title;
        $permission->save();
        return redirect()->route('admin.permissions.index')->with('success','添加权限成功');
    }

    public function edit(Permission $permission){
        return view('admin.permission.create', compact('permission'));
    }

    public function update(Permission $permission, Request $request){
        $permission->name=$request->name;
        $permission->title=$request->title;
        $permission->save();
        return redirect()->route('admin.permissions.index')->with('success','修改权限成功');
    }

    public function destroy(Permission $permission){
        $this->authorize('del_permission');
        $permission->delete();
        return back()->with('success','删除权限成功');
    }
}
