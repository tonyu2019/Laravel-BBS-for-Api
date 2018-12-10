<?php

namespace App\Http\Controllers\Api;
use App\Transformers\NotificationTransformer;

class NotificationController extends BaseController
{
    public function index()
    {
        $notifications = $this->user->notifications()->paginate(20);

        return $this->response->paginator($notifications, new NotificationTransformer());
    }

    public function stats(){
        return $this->response->array([
            'unread_count' => $this->user()->notification_count,
        ]);
    }

    public function read(){
        $this->user()->markAsRead();
        return $this->response->noContent();
    }
}