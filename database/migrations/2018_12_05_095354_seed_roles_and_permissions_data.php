<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRolesAndPermissionsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 清除缓存
        app()['cache']->forget('spatie.permission.cache');
        // 先创建权限
    \Spatie\Permission\Models\Permission::create(['name' => 'manage_contents', 'title' => '内容']);
        \Spatie\Permission\Models\Permission::create(['name' => 'manage_users', 'title' => '用户']);
        \Spatie\Permission\Models\Permission::create(['name' => 'edit_settings', 'title' => '设置']);

        // 创建站长角色，并赋予权限
        $founder = \Spatie\Permission\Models\Role::create(['name' => 'Founder', 'title' => '超级管理员']);
        $founder->givePermissionTo('manage_contents');
        $founder->givePermissionTo('manage_users');
        $founder->givePermissionTo('edit_settings');

        // 创建管理员角色，并赋予权限
        $maintainer = \Spatie\Permission\Models\Role::create(['name' => 'Maintainer', 'title' => '普通管理员']);
        $maintainer->givePermissionTo('manage_contents');
    }

    public function down()
    {
        // 清除缓存
        app()['cache']->forget('spatie.permission.cache');

        // 清空所有数据表数据
        $tableNames = config('permission.table_names');

        \Illuminate\Database\Eloquent\Model::unguard();
        \Illuminate\Support\Facades\DB::table($tableNames['role_has_permissions'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['model_has_roles'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['model_has_permissions'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['roles'])->delete();
        \Illuminate\Support\Facades\DB::table($tableNames['permissions'])->delete();
        \Illuminate\Database\Eloquent\Model::reguard();
    }
}
