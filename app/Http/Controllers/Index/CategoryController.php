<?php

namespace App\Http\Controllers\Index;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function show(Request $request, Category $category, User $user){
        $topics = Topic::withOrder($request->order)->where('category_id', $category->id)->paginate(10);
        // 活跃用户列表
        $active_users = $user->getActiveUsers();
        return view('index.topic.index', compact('topics', 'category', 'active_users'));
    }
}
