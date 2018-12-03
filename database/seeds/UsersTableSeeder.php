<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tony=[
            'name'=>'托尼',
            'email'=>'646547989@qq.com',
            'avatar'=>'/avatar/aratar_'.rand(1, 1665).'.jpg',
            'intro'=>'一切都随风都随风都随风……',
            'password'=>bcrypt('admin888')
        ];
        $hou=[
            'name'=>'猴子',
            'email'=>'15001963096@qq.com',
            'avatar'=>'/avatar/aratar_'.rand(1, 1665).'.jpg',
            'intro'=>'山中无老虎，猴子称大王……',
            'password'=>bcrypt('admin888')
        ];
        \App\Models\User::create($tony);
        \App\Models\User::create($hou);
        factory(\App\Models\User::class)->times(10)->create();

        /*// 初始化用户角色，将 1 号用户指派为『站长』
        $user = \App\Models\User::find(1);
        $user->assignRole('Founder');

        // 将 2 号用户指派为『管理员』
        $user = \App\Models\User::find(2);
        $user->assignRole('Maintainer');*/
    }
}
