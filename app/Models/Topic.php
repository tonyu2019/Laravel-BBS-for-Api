<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'category_id', 'excerpt', 'slug'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeWithOrder($query, $order){
        if ($order=='reply'){
            $query->orderBy('updated_at', 'desc');
        }else{
            $query->orderBy('created_at', 'desc');
        }
        return $query->with('user', 'category');
    }

    public function link($params = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }
}
