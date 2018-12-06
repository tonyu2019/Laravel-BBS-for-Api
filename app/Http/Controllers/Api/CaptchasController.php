<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CaptchaRequest;
use Gregwar\Captcha\CaptchaBuilder;

class CaptchasController extends BaseController
{
    public function store( CaptchaRequest $request, CaptchaBuilder $captchaBuilder){
        //创建缓存key
        $key = 'captcha_'.uniqid('tony');
        //获取手机号
        $phone=$request->phone;
        //生成验证码图片
        $captcha=$captchaBuilder->build();
        //缓存过期时间
        $expireAt=now()->addMinutes(2);
        \Cache::put($key, ['phone' => $phone, 'code'=> $captcha->getPhrase()], $expireAt);
        $result = [
            'captcha_key' => $key,
            'expired_at' => $expireAt->toDateTimeString(),
            'captcha_image_content' => $captcha->inline()
        ];

        return $this->response->array($result)->setStatusCode(201);
    }
}
