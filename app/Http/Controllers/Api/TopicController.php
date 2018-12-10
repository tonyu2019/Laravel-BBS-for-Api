<?php

namespace App\Http\Controllers\Api;



use App\Http\Requests\Api\TopicRequest;
use App\Models\Topic;
use App\Models\User;
use App\Transformers\TopicTransformer;
use Illuminate\Http\Request;

class TopicController extends BaseController
{
    public function index(Request $request, Topic $topic)
    {
        $topics=Topic::withOrder($request->order)->paginate(10);
        return $this->response->paginator($topics, new TopicTransformer());
    }
    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->all());
        $topic->user_id = $this->user()->id;
        $topic->save();

        return $this->response->item($topic, new TopicTransformer())
            ->setStatusCode(201);
    }

    //用户发表的话题列表
    public function userIndex(User $user){
        $topics = $user->topics()->paginate(8);
        return $this->response->paginator($topics, new TopicTransformer());
    }

    public function update(TopicRequest $request, Topic $topic){
        $this->authorize('update', $topic);

        $topic->update($request->all());
        return $this->response->item($topic, new TopicTransformer());
    }

    public function destroy(Topic $topic){
        $this->authorize('delete', $topic);
        $topic->delete();
        return $this->response->noContent();
    }


    //帖子详情
    public function show(Topic $topic){
        return $this->response->item($topic, new TopicTransformer());
    }
}
