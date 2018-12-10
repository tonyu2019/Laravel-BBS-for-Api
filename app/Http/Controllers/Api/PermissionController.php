<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Transformers\PermissionTransformer;

class PermissionController extends BaseController
{
    public function index()
    {
        $permissions = $this->user()->getAllPermissions();

        return $this->response->collection($permissions, new PermissionTransformer());
    }
}