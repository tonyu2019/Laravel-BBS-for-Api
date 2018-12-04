<?php

namespace App\Http\Controllers\Index;

use App\Models\Category;
use App\Models\Topic;

class CategoryController extends BaseController
{
    public function show(Category $category){
        $topics = Topic::with('user', 'category')->where('category_id', $category->id)->paginate(10);
        return view('index.topic.index', compact('topics', 'category'));
    }
}
