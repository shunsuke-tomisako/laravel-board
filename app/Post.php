<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'content', 'title', 'image'
    ];

    public function category() {
        // 投稿は1つのカテゴリ－に属する
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function user() {
        // ユーザーは1つのカテゴリ－に属する
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

}
