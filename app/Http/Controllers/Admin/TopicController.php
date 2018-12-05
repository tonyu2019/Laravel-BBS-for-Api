<?php

namespace App\Http\Controllers\Admin;

use App\Models\Topic;

class TopicController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('manageContents');
    }
    public function index(){

        $topics=Topic::with('user', 'category')->orderBy('id', 'desc')->paginate(10);
        return view('admin.topic.index', compact('topics'));
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();
        return back()->with('success', '帖子成功删除');
    }
}
