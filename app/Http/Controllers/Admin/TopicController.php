<?php

namespace App\Http\Controllers\Admin;

use App\Models\Topic;

class TopicController extends BaseController
{
    public function index(){
        $topics=Topic::with('user', 'category')->paginate(10);
        return view('admin.topic.index', compact('topics'));
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();
        return redirect()->route('admin.topics')->with('success', '帖子成功删除');
    }
}
