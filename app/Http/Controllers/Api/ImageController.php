<?php

namespace App\Http\Controllers\Api;


use App\Handlers\ImgUploadHandle;
use App\Http\Requests\Api\ImageRequest;
use App\Models\Image;
use App\Transformers\ImageTransformer;

class ImageController extends BaseController
{
    public function store(ImageRequest $request, ImgUploadHandle $uploader, Image $image)
    {
        $user = $this->user();

        $result = $uploader->save($request->image, $request->type, $user->id);

        $image->path = $result['path'];
        $image->type = $request->type;
        $image->user_id = $user->id;
        $image->save();

        return $this->response->item($image, new ImageTransformer())->setStatusCode(201);
    }
}
