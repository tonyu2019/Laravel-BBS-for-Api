<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 2018/12/4
 * Time: 16:57
 */

namespace App\Observers;


use App\Models\Reply;

class ReplyObserver
{
    public function creating(Reply $reply){
        $reply->content=clean($reply->content, 'user_topic_body');
    }
    public function created(Reply $reply){
        $reply->topic->increment('reply_count');
    }
}