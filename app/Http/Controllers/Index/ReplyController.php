<?php

namespace App\Http\Controllers\Index;

use App\Http\Requests\ReplyRequest;
use App\Http\Controllers\Controller;
use App\Models\Reply;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(ReplyRequest $request, Reply $reply){
        $reply->topic_id=$request->topic_id;
        $reply->content=$request->content;
        $reply->user_id=Auth::id();
        $reply->save();
        return back()->with('success', '回复成功');
    }
}
