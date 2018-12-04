<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Reply::class, function (Faker $faker) {
    // 所有用户 ID 数组，如：[1,2,3,4]
    $user_ids = \App\Models\User::all()->pluck('id')->toArray();

    // 所有话题 ID 数组，如：[1,2,3,4]
    $topic_ids = \App\Models\Topic::all()->pluck('id')->toArray();
    // 随机取一个月以内的时间
    $time = $faker->dateTimeThisMonth();
    return [
        'content' => $faker->realText(50),
        'user_id'   => $faker->randomElement($user_ids),
        'topic_id'  => $faker->randomElement($topic_ids),
        'created_at' => $time,
        'updated_at' => $time,
    ];
});
