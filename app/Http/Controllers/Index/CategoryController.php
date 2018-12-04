<?php

namespace App\Http\Controllers\Index;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    public function show(Request $request, Category $category){
        $topics = Topic::withOrder($request->order)->where('category_id', $category->id)->paginate(10);
        return view('index.topic.index', compact('topics', 'category'));
    }
}
