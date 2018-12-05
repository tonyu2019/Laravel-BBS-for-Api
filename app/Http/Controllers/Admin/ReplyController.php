<?php

namespace App\Http\Controllers\Admin;


use App\Models\Reply;

class ReplyController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('manageContents');
    }
    public function index(){
        $replies=Reply::paginate(10);
        return view('admin.reply.index', compact('replies'));
    }

    public function destroy(Reply $reply)
    {
        $reply->delete();
        return back()->with('success', '回复成功删除');
    }
}
