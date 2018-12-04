<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 2018/12/4
 * Time: 13:10
 */

namespace App\Observers;


use App\Models\Topic;

class TopicObserver
{
    public function saving(Topic $topic){
        $topic->except = make_excerpt($topic->body);
    }

}