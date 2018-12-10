<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ReplyRequest;
use App\Models\Reply;
use App\Models\Topic;
use App\Transformers\ReplyTransformer;

class ReplyController extends BaseController
{
    //发表回复
    public function store(ReplyRequest $request, Topic $topic, Reply $reply){
        $reply->content = $request->content;
        $reply->topic_id = $topic->id;
        $reply->user_id = $this->user()->id;
        $reply->save();

        return $this->response->item($reply, new ReplyTransformer())
            ->setStatusCode(201);
    }

    //删除回复
    public function destroy(Topic $topic, Reply $reply){
//        dd($topic, $reply);
        //判断当前删除回复对应的话题id是否等于链接中的话题id
        if ($reply->topic_id != $topic->id) {
            return $this->response->errorBadRequest();
        }
        $this->authorize('delete', $reply);
        $reply->delete();

        return $this->response->noContent();
    }
}
