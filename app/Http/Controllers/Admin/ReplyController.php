<?php

namespace App\Http\Controllers\Admin;


use App\Models\Reply;

class ReplyController extends BaseController
{
    public function index(){
        $replies=Reply::paginate(10);
        return view('admin.reply.index', compact('replies'));
    }

    public function destroy(Reply $reply)
    {
        //$this->authorize('post_del');
        $reply->delete();
        return back()->with('success', '回复成功删除');
    }
}
