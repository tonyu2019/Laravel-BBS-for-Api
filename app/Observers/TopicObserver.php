<?php
/**
 * Created by PhpStorm.
 * User: tony
 * Date: 2018/12/4
 * Time: 13:10
 */

namespace App\Observers;


//use App\Handlers\SlugTranslateHandler;
use App\Jobs\TranslateSlug;
use App\Models\Topic;

class TopicObserver
{
    public function saving(Topic $topic){
        $topic->body    = clean($topic->body, 'user_topic_body');
        $topic->except  = make_excerpt($topic->body);
    }

    public function saved(Topic $topic)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $topic->slug) {

            // 推送任务到队列
            dispatch(new TranslateSlug($topic));
        }
    }

    public function deleted(Topic $topic)
    {
        \DB::table('replies')->where('topic_id', $topic->id)->delete();
    }

}