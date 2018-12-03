<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Topic::class, function (Faker $faker) {

    // 随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();
    // 传参为生成最大时间不超过，创建时间永远比更改时间要早
    $created_at = $faker->dateTimeThisMonth($updated_at);
    // 所有用户 ID 数组，如：[1,2,3,4]
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();

    // 所有分类 ID 数组，如：[1,2,3,4]
    $category_ids = \App\Models\Category::all()->pluck('id')->toArray();

    return [
        'title' => $faker->realText(20),
        'body' => $faker->realText(500),
        'except' => $faker->realText(200),
        'user_id'=>$faker->randomElement($user_ids),
        'category_id'   => $faker->randomElement($category_ids),
        'created_at' => $created_at,
        'updated_at' => $updated_at,
    ];
});
