<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    'middleware' => ['serializer:array', 'bindings']
], function($api) {
    //防止短信轰炸，1分钟限制一次获取验证码
    $api->group([
        'middleware'    => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),
    ], function ($api){
        // 短信验证码
        $api->post('verificationCodes', 'VerificationCodesController@store')
            ->name('api.verificationCodes.store');
        // 用户注册
        $api->post('users', 'UserController@store')->name('api.users.store');
        // 图片验证码
        $api->post('captchas', 'CaptchasController@store')
            ->name('api.captchas.store');
        // 第三方登录
        $api->post('socials/{social_type}/authorizations', 'AuthorizationsController@socialStore')
            ->name('api.socials.authorizations.store');
        // 登录
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');
        // 刷新token
        $api->put('authorizations/current', 'AuthorizationsController@update')
            ->name('api.authorizations.update');
// 删除token
        $api->delete('authorizations/current', 'AuthorizationsController@destroy')
            ->name('api.authorizations.destroy');
        // 游客可以访问的接口
        $api->get('categories', 'CategoryController@index')
            ->name('api.categories.index');
        //话题列表
        $api->get('topics', 'TopicController@index')
            ->name('api.topics.index');
        //用户发表的话题列表
        $api->get('users/{user}/topics', 'TopicController@userIndex')
            ->name('api.users.topics.index');
        //话题详情
        $api->get('topics/{topic}', 'TopicController@show')
            ->name('api.topics.show');
        // 话题回复列表
        $api->get('topics/{topic}/replies', 'ReplyController@index')
            ->name('api.topics.replies.index');
        // 某个用户的回复列表
        $api->get('users/{user}/replies', 'ReplyController@userIndex')
            ->name('api.users.replies.index');
        // 需要 token 验证的接口
        $api->group(['middleware' => 'api.auth'], function($api) {
            // 当前登录用户信息
            $api->get('user', 'UserController@me')
                ->name('api.user.show');
            // 图片资源
            $api->post('images', 'ImageController@store')
                ->name('api.images.store');
            // 编辑登录用户信息
            $api->patch('user', 'UserController@update')
                ->name('api.user.update');
            // 发布话题
            $api->post('topics', 'TopicController@store')
                ->name('api.topics.store');
            //修改话题
            $api->patch('topics/{topic}', 'TopicController@update')
                ->name('api.topics.update');
            $api->delete('topics/{topic}', 'TopicController@destroy')
                ->name('api.topics.destroy');
            // 发布回复
            $api->post('topics/{topic}/replies', 'ReplyController@store')
                ->name('api.topics.replies.store');
            // 删除回复
            $api->delete('topics/{topic}/replies/{reply}', 'ReplyController@destroy')
                ->name('api.topics.replies.destroy');
            // 通知列表
            $api->get('user/notifications', 'NotificationController@index')
                ->name('api.user.notifications.index');
            // 通知统计
            $api->get('user/notifications/stats', 'NotificationController@stats')
                ->name('api.user.notifications.stats');
            // 标记消息通知为已读
            $api->patch('user/read/notifications', 'NotificationController@read')
                ->name('api.user.notifications.read');
        });
    });

});
