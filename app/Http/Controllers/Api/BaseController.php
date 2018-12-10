<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaseController extends Controller
{
    use Helpers;

    public function errorResponse($statusCode, $message=null, $code=0){
        throw new HttpException($statusCode, $message, null, [], $code);
    }
}
